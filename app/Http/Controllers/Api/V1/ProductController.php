<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product;
use Illuminate\Http\Request;
use App\Constants\GlobalConst;
use App\Http\Helpers\Response;
use App\Models\Admin\Area;
use App\Models\Admin\Category;
use App\Models\Admin\Language;
use App\Models\Admin\SubCategory;

class ProductController extends Controller
{
    protected $languages;
    public function __construct()
    {
        $this->languages = Language::get();
    }
    public function product()
    {
        $product = Product::with(['sub_category', 'shipment', 'unit'])->orderByDesc('id')->where('status', 1)->paginate()->map(function ($data) {
            $languages = $this->languages;
            $lang      = request()->lang;
            $default   = 'en';
            return [

                'id'                 => $data->id,
                'data'               => $data->data->language->$lang,
                'price'              => $data->price,
                'offer_price'        => $data->offer_price,
                'uuid'               => $data->uuid,
                'quantity'           => $data->quantity,
                'available_quantity' => $data->available_quantity,
                'order_quantity'     => $data->order_quantity,
                'image'              => $data->image,
                
                'images' => $data->images ?? [],
                'status'             => $data->status,
                'popular'            => $data->popular,
                'popular_status'     => '1 = popular',
                'meta_image'         => $data->meta_image,
                'sub_category'       => $data->sub_category->data->language->$lang ?? $data->sub_category->data->language->$default,
                'area'               => $data->areas,
                'shipment'           => $data->shipment,
                'unit'               => $data->unit,
                'currency_code' => get_default_currency_code(),
                'currency_symbol' => get_default_currency_symbol(),

            ];
        });

        return Response::success([__("Product fetch successfully!")], [
            'product'    => $product,
        ], 200);
    }
    
    // 👇👇👇 NEW FUNCTION: List All Products (Paginated) 👇👇👇
    public function list(Request $request)
    {
        $lang          = $request->lang ?? 'en';
        $default       = 'en';
        $sortDirection = $request->sort_direction ?? 'desc';
        $limit         = (int) ($request->limit ?? 10);
        $page          = (int) ($request->page ?? 1);

        // Count Total Active Products
        $totalProducts = Product::where('status', 1)->count();
        $totalPages    = ceil($totalProducts / $limit);

        // Fetch Products
        $products = Product::with('sub_category.categories', 'shipment', 'unit')
            ->where('status', 1) // Only active products
            ->orderBy('created_at', $sortDirection)
            ->paginate($limit);

        // Format Data
        $productData = $products->map(function ($data) use ($lang, $default) {
            $mainCategory = $data->sub_category->categories ?? null;
            return [
                'id'                 => $data->id,
                'category_id'        => $mainCategory->id ?? null,
                'user_type'          => $mainCategory->user_type ?? null, // Crucial for filtering in Flutter
                'data'               => $data->data->language->$lang ?? $data->data->language->$default,
                'price'              => $data->price,
                'offer_price'        => $data->offer_price,
                'uuid'               => $data->uuid,
                'quantity'           => $data->quantity,
                'available_quantity' => $data->available_quantity,
                'order_quantity'     => $data->order_quantity,
                'image'              => $data->image,
                'images'             => $data->images ?? [],
                'status'             => $data->status,
                'popular'            => $data->popular,
                'popular_status'     => '1 = popular',
                'meta_image'         => $data->meta_image,
                'sub_category'       => $data->sub_category->data->language->$lang ?? $data->sub_category->data->language->$default,
                'area'               => $data->areas,
                'shipment'           => $data->shipment,
                'unit'               => $data->unit()->first()->unit ?? null,
                'currency_code'      => get_default_currency_code(),
                'currency_symbol'    => get_default_currency_symbol(),
            ];
        });

        return Response::success([__("All products fetched successfully!")], [
            'current_page'   => $page,
            'total_page'     => $totalPages,
            'per_page'       => $limit,
            'total_pages'    => $totalPages,
            'total_products' => $totalProducts,
            'product'        => $productData // Matches the key expected by your Flutter Model
        ], 200);
    }
    // 👆👆👆 END NEW FUNCTION 👆👆👆

    public function popular(Request $request)
    {
        $lang          = $request->lang ?? 'en';
        $default       = 'en';
        $query        = $request->get('term');
        $sortDirection = $request->sort_direction ?? 'desc';
        $limit         = (int) ($request->limit ?? 10);
        $page          = (int) ($request->page ?? 1);
        // $offset        = ($page - 1) * $limit;

        $totalProducts = Product::where('status', 1)->where('popular', 1)->count();
        
        $totalPages    = ceil($totalProducts / $limit);

        // $products = Product::with('sub_category', 'shipment', 'unit')
        //     ->where('status', 1)
        //     ->where('popular', 1)
        //     ->orderBy('created_at', $sortDirection)
        //      ->where("data->language->{$lang}->name", 'LIKE', "%{$convert_text}%")
        //     ->offset($offset)
        //     ->limit($limit)
        //     ->get();
        
        // $products = Product::with('sub_category', 'shipment', 'unit')
        $products = Product::with('sub_category.categories', 'shipment', 'unit')

            ->where('status', 1)
            ->where('popular', 1)
            ->whereRaw("LOWER(JSON_UNQUOTE(JSON_EXTRACT(data, '$.language.{$lang}.name'))) LIKE ?", ["%" . strtolower($query) . "%"])
            ->orderBy('created_at', $sortDirection)
            ->paginate($limit);



        $productData = $products->map(function ($data) use ($lang, $default) {
            $mainCategory = $data->sub_category->categories ?? null;
            return [
                'id'                 => $data->id,
                'category_id'        => $mainCategory->id ?? null,
                'user_type'          => $mainCategory->user_type ?? null,
                'data'               => $data->data->language->$lang ?? $data->data->language->$default,
                'price'              => $data->price,
                'offer_price'        => $data->offer_price,
                'uuid'               => $data->uuid,
                'quantity'           => $data->quantity,
                'available_quantity' => $data->available_quantity,
                'order_quantity'     => $data->order_quantity,
                'image'              => $data->image,
              
                'images'             => $data->images ?? [],
                'status'             => $data->status,
                'popular'            => $data->popular,
                'popular_status'     => '1 = popular',
                'meta_image'         => $data->meta_image,
                'sub_category'       => $data->sub_category->data->language->$lang ?? $data->sub_category->data->language->$default,
                'area'               => $data->areas,
                'shipment'           => $data->shipment,
                'unit'               => $data->unit()->first()->unit ?? null,
                'currency_code'      => get_default_currency_code(),
                'currency_symbol'    => get_default_currency_symbol(),
            ];
        });

        return Response::success([__("Product fetch successfully!")], [

            'current_page'   => $page,
            'total_page'     => $totalPages,
            'per_page'       => $limit,
            'total_pages'    => $totalPages,
            'total_products' => $totalProducts,

            'product' => $productData
        ], 200);
    }

    public function specialOffer(Request $request)
    {
        $lang          = $request->lang ?? 'en';
        $default       = 'en';
        $query        = $request->get('term');

        $sortDirection = $request->sort_direction ?? 'desc';
        $limit         = (int) ($request->limit ?? 10);
        $page          = (int) ($request->page ?? 1);
        // $offset        = ($page - 1) * $limit;

        $totalProducts = Product::where('status', 1)->where('popular', 1)->count();
        $totalPages    = ceil($totalProducts / $limit);


        $products = Product::with('sub_category.categories', 'shipment', 'unit')
            ->where('status', 1)
            ->whereRaw("LOWER(JSON_UNQUOTE(JSON_EXTRACT(data, '$.language.{$lang}.name'))) LIKE ?", ["%" . strtolower($query) . "%"])
            ->whereNotNull('offer_price')
            ->orderBy('created_at', $sortDirection)
            ->paginate($limit);


        $productData = $products->map(function ($data) use ($lang, $default) {
            $mainCategory = $data->sub_category->categories ?? null;
            return [
                'id'                 => $data->id,
                'category_id'        => $mainCategory->id ?? null,
                'user_type'          => $mainCategory->user_type ?? null,
                'data'               => $data->data->language->$lang ?? $data->data->language->$default,
                'price'              => $data->price,
                'offer_price'        => $data->offer_price,
                'uuid'               => $data->uuid,
                'quantity'           => $data->quantity,
                'order_quantity'     => $data->order_quantity,
                'available_quantity' => $data->available_quantity,
                'image'              => $data->image,

                'images'             => $data->images ?? [],
                'status'             => $data->status,
                'popular'            => $data->popular,
                'popular_status'     => '1 = popular',
                'meta_image'         => $data->meta_image,
                'sub_category'       => $data->sub_category->data->language->$lang ?? $data->sub_category->data->language->$default,
                'area'               => $data->areas,
                'shipment'           => $data->shipment,
                'unit'               => $data->unit()->first()->unit ?? null,
                'currency_code'      => get_default_currency_code(),
                'currency_symbol'    => get_default_currency_symbol(),
            ];
        });

        return Response::success([__("Product fetch successfully!")], [

            'current_page'   => $page,
            'total_page'     => $totalPages,
            'per_page'       => $limit,
            'total_pages'    => $totalPages,
            'total_products' => $totalProducts,

            'product' => $productData
        ], 200);
    }


    public function category()
    {
        $category = Category::orderByDesc('id')->where('status', 1)->get()->map(function ($data) {
            $languages = $this->languages;
            $lang      = request()->lang;
            $default   = 'en';
            return [
                'id'     => $data->id,
                'data'   => $data->data->language->$lang ?? $data->data->language->$default,
                'uuid'   => $data->uuid,
                 'user_type'   => $data->user_type,
                'image'  => $data->image,
                'status' => $data->status,
            ];
        });

        return Response::success([__("Category fetch successfully!")], [
            'category'    => $category,
        ], 200);
    }


    public function sub_category()
    {
        $lang        = request()->lang ?? 'en'; // Default to 'en' if not provided
        $defaultLang = 'en'; // Your default language

        $sub_category = SubCategory::with('categories')->orderByDesc('id')
            ->where('status', 1)
            ->get()
            ->map(function ($data) use ($lang, $defaultLang) {
                // Process subcategory data
                $subCategoryData = $data->data->language->$lang ?? $data->data->language->$defaultLang;

                // Process category data
                $categoryData      = $data->categories;
                $processedCategory = null;

                if ($categoryData) {
                    $processedCategory = [
                        'id'         => $categoryData->id,
                        'data'       => $categoryData->data->language->$lang ?? $categoryData->data->language->$defaultLang,
                        'uuid'       => $categoryData->uuid,
                        'image'      => $categoryData->image,
                        'status'     => $categoryData->status,
                        'created_at' => $categoryData->created_at,
                        'updated_at' => $categoryData->updated_at
                    ];
                }

                return [
                    'id'       => $data->id,
                    'data'     => $subCategoryData,
                    'uuid'     => $data->uuid,
                    'image'    => $data->image,
                    'status'   => $data->status,
                    'category' => $processedCategory,
                ];
            });

        return Response::success([__("Sub Category fetch successfully!")], [
            'sub_category' => $sub_category,
        ], 200);
    }
    public function area()
    {
        $area = Area::orderByDesc('id')->where('status', 1)->get()->map(function ($data) {

            return [
                'id'     => $data->id,
                'name'   => $data->name,
                'slug'   => $data->slug,
                'status' => $data->status,
            ];
        });

        return Response::success([__("Area fetch successfully!")], [
            'area'    => $area,
        ], 200);
    }

    public function subCatProduct(Request $request)
    {
        $lang    = $request->lang ?? 'en';
        $default = 'en';
        $limit   = (int) ($request->limit ?? 10);
        $page    = (int) ($request->page ?? 1);
            $query        = $request->get('term');
        // $offset  = ($page - 1) * $limit;

        // Validate sub_category_id
        if (!$request->sub_category_id) {
            return Response::error([__('Sub Category ID is required.')], [], 400);
        }

        // Count total products
        $totalProducts = Product::where('status', 1)
            ->where('sub_category_id', $request->sub_category_id)
            ->count();

        $totalPages = ceil($totalProducts / $limit);

        // Get paginated products
        $products = Product::with('sub_category', 'shipment', 'unit')
            ->where('status', 1)
             ->whereRaw("LOWER(JSON_UNQUOTE(JSON_EXTRACT(data, '$.language.{$lang}.name'))) LIKE ?", ["%" . strtolower($query) . "%"])
            ->where('sub_category_id', $request->sub_category_id)
->orderBy('id', 'asc')
->paginate($limit);

        // Format data
        $productData = $products->map(function ($data) use ($lang, $default) {
            return [
                'id'                  => $data->id,
                'data'                => $data->data->language->$lang ?? $data->data->language->$default,
                'price'               => $data->price,
                'offer_price'         => $data->offer_price,
                'uuid'                => $data->uuid,
                'quantity'            => $data->quantity,
                'available_quantity'  => $data->available_quantity,
                'order_quantity'     => $data->order_quantity,
                'image'               => $data->image,

                'images'             => $data->images ?? [],
                'status'              => $data->status,
                'popular'             => $data->popular,
                'popular_status'      => '1 = popular',
                'meta_image'          => $data->meta_image,
                'sub_category'        => $data->sub_category->data->language->$lang ?? $data->sub_category->data->language->$default ?? null,
                'area'                => $data->areas,
                'shipment'            => $data->shipment,
                'unit'                => $data->unit()->first()->unit ?? null,
                'currency_code' => get_default_currency_code(),
                'currency_symbol'         => get_default_currency_symbol(),
            ];
        });

        return Response::success([__("Product fetch successfully!")], [

            'current_page'   => $page,
            'per_page'       => $limit,
            'total_pages'    => $totalPages,
            'total_products' => $totalProducts,
            'product'        => $productData,


        ], 200);
    }


    public function productDetails(Request $request)
    {
        $product = Product::orderByDesc('id')
            ->where('status', 1)
            ->where('id', $request->product_id)
            ->with('sub_category', 'shipment', 'unit')
            ->first();

        if (!$product) {
            return Response::error([__("Product not found!")], 404);
        }

        $languages = $this->languages;
        $lang = request()->lang;
        $default = 'en';

        $formattedProduct = [
            'id' => $product->id,
            'data' => $product->data->language->$lang,
            'price' => $product->price,
            'offer_price' => $product->offer_price,
            'uuid' => $product->uuid,
            'quantity' => $product->quantity,
            'available_quantity' => $product->available_quantity,
            'order_quantity' => $product->order_quantity,
            'image' => $product->image,

            'images' => $product->images ?? [],
            'status' => $product->status,
            'popular' => $product->popular,
            'popular_status' => '1 = popular',
            'meta_image' => $product->meta_image,
            'sub_category' => $product->sub_category->data->language->$lang ?? $product->sub_category->data->language->$default,
            'area' => $product->areas,
            'shipment' => $product->shipment,
            'unit' => $product->unit()->first()->unit ?? null,
            'currency_code' => get_default_currency_code(),
            'currency_symbol' => get_default_currency_symbol(),
        ];

        $similar_products = Product::where('sub_category_id', $product->sub_category_id)
            ->where('id', '!=', $product->id) // Exclude the current product
            ->with('sub_category', 'areas', 'shipment', 'unit')
            ->get()
            ->map(function ($data) use ($lang, $default) {
                return [
                    'id' => $data->id,
                    'data' => $data->data->language->$lang,
                    'price' => $data->price,
                    'offer_price' => $data->offer_price,
                    'uuid' => $data->uuid,
                    'quantity' => $data->quantity,
                    'available_quantity' => $data->available_quantity,
                    'order_quantity' => $data->order_quantity,
                    'image' => $data->image,

                    'images' => $data->images ?? [],
                    'status' => $data->status,
                    'popular' => $data->popular,
                    'popular_status' => '1 = popular',
                    'meta_image' => $data->meta_image,
                    'sub_category' => $data->sub_category->data->language->$lang ?? $data->sub_category->data->language->$default,
                    'area' => $data->areas,
                    'shipment' => $data->shipment,
                    'unit' => $data->unit()->first()->unit ?? null,
                    'currency_code' => get_default_currency_code(),
                    'currency_symbol' => get_default_currency_symbol(),
                ];
            });

        return Response::success([__("Product fetch successfully!")], [
            'product' => $formattedProduct,
            'similar_products' => $similar_products,
        ], 200);
    }


    public function areaWiseProduct(Request $request)
    {

        $product = Product::with(['sub_category', 'shipment', 'unit'])
            ->whereHas('areas', function ($query) use ($request) {
                $query->where('area_id', $request->area_id);
            })
            ->get()->map(function ($data) {

                $languages = $this->languages;
                $lang      = request()->lang;
                $default   = 'en';
                return [

                    'id'                 => $data->id,
                    'data'               => $data->data->language->$lang,
                    'price'              => $data->price,
                    'offer_price'        => $data->offer_price,
                    'uuid'               => $data->uuid,
                    'quantity'           => $data->quantity,
                    'available_quantity' => $data->available_quantity,
                    'order_quantity'     => $data->order_quantity,
                    'image'              => $data->image,

                    'images' => $data->images ?? [],
                    'status'             => $data->status,
                    'popular'            => $data->popular,
                    'popular_status'     => '1 = popular',
                    'meta_image'         => $data->meta_image,
                    'sub_category'       => $data->sub_category->data->language->$lang ?? $data->sub_category->data->language->$default,
                    'area'               => $data->areas,
                    'shipment'           => $data->shipment,
                    'unit'               => $data->unit,
                    'currency_code' => get_default_currency_code(),
                    'currency_symbol' => get_default_currency_symbol(),
                ];
            });

        return Response::success([__("Product fetch successfully!")], [
            'product'    => $product,
        ], 200);
    }
}
