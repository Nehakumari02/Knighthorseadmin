<?php

namespace App\Http\Controllers\Frontend;

use Exception;
use Illuminate\Http\Request;
use App\Models\Admin\Language;
use App\Http\Controllers\Controller;
use App\Models\Admin\Product;
use App\Models\Admin\UsefulLink;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(session()->all());
        return view('frontend.index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function offerSection()
    {
        $product = Product::forArea()->where('status', true)
            ->whereNotNull('offer_price')
            ->paginate(20);
        $page_title = __("Product List");


        return view('frontend.offer-section', compact('product', 'page_title'));
    }

    public function productList($slug)
    {
        $page_title = __("Product List");
        $product = Product::forArea()
            ->with('shipment')
            ->whereHas('sub_category', function ($query) use ($slug) {
                $query->where('slug', $slug);
            })
            ->where('status', true)
            ->paginate(10);
        return view('frontend.product.list', compact('product', 'page_title'));
    }
    public function productDetails($uuid)
    {
        $page_title      = __("Product Details");
        $item            = Product::where('uuid', $uuid)->with('unit')->first();
        $similar_product = Product::forArea()->where('sub_category_id', $item->sub_category_id)->get();


        return view('frontend.product.details', compact('item', 'page_title', 'similar_product'));
    }

    /**
     * Method for search doctor
     * @param string $slug
     * @param \Illuminate\Http\Request  $request
     */
    public function searchProduct(Request $request)
    {
        // dd(session('current_area_id'));
        //  dd(session()->all());
        $page_title    = __("Product Search");
        $product       = Product::ForArea()->where('status', true)->get();
        $message       = Session::get('message');
        $current_local = get_default_language_code();

        $validator = Validator::make($request->all(), [
            'name' => 'nullable',
        ]);

        if ($validator->fails()) {
            return back()->with(['error' => [__('Something went wrong! Please try again.')]]);
        }

        if ($request->name) {
            $query = $request->get('name');
            $product = Product::ForArea()->where('status', true)
                ->whereRaw("LOWER(JSON_UNQUOTE(JSON_EXTRACT(`data`, '$.language.{$current_local}.name'))) LIKE ?", ['%' . strtolower($query) . '%'])
                ->get();
        }

        return view('frontend.product.list', compact(
            'page_title',
            'message',
            'product'
        ));
    }


    public function changeLanguage($lang = null)
    {
        $language = Language::where('code', $lang)->first();
        session()->put('local', $lang);
        return redirect()->back();
    }

    public function languageSwitch(Request $request)
    {

        $code     = $request->target;
        $language = Language::where("code", $code)->first();
        if (!$language) {
            return back()->with(['error' => [__('Oops! Language Not Found!')]]);
        }
        Session::put('local', $code);
        Session::put('local_dir', $language->dir);

        // dd($language->dir);

        return back()->with(['success' => [__('Language Switch to ') . $language->name]]);
    }


    public function areaSwitch(Request $request)
    {

        $request->validate([
            'area_id' => 'nullable'
        ]);
        // dd($request->all());
        // Store in session - the trait will use this
        session(['current_area_id' => $request->area_id]);
        // dd(session()->all());


        // Return JSON response for AJAX or redirect
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Area filter updated'
            ]);
        }

        return redirect()->back();
    }

    /**
     * Method for show useful links
     */
    public function link($slug)
    {
        $link = UsefulLink::where('slug', $slug)->first();
        if (!$link) {
            return back()->with(['error' => [__('Link not found.')]]);
        }
        $page_title = ucwords(strtolower(str_replace("_", " ", $link->type)));

        return view('frontend.pages.link', compact(
            'link',
            'page_title'
        ));
    }
}
