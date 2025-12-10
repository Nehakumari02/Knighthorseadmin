<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Helpers\Response;
use App\Models\Admin\Category;
use App\Models\Admin\Language;
use App\Constants\LanguageConst;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    protected $languages;

    public function __construct()
    {
        $this->languages = Language::get();
    }

    /**
     * Display a listing of the  categories.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $page_title = __("Categories");
        $category   = Category::orderBy('id')->get();
        $languages  = $this->languages;

        return view('admin.sections.categories.index', compact('page_title', 'category', 'languages'));
    }
    public function create()
    {
        $page_title = __("Create Categories");
        $languages  = $this->languages;
        return view('admin.sections.categories.create', compact('page_title', 'languages'));
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
            'image'     => 'required|image|mimes:png,jpg,webp,svg,jpeg',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('modal', 'categories-add');
        }

        $validated        = $validator->validate();
        $basic_field_name = [
            'name'  => 'required|string',
            'title' => 'required|string',
        ];

        $language_wise_data = $this->contentValidate($request, $basic_field_name, "categories-add");
        if ($language_wise_data instanceof RedirectResponse) {
            return $language_wise_data;
        }

        $details_data['language'] = $language_wise_data;

        $validated['data']   = $details_data;
        $validated['uuid']   = Str::uuid();
        $validated['user_type'] = $request->user_type ?? 'general'; // 👈 new line


        if ($request->hasFile('image')) {
            $image     = $request->file('image');
            $imageName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('frontend/images/site-section'), $imageName);
            $validated['image'] = $imageName;
        }



        try {
            Category::create($validated);
            return redirect()->route('admin.product.categories.index')->with(['success' => [__('Category Saved Successfully!')]]);
        } catch (Exception $e) {
            return back()->withErrors($validated)->withInput()->with(['error' => [__('Something went wrong! Please try again.')]]);
        }
    }

    /**
     * Update the status of a sports category.
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

        // Find the sports category by ID
        $category = Category::find($id);
        if (!$category) {
            $error = ['error' => [__('Category record not found in our system.')]];
            return Response::error($error, null, 404);
        }

        try {
            // Toggle the status of the sports category
            $category->update([
                'status' => !$validated['status'],
            ]);
        } catch (Exception $e) {
            $error = ['error' => [__('Something went wrong!. Please try again.')]];
            return Response::error($error, null, 500);
        }

        $success = ['success' => [__('Category status updated successfully!')]];
        return Response::success($success, null, 200);
    }

    public function edit($id)
    {
        $page_title = __("Create Categories");
        $category   = Category::where('id', $id)->first();
        $languages  = $this->languages;
        return view('admin.sections.categories.edit', compact('page_title', 'category', 'languages'));
    }

    /**
     * Update the specified sports category.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        if (!isset($request->target)) {
            return back()->with(['error' => [__('Target not found!')]]);
        }

        $category = Category::find($request->target);
        if (!$category) {
            return back()->with(['error' => [__('Category not found!')]]);
        }

        $basic_field_name = [
            'name'  => 'required|string',
            'title' => 'required|string',
        ];

        $language_wise_data = $this->contentValidate($request, $basic_field_name, "edit-category");

        if ($language_wise_data instanceof RedirectResponse) {
            return $language_wise_data;
        }

        $details_data['language'] = $language_wise_data;
        $validated['data']        = $details_data;
            $validated['user_type'] = $request->user_type ?? $category->user_type;


        if ($request->hasFile('image')) {
            $image     = $request->file('image');
            $imageName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('frontend/images/site-section'), $imageName);
            $validated['image'] = $imageName;
        }

        try {
            $category->update($validated);
            return redirect()->route('admin.product.categories.index')->with(['success' => [__('Category Update Successfully!')]]);
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
        // Validate the request
        $validator = Validator::make($request->all(), [
            'target' => 'required|string',
        ]);

        $validated = $validator->validate();
        $package   = Category::find($validated['target']);

        try {
            // Delete the sports category
            $package->delete();
            return back()->with(['success' => [__('Category deleted successfully!')]]);
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
