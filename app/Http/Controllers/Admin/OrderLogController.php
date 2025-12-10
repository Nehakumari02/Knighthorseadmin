<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Order;
use App\Models\Admin\OrderItem;
use App\Models\Admin\Product;
use App\Models\Admin\ProductOrder;
use App\Models\Admin\OrderShipment; // Added missing import
use App\Models\User;
use App\Models\UserWallet;
use App\Models\Admin\BasicSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;
use PDF; // <--- IMPORTANT: Ensure this is imported

class OrderLogController extends Controller
{
    /**
     * Helper function to apply the Assign To filter securely
     */
    private function getFilteredQuery()
    {
        $admin = auth()->guard('admin')->user();

        $query = ProductOrder::with(
            'user:id,firstname,email,username,mobile',
            'gateway_currency:id,name'
        );

        // --- FILTER LOGIC ---
        // Verify your Super Admin username here. 
        // If your main admin login is "admin", change 'superadmin' to 'admin'.
        if ($admin->username !== 'superadmin') {

            $query->whereHas('user', function ($q) use ($admin) {
                // FIXED: Compares assign_to with the Admin's USERNAME
                $q->where('assign_to', $admin->username);
            });
        }

        return $query;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page_title = __("All Logs");

        // 1. Get query with security filter
        $transactions = $this->getFilteredQuery();

        // 2. Filter by status (2 = Pending/Active usually)
        $transactions = $transactions->where('status', 2)->paginate(20);

        return view('admin.sections.order-log.index', compact(
            'page_title',
            'transactions'
        ));
    }

    /**
     * Pending order-log Logs View.
     */
    public function pending()
    {
        $page_title = __("Pending Logs");

        $transactions = $this->getFilteredQuery();
        $transactions = $transactions->where('status', 2)->paginate(20);

        return view('admin.sections.order-log.index', compact(
            'page_title',
            'transactions'
        ));
    }

    /**
     * Complete order-log Logs View.
     */
    public function complete()
    {
        $page_title = __("Complete Logs");

        $transactions = $this->getFilteredQuery();
        $transactions = $transactions->where('status', 1)->paginate(20);

        return view('admin.sections.order-log.index', compact(
            'page_title',
            'transactions'
        ));
    }

    /**
     * Canceled order-log Logs View.
     */
    public function canceled()
    {
        $page_title = __("Canceled Logs");

        $transactions = $this->getFilteredQuery();
        $transactions = $transactions->where('status', 4)->paginate(20);

        return view('admin.sections.order-log.index', compact(
            'page_title',
            'transactions'
        ));
    }

    /**
     * Method for booking log details
     */
    public function details(Request $request, $trx_id)
    {
        $page_title = "Booking Details";

        // --- SECURITY CHECK START ---
        $admin = auth()->guard('admin')->user();
        $query = ProductOrder::with(['payment_gateway', 'shipments.shipment']);

        if ($admin->username !== 'superadmin') {
            $query->whereHas('user', function ($q) use ($admin) {
                // FIXED: Filter by Username
                $q->where('assign_to', $admin->username);
            });
        }

        $data = $query->where('trx_id', $trx_id)->first();
        // --- SECURITY CHECK END ---

        if (!$data) {
            return back()->with(['error' => ['Data Not Found or Access Denied!']]);
        }

        $shipments = OrderShipment::with(['shipment', 'product_order'])
            ->where('product_order_id', $data->id)
            ->get()
            ->unique('shipment_id');

        return view('admin.sections.order-log.details', compact(
            'page_title',
            'data',
            'shipments'
        ));
    }

    /**
     * Method for update Status for Booking Logs
     */
    public function statusUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required|integer',
            'trxId' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        // --- SECURITY CHECK START ---
        $admin = auth()->guard('admin')->user();
        $query = ProductOrder::with(['payment_gateway']);

        if ($admin->username !== 'superadmin') {
            $query->whereHas('user', function ($q) use ($admin) {
                // FIXED: Filter by Username
                $q->where('assign_to', $admin->username);
            });
        }

        $data = $query->where('trx_id', $request->trxId)->first();
        // --- SECURITY CHECK END ---

        if (!$data) {
            return back()->with(['error' => ['Data Not Found or Access Denied!']]);
        }

        // Logic to restore product quantity
        if (isset($data->booking_data->data->user_cart)) {
            $user_cart = $data->booking_data->data->user_cart;
            foreach ($user_cart->data as $item) {
                $id = $item->id;
                $product = Product::where('id', $id)->first();
                if ($product) {
                    $available_quantity = $product->available_quantity;
                    $product->update([
                        'available_quantity' => $available_quantity + $item->quantity,
                    ]);
                }
            }
        }

        $validated = $validator->validate();

        // Refund logic
        try {
            $data->update([
                'status' => $validated['status'],
            ]);

            if ($request->status == '4' && $data->type != "cash") {
                // Refund to User Wallet
                $user = User::where('id', $data->user_id)->first();
                if ($user) {
                    // Increment is safer than fetching and adding manually
                    UserWallet::where('user_id', $user->id)->increment('balance', $data->price);
                }
            }
        } catch (Exception $e) {
            return back()->with(['error' => ['Something went wrong! Please try again.']]);
        }

        return redirect()->route('admin.booking.log.index')->with(['success' => ['Booking Status Updated Successfully.']]);
    }
    public function downloadPdf($trx_id)
    {
        // 1. Fetch Order with Security Check
        $admin = auth()->guard('admin')->user();
        $query = ProductOrder::with(['user', 'payment_gateway']);

        if ($admin->username !== 'superadmin') {
            $query->whereHas('user', function ($q) use ($admin) {
                $q->where('assign_to', $admin->username);
            });
        }

        $transaction = $query->where('trx_id', $trx_id)->firstOrFail();

        // 2. Load the specific Blade view for PDF
        $pdf = PDF::loadView('admin.sections.order-log.invoice-pdf', compact('transaction'));

        // 3. Download
        return $pdf->download('Invoice_' . $trx_id . '.pdf');
    }
}