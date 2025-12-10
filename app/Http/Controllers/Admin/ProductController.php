<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Str;
use App\Models\Admin\Language;
use App\Constants\LanguageConst;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use App\Http\Helpers\Response;
use App\Models\Admin\Area;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\Admin\Shipment;
use App\Models\Admin\SubCategory;
use App\Models\Admin\Unit;

class ProductController extends Controller
{
    protected $languages;

    public function __construct()
    {
        $this->languages = Language::get();
    }

    public function index()
    {
        $page_title = __("Products");

        $product   = Product::where('status', true)->paginate(10);
        // dd($products);

        $categories = Category::get();
        $subCategories = SubCategory::get();
        $areas = Area::get();
        $languages = $this->languages;
        return view('admin.sections.product.index', compact(
            'page_title',
            'product',
            'languages',
            'categories',
            'subCategories',
            'areas'
        ));
    }

    // /**
    //  * Display a listing of the  categories.
    //  *
    //  * @return \Illuminate\View\View
    //  */
    public function searchProduct(Request $request)
    {
        $page_title = __("Products");

        $product = Product::with(['unit', 'shipment', 'category', 'sub_category', 'areas'])
            ->when($request->search, function ($query) use ($request) {
                $query->where('data', 'like', '%' . $request->search . '%');
            })
            ->when($request->category_id, function ($query) use ($request) {
                $query->where('category_id', $request->category_id);
            })
            ->when($request->sub_category_id, function ($query) use ($request) {
                $query->where('sub_category_id', $request->sub_category_id);
            })
            ->when($request->area_id, function ($query) use ($request) {
                $query->whereHas('areas', function ($q) use ($request) {
                    $q->where('areas.id', $request->area_id);
                });
            })
            ->when($request->sort_by, function ($query) use ($request) {
                if ($request->sort_by == 'quantity_asc') {
                    $query->orderBy('available_quantity', 'asc');
                } elseif ($request->sort_by == 'quantity_desc') {
                    $query->orderBy('available_quantity', 'desc');
                }
            }, function ($query) {
                $query->orderBy('id', 'desc');
            })
            ->get();

        $categories = Category::get();
        $subCategories = SubCategory::get();
        $areas = Area::get();
        $languages = $this->languages;

        return view('admin.sections.product.index', compact(
            'page_title',
            'product',
            'languages',
            'categories',
            'subCategories',
            'areas'
        ));
    }
    public function create(Product $product)
    {
        $page_title = __("Create Product");
        $languages  = $this->languages;
        $category   = Category::with('sub_category')->where('status', true)->get();

        $areas    = Area::where('status', true)->get();
        $unit     = Unit::where('status', true)->get();
        $product_areas = $product->areas->pluck('id')->toArray();
        $shipment = Shipment::get();
        return view('admin.sections.product.create', compact('page_title', 'product_areas', 'category', 'areas', 'unit', 'languages', 'shipment'));
    }

    /**
     * Store a newly created  category in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image'             => 'required|image|mimes:png,jpg,webp,svg,jpeg|max:500',
            'meta_image'        => 'required|image|mimes:png,jpg,webp,svg,jpeg',
            'images'          => 'nullable|array',
            'images.*'        => 'image|mimes:png,jpg,webp,svg,jpeg|max:2048',
            'price'             => 'required',
            'areas'             => 'nullable|array',
            'areas.*'           => 'exists:areas,id',
            'offer_price'       => 'nullable|numeric|min:0|lte:price',
            'quantity'          => 'required',
            'order_quantity'    => 'required',
        ], [
            'offer_price.lte' => 'The offer price must be less than or equal to the regular price.'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('modal', 'product-add');
        }

        $validated        = $validator->validate();
        $basic_field_name = [
            'name'             => 'required|string',
            'description'      => 'required|string',
            'meta_title'       => 'required|string',
            'meta_description' => 'required|string',
        ];

        $language_wise_data = $this->contentValidate($request, $basic_field_name, "product-add");
        if ($language_wise_data instanceof RedirectResponse) {
            return $language_wise_data;
        }

        $details_data['language'] = $language_wise_data;

        $validated['data']            = $details_data;
        $validated['category_id']     = $request->category_id;
        $validated['sub_category_id'] = $request->sub_category_id;

        $validated['uuid']               = Str::uuid();
        $validated['status']             = true;
        // $validated['area_id']            = $request->area_id;
        $validated['unit_id']            = $request->unit_id;
        $validated['shipment_id']        = $request->shipment_id;
        $validated['price']              = $request->price;
        $validated['offer_price']        = $request->offer_price;
        $validated['quantity']           = $request->quantity;
        $validated['order_quantity']     = $request->order_quantity;
        $validated['available_quantity'] = $request->quantity;

        if ($request->popular) {
            $validated['popular'] = true;
        } else {
            $validated['popular'] = false;
        }

        if ($request->hasFile('image')) {
            $image     = $request->file('image');
            $imageName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('frontend/images/site-section'), $imageName);
            $validated['image'] = $imageName;
        }

        if ($request->hasFile('meta_image')) {
            $image     = $request->file('meta_image');
            $imageName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('frontend/images/site-section'), $imageName);
            $validated['meta_image'] = $imageName;
        }
        
          // 3. Save Gallery Images (Loop through the inputs)
        $galleryImages = [];
        if ($request->hasFile('images')) {
            // $request->file('images') is an array because inputs are named images[]
            foreach ($request->file('images') as $galleryImage) {
                $galleryImageName = Str::uuid() . '.' . $galleryImage->getClientOriginalExtension();
                $galleryImage->move(public_path('frontend/images/site-section'), $galleryImageName);
                $galleryImages[] = $galleryImageName;
            }
        }
        // Add to validated data (Model casts 'images' => 'array' handles JSON encoding)
        $validated['images'] = $galleryImages;

        try {
            $product =   Product::create($validated);
            if ($request->has('areas')) {
                $product->areas()->sync($request->input('areas'));
            }
            return redirect()->route('admin.product.index')->with(['success' => [__('Product Saved Successfully!')]]);
        } catch (Exception $e) {
            return back()->withErrors($validated)->withInput()->with(['error' => [__('Something went wrong! Please try again.')]]);
        }
    }

    /**
     * Update the status
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function statusUpdate(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'status'      => 'required|boolean',
            'data_target' => 'required|string',
        ]);

        $validated = $validator->safe()->all();
        $id        = $validated['data_target'];

        $product = Product::find($id);
        if (!$product) {
            $error = ['error' => [__('product record not found in our system.')]];
            return Response::error($error, null, 404);
        }

        try {
            // Toggle the status of the product
            $product->update([
                'status' => !$validated['status'],
            ]);
        } catch (Exception $e) {
            $error = ['error' => [__('Something went wrong!. Please try again.')]];
            return Response::error($error, null, 500);
        }

        $success = ['success' => [__('product status updated successfully!')]];
        return Response::success($success, null, 200);
    }

    public function edit($id)
    {
        $page_title = __("Product Edit");
        $product    = Product::where('id', $id)->with('unit')->first();
        $product_areas = $product->areas->pluck('id')->toArray();
        $category   = Category::with('sub_category')->where('status', true)->get();
        $areas      = Area::where('status', true)->get();
        $unit       = Unit::where('status', true)->get();
        $shipment   = Shipment::get();
        $languages  = $this->languages;
        return view('admin.sections.product.edit', compact('page_title', 'product_areas', 'product', 'areas', 'category', 'unit', 'shipment', 'languages'));
    }

    /**
     * Update the specified
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
       
        if (!isset($request->target)) {
            return back()->with(['error' => [__('Target not found!')]]);
        }

        $product = Product::find($request->target);
        if (!$product) {
            return back()->with(['error' => [__('Product not found!')]]);
        }

        $validator = Validator::make($request->all(), [
            'price'                   => 'required',
            'areas'          => 'nullable|array',
            'areas.*'        => 'exists:areas,id',
             // VALIDATION FOR GALLERY IMAGES
            'images'             => 'nullable|array',
            'images.*'           => 'image|mimes:png,jpg,webp,svg,jpeg|max:2048',
            'order_quantity'          => 'required',
            'offer_price'             => 'nullable|numeric|min:0|lte:price',
            [
                'offer_price.lte' => 'The offer price must be less than or equal to the regular price.'
            ]
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput($request->all());
        }

        $basic_field_name = [
            'name'             => 'required|string',
            'description'      => 'required|string',
            'meta_title'       => 'required|string',
            'meta_description' => 'required|string',
        ];

        $language_wise_data = $this->contentValidate($request, $basic_field_name, "");

        if ($language_wise_data instanceof RedirectResponse) {
            return $language_wise_data;
        }

        $details_data['language']     = $language_wise_data;
        $validated['data']            = $details_data;
        $validated['sub_category_id'] = $request->sub_category_id;
        $validated['category_id']     = $request->category_id;
        $validated['area_id']         = $request->area_id;
        $validated['price']           = $request->price;
        $validated['offer_price']     = $request->offer_price;
        $validated['quantity']        = $request->quantity;
        $validated['order_quantity']  = $request->order_quantity;

        // Initialize available_quantity properly
        if($request->quantity > $product->available_quantity){
           
             $validated['available_quantity'] = $product->available_quantity + $request->quantity;
        }else{
              
             $validated['available_quantity'] = $product->available_quantity - $request->quantity;
        }
       

        $validated['unit_id']     = $request->unit_id;
        $validated['shipment_id'] = $request->shipment_id;

        if ($request->popular) {
            $validated['popular'] = true;
        } else {
            $validated['popular'] = false;
        }

        if ($request->hasFile('image')) {
            $image     = $request->file('image');
            $imageName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('frontend/images/site-section'), $imageName);
            $validated['image'] = $imageName;
        }

        if ($request->hasFile('meta_image')) {
            $image     = $request->file('meta_image');
            $imageName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('frontend/images/site-section'), $imageName);
            $validated['meta_image'] = $imageName;
        }
        
           if ($request->hasFile('images')) {
            // 1. Get existing images (default to empty array if null)
            $existingImages = $product->images ?? [];
            
            $newImages = [];
            foreach ($request->file('images') as $galleryImage) {
                $galleryImageName = Str::uuid() . '.' . $galleryImage->getClientOriginalExtension();
                $galleryImage->move(public_path('frontend/images/site-section'), $galleryImageName);
                $newImages[] = $galleryImageName;
            }
            
            // 2. Merge existing and new images so we don't lose the old ones
            $validated['images'] = array_merge($existingImages, $newImages);
        }
        // END: Update Gallery Logic


        try {
            $product->update($validated);
            // Sync areas if they exist in request
            if ($request->has('areas')) {
                $product->areas()->sync($request->areas);
            } else {
                // If no areas provided, detach all (optional - remove if you want to keep existing)
                $product->areas()->detach();
            }
            return redirect()->route('admin.product.index')->with(['success' => [__('Product Updated Successfully!')]]);
        } catch (Exception $e) {

            return back()->with(['error' => [__('Something went wrong! Please try again.')]]);
        }
    }

    /**
     * Delete the specified sports category.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'target' => 'required|string',
        ]);

        $validated = $validator->validate();
        $package   = Product::find($validated['target']);

        try {
            // Delete the sports category
            $package->delete();
            return back()->with(['success' => [__('Product deleted successfully!')]]);
        } catch (Exception $e) {
            return back()->with(['error' => [__('Something went wrong! Please try again.')]]);
        }
    }

    /**
     * Validate request data and re-decorate language-wise data.
     *
     * @param \Illuminate\Http\Request $request
     * @param array $basic_field_name
     * @param string|null $modal
     * @return array|\Illuminate\Http\RedirectResponse
     */
    public function contentValidate($request, $basic_field_name, $modal = null)
    {
        $languages          = $this->languages();
        $current_local      = get_default_language_code();
        $validation_rules   = [];
        $language_wise_data = [];

        // Iterate through each request input and validate based on language
        foreach ($request->all() as $input_name => $input_value) {
            foreach ($languages as $language) {
                $input_name_check = explode("_", $input_name);
                $input_lang_code  = array_shift($input_name_check);
                $input_name_check = implode("_", $input_name_check);

                if ($input_lang_code == $language['code']) {
                    if (array_key_exists($input_name_check, $basic_field_name)) {
                        $langCode                      = $language['code'];
                        $validation_rules[$input_name] = ($current_local == $langCode)
                            ? $basic_field_name[$input_name_check]
                            : str_replace("required", "nullable", $basic_field_name[$input_name_check]);

                        $language_wise_data[$langCode][$input_name_check] = $input_value;
                    }
                    break;
                }
            }
        }

        if ($modal == null) {
            Validator::make($request->all(), $validation_rules)->validate();
        } else {
            $validator = Validator::make($request->all(), $validation_rules);
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput()->with("modal", $modal);
            }
            $validator->validate();
        }

        return $language_wise_data;
    }

    /**
     * Get languages from the record with little modification for using only this class.
     *
     * @return array
     */
    public function languages()
    {
        $languages = Language::whereNot('code', LanguageConst::NOT_REMOVABLE)
            ->select("code", "name")
            ->get()
            ->toArray();

        $languages[] = [
            'name' => LanguageConst::NOT_REMOVABLE_CODE,
            'code' => LanguageConst::NOT_REMOVABLE,
        ];

        return $languages;
    }
}
