<?php

namespace App\Http\Controllers\Admin;

use App\Constants\GlobalConst;
use App\Constants\PaymentGatewayConst;
use App\Http\Controllers\Controller;
use App\Models\Admin\BasicSettings;
use App\Models\Admin\DeliverySettings;
use App\Models\Admin\Order;
use App\Models\Admin\OrderItem;
use App\Models\Admin\OrderShipment;
use App\Models\Admin\PaymentGateway;
use App\Models\Admin\Product;
use App\Models\Admin\ProductCart;
use App\Models\Admin\Shipment;
use App\Models\Admin\TempCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class ProductCartController extends Controller
{
    public function getCart()
    {
        cleanDuplicateTempCarts();

        $session_cart = session('cart', []);

        $bd_data = [];

        if (auth()->check()) {
            $cartData = TempCart::where('user_id', auth()->id())->first();

            if ($cartData) {
                $bd_data = collect($cartData->data)->toArray();
            }

            $cart = array_merge($bd_data, $session_cart);

            $cart = collect($cart)->unique('id')->values()->all();
        } else {
            $cart = $session_cart;
        }

        return response()->json([
            'success' => true,
            'cart'    => array_values($cart)
        ]);
    }



    public function updateCart(Request $request)
    {
    
        $cart = $request->input('cart', []);

        try {
            $userId = auth()->id();

            if (!session()->has('pre_login_session_id')) {
                session()->put('pre_login_session_id', uniqid('pre_', true));
            }


            session()->put('pre_login_temp', session('pre_login_session_id'));

            $sessionId = session('pre_login_session_id');


            $uuid = Str::uuid();

            if ($userId) {
                $this->mergeGuestCartWithUserCart($userId);
            }
              
            $tempCart = TempCart::updateOrCreate(
                [
                    'user_id'    => $userId ?? null,
                    'session_id' => $sessionId
                ],
                [
                    'data'       => (object)$cart,
                    'status'     => true,
                    'checkout'   => false,
                    'uuid'       => $uuid,
                    'session_id' => $sessionId,
                    'sub_total'  => $request->totalAmount
                ]
            );

            session(['cart' => $cart]);

            return response()->json([
                'success' => true,
                'message' => 'Cart updated successfully',
                'cart'    => $tempCart
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update cart: ' . $e->getMessage()
            ], 500);
        }
    }


    protected function mergeGuestCartWithUserCart($userId)
    {
        $cart = session('cart', []);

        $sessionId = session('pre_login_session_id') ?? session('pre_login_temp');

        if (!$sessionId) {
            return;
        }

        $guestCart = TempCart::where('session_id', $sessionId)
            ->whereNull('user_id')
            ->first();

            

        if ($guestCart) {
            $userCart = TempCart::where('user_id', $userId)->first();

            if ($userCart) {
                $mergedData = $this->mergeCartData(
                    json_decode(json_encode($userCart->data), true),
                    json_decode(json_encode($guestCart->data), true)
                );

                $userCart->update([
                    'data' => (object)$mergedData,
                ]);

                $guestCart->delete();
            } else {
                $guestCart->update([
                    'user_id' => $userId,
                ]);
            }
        }

        session()->forget('pre_login_temp');
    }


    protected function mergeCartData($userCart, $guestCart)
    {
        $merged = $userCart;

        foreach ($guestCart as $guestItem) {
            $found = false;
            foreach ($merged as &$userItem) {
                if ($userItem['id'] == $guestItem['id']) {
                    $userItem['quantity'] += $guestItem['quantity'];
                    $found = true;
                    break;
                }
            }

            if (!$found) {
                $merged[] = $guestItem;
            }
        }

        return $merged;
    }

    public function checkout()
    {
        $page_title = __('checkout');
        if (auth()->check() == false) {
            return back()->with([
                'error'         => ['Please login with your credential to continue'],
                'from_checkout' => true
            ]);
        }
        $sessionId = session('pre_login_session_id') ?? session('pre_login_temp');

        $guestCart = TempCart::where('session_id', $sessionId)
            ->first();

        if ($guestCart) {
            try {
                $guestCart->update([
                    'user_id' => auth()->user()->id,
                ]);
            } catch (\Exception $e) {
            }
        } else {
            $guestCart = TempCart::where('user_id', auth()->id())
            ->first();
        }


        // $userCart = TempCart::where('session_id', $sessionId)
        //     ->orWhere('user_id', auth()->id())
        //     ->latest()
        //     ->first();

        if ($guestCart) {
            TempCart::where(function ($query) {
                $query->where('user_id', auth()->id());
            })
                ->where('id', '!=', $guestCart->id)
                ->delete();
        }


        $product_id = collect($guestCart->data)->pluck('id')->toArray();

        $products = Product::whereIn('id', $product_id)->with('shipment')->get();

        $grouped = $products->groupBy(function ($product) {
            return $product->shipment->id ?? null; // Safeguard in case shipment is null
        });

        session()->forget('cart');

        $payment_method = PaymentGateway::where('type', 'AUTOMATIC')->with('currencies')->get();

        $delivery_settings = DeliverySettings::first();
        

        return view('frontend.pages.billing-details', compact('guestCart', 'page_title', 'payment_method', 'delivery_settings', 'grouped'));
    }
}
