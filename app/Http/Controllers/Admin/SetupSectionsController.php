<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin\Language;
use App\Constants\LanguageConst;
use App\Models\Admin\SiteSections;
use App\Constants\SiteSectionConst;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class SetupSectionsController extends Controller
{
    protected $languages;

    public function __construct()
    {
        $this->languages = Language::get();
    }

    /**
     * Register Sections with their slug
     * @param string $slug
     * @param string $type
     * @return string
     */
    public function section($slug, $type)
    {
        $sections = [
            'banner'    => [
                'view'          => "bannerView",
                'itemStore'     => "bannerItemStore",
                'itemUpdate'    => "bannerItemUpdate",
                'itemDelete'    => "bannerItemDelete"
            ],
            'special-offer'    => [
                'view'          => "specialOfferView",
                'itemStore'     => "specialOfferItemStore",
                'itemUpdate'    => "specialOfferItemUpdate",
                'itemDelete'    => "specialOfferItemDelete"
            ],
            'brand'  => [
                'view'          => "brandView",
                'update'        => "brandUpdate",
                'itemStore'     => "brandItemStore",
                'itemUpdate'    => "brandItemUpdate",
                'itemDelete'    => "brandItemDelete"
            ],
            'download-app'      => [
                'view'          => "downloadAppView",
                'update'        => "downloadAppUpdate",
                'itemStore'     => "downloadAppItemStore",
                'itemUpdate'    => "downloadAppItemUpdate",
                'itemDelete'    => "downloadAppItemDelete"
            ],
                'footer'      => [
                'view'          => "footerView",
                'update'        => "footerUpdate",
            ],
        ];

        if (!array_key_exists($slug, $sections)) {
            abort(404);
        }
        if (!isset($sections[$slug][$type])) {
            abort(404);
        }
        $next_step = $sections[$slug][$type];
        return $next_step;
    }

    /**
     * Method for getting specific step based on incoming request
     * @param string $slug
     * @return method
     */
    public function sectionView($slug)
    {
        $section = $this->section($slug, 'view');
        return $this->$section($slug);
    }

    /**
     * Method for distribute store method for any section by using slug
     * @param string $slug
     * @param \Illuminate\Http\Request  $request
     * @return method
     */
    public function sectionItemStore(Request $request, $slug)
    {
        $section = $this->section($slug, 'itemStore');
        return $this->$section($request, $slug);
    }

    /**
     * Method for distribute update method for any section by using slug
     * @param string $slug
     * @param \Illuminate\Http\Request  $request
     * @return method
     */
    public function sectionItemUpdate(Request $request, $slug)
    {
        $section = $this->section($slug, 'itemUpdate');
        return $this->$section($request, $slug);
    }

    /**
     * Method for distribute delete method for any section by using slug
     * @param string $slug
     * @param \Illuminate\Http\Request  $request
     * @return method
     */
    public function sectionItemDelete(Request $request, $slug)
    {
        $section = $this->section($slug, 'itemDelete');
        return $this->$section($request, $slug);
    }

    /**
     * Method for distribute update method for any section by using slug
     * @param string $slug
     * @param \Illuminate\Http\Request  $request
     * @return method
     */
    public function sectionUpdate(Request $request, $slug)
    {
        $section = $this->section($slug, 'update');
        return $this->$section($request, $slug);
    }

    /**
     * Method for show banner section page
     * @param string $slug
     * @return view
     */
    public function bannerView($slug)
    {
        $page_title   = "Banner Section";
        $section_slug = Str::slug(SiteSectionConst::BANNER_SECTION);
        $data         = SiteSections::getData($section_slug)->first();
        $languages    = $this->languages;

        return view('admin.sections.setup-sections.banner-section', compact(
            'page_title',
            'data',
            'languages',
            'slug',
        ));
    }


    /**
     * Method for store banner item
     * @param string $slug
     * @param \Illuminate\Http\Request  $request
     */
    public function bannerItemStore(Request $request, $slug)
    {





        $slug    = Str::slug(SiteSectionConst::BANNER_SECTION);
        $section = SiteSections::where("key", $slug)->first();

        if ($section != null) {
            $section_data = json_decode(json_encode($section->value), true);
        } else {
            $section_data = [];
        }

        $unique_id = uniqid();

        $validator = Validator::make($request->all(), [
            'image' => 'nullable|file',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        }

        $validated = $validator->validate();

        $section_data['items'][$unique_id]['image'] = "";

        if ($request->hasFile('image')) {

            if (!empty($section_data['items'][$unique_id]['image'])) {
                Storage::disk('site-section')->delete($section_data['items'][$unique_id]['image']);
            }

            $section_data['items'][$unique_id]['image'] = $request->file('image')->storeAs('', $request->file('image')->getClientOriginalName(), 'site-section');
        }

        $section_data['items'][$unique_id]['id'] = $unique_id;

        $update_data['key']   = $slug;
        $update_data['value'] = $section_data;

        try {
            SiteSections::updateOrCreate(['key' => $slug], $update_data);
        } catch (Exception $e) {
            return back()->with(['error' => ['Something went wrong! Please try again.']]);
        }
        return back()->with(['success' => ['Section item added successfully!']]);
    }

    /**
     * Method for update banner item
     * @param string $slug
     * @return view
     */
    public function bannerItemUpdate(Request $request, $slug)
    {
        // Validate target field
        $request->validate([
            'target' => "required|string",
        ]);



        // Get section by slug
        $slug    = Str::slug(SiteSectionConst::BANNER_SECTION);
        $section = SiteSections::where("key", $slug)->first();

        if (!$section) {
            return back()->with(['error' => ['Section not found!']]);
        }

        $section_values = json_decode(json_encode($section->value), true);

        if (!isset($section_values['items'][$request->target])) {
            return back()->with(['error' => ['Section item not found!']]);
        }

        // Validate image upload
        $validator = Validator::make($request->all(), [
            'image_edit' => 'nullable|file',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        }

        if ($request->hasFile("image_edit")) {
            // Delete old image if exists
            if (!empty($section_values['items'][$request->target]['image_edit'])) {
                Storage::disk('site-section')->delete($section_values['items'][$request->target]['image_edit']);
            }
            // Store new image
            $section_values['items'][$request->target]['image'] = $request->file("image_edit")->storeAs('', $request->file("image_edit")->getClientOriginalName(), 'site-section');
        }

        try {
            $section->update([
                'value' => $section_values,
            ]);
        } catch (Exception $e) {
            return back()->with(['error' => ['Something went wrong! Please try again.']]);
        }

        return back()->with(['success' => ['Section item updated successfully!']]);
    }

    /**
     * Method for delete banner item
     * @param string $slug
     * @return view
     */
    public function bannerItemDelete(Request $request, $slug)
    {
        $request->validate([
            'target' => 'required|string',
        ]);

        $slug    = Str::slug(SiteSectionConst::BANNER_SECTION);
        $section = SiteSections::getData($slug)->first();
        if (!$section) {
            return back()->with(['error' => ['Section not found!']]);
        }
        $section_values = json_decode(json_encode($section->value), true);
        if (!isset($section_values['items'])) {
            return back()->with(['error' => ['Section Item not Found!']]);
        }
        if (!array_key_exists($request->target, $section_values['items'])) {
            return back()->with(['error' => ['Section item is invalid']]);
        }

        try {
            unset($section_values['items'][$request->target]);
            $section->update([
                'value' => $section_values,
            ]);
        } catch (Exception $e) {
            return back()->with(['error' => ['Something went wrong! Please try again.']]);
        }
        return back()->with(['success' => ['Section item deleted successfully!']]);
    }

    //special offer section started

    /**
     * Method for show banner section page
     * @param string $slug
     * @return view
     */
    public function specialOfferView($slug)
    {
        $page_title   = "Offer Section";
        $section_slug = Str::slug(SiteSectionConst::SPECIAL_OFFER_SECTION);
        $data         = SiteSections::getData($section_slug)->first();
        $languages    = $this->languages;

        return view('admin.sections.setup-sections.offer-section', compact(
            'page_title',
            'data',
            'languages',
            'slug',
        ));
    }


    /**
     * Method for store banner item
     * @param string $slug
     * @param \Illuminate\Http\Request  $request
     */
    public function specialOfferItemStore(Request $request, $slug)
    {

        $basic_field_name = [
            'item_name'    => "required|string|max:2555",
            'item_offer'   => "required|string|max:2555",
        ];
        $language_wise_data = $this->contentValidate($request, $basic_field_name, "offer-add");
        if ($language_wise_data instanceof RedirectResponse) {
            return $language_wise_data;
        }
        $slug    = Str::slug(SiteSectionConst::SPECIAL_OFFER_SECTION);
        $section = SiteSections::where("key", $slug)->first();

        if ($section != null) {
            $section_data = json_decode(json_encode($section->value), true);
        } else {
            $section_data = [];
        }

        $unique_id = uniqid();

        $validator = Validator::make($request->all(), [
            'price' => 'required',
            'image' => 'nullable|file',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        }

        $validated = $validator->validate();

        $section_data['items'][$unique_id]['image'] = "";

        if ($request->hasFile('image')) {

            if (!empty($section_data['items'][$unique_id]['image'])) {
                Storage::disk('site-section')->delete($section_data['items'][$unique_id]['image']);
            }

            $section_data['items'][$unique_id]['image'] = $request->file('image')->storeAs('', $request->file('image')->getClientOriginalName(), 'site-section');
        }

        $section_data['items'][$unique_id]['language'] = $language_wise_data;
        $section_data['items'][$unique_id]['id']       = $unique_id;
        $section_data['items'][$unique_id]['price']    = $validated['price'];

        $update_data['key']   = $slug;
        $update_data['value'] = $section_data;

        try {
            SiteSections::updateOrCreate(['key' => $slug], $update_data);
        } catch (Exception $e) {
            return back()->with(['error' => ['Something went wrong! Please try again.']]);
        }
        return back()->with(['success' => ['Section item added successfully!']]);
    }

    /**
     * Method for update banner item
     * @param string $slug
     * @return view
     */
    public function specialOfferItemUpdate(Request $request, $slug)
    {
        // Validate target field
        $request->validate([
            'target' => "required|string",
        ]);

        $basic_field_name = [
            'item_name_edit'       => "required|string|max:2555",
            'item_offer_edit'      => "required|string|max:2555",
        ];

        // Get section by slug
        $slug    = Str::slug(SiteSectionConst::SPECIAL_OFFER_SECTION);
        $section = SiteSections::where("key", $slug)->first();

        if (!$section) {
            return back()->with(['error' => ['Section not found!']]);
        }

        $section_values = json_decode(json_encode($section->value), true);

        if (!isset($section_values['items'][$request->target])) {
            return back()->with(['error' => ['Section item not found!']]);
        }

        $language_wise_data = $this->contentValidate($request, $basic_field_name, "offer-edit");
        if ($language_wise_data instanceof RedirectResponse) {
            return $language_wise_data;
        }

        $language_wise_data = array_map(function ($language) {
            return replace_array_key($language, "_edit");
        }, $language_wise_data);
        // Validate image upload
        $validator = Validator::make($request->all(), [
            'image_edit'    => 'nullable|file',
            'price'         => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput()->with('modal', 'offer-edit');
        }
        $validated = $validator->validate();

        if ($request->hasFile("image_edit")) {
            // Delete old image if exists
            if (!empty($section_values['items'][$request->target]['image_edit'])) {
                Storage::disk('site-section')->delete($section_values['items'][$request->target]['image_edit']);
            }
            // Store new image
            $section_values['items'][$request->target]['image'] = $request->file("image_edit")->storeAs('', $request->file("image_edit")->getClientOriginalName(), 'site-section');
        }

        $section_values['items'][$request->target]['language'] = $language_wise_data;
        $section_values['items'][$request->target]['price']    = $validated['price'];

        try {
            $section->update([
                'value' => $section_values,
            ]);
        } catch (Exception $e) {
            return back()->with(['error' => ['Something went wrong! Please try again.']]);
        }

        return back()->with(['success' => ['Section item updated successfully!']]);
    }

    /**
     * Method for delete banner item
     * @param string $slug
     * @return view
     */
    public function specialOfferItemDelete(Request $request, $slug)
    {
        $request->validate([
            'target' => 'required|string',
        ]);

        $slug    = Str::slug(SiteSectionConst::SPECIAL_OFFER_SECTION);
        $section = SiteSections::getData($slug)->first();
        if (!$section) {
            return back()->with(['error' => ['Section not found!']]);
        }
        $section_values = json_decode(json_encode($section->value), true);
        if (!isset($section_values['items'])) {
            return back()->with(['error' => ['Section Item not Found!']]);
        }
        if (!array_key_exists($request->target, $section_values['items'])) {
            return back()->with(['error' => ['Section item is invalid']]);
        }

        try {
            unset($section_values['items'][$request->target]);
            $section->update([
                'value' => $section_values,
            ]);
        } catch (Exception $e) {
            return back()->with(['error' => ['Something went wrong! Please try again.']]);
        }
        return back()->with(['success' => ['Section item deleted successfully!']]);
    }


    //special offer section end


    /**
     * Method for show download app section
     * @param string $slug
     * @param \Illuminate\Http\Request $request
     */
    public function brandView($slug)
    {
        $page_title   = "Brand Section";
        $section_slug = Str::slug(SiteSectionConst::BRAND_SECTION);
        $data         = SiteSections::getData($section_slug)->first();
        $languages    = $this->languages;

        return view('admin.sections.setup-sections.brand', compact(
            'page_title',
            'data',
            'languages',
            'slug'
        ));
    }
    /**
     * Method for update download app section
     * @param string
     * @param \Illuminate\\Http\Request $request
     */

    public function brandUpdate(Request $request, $slug)
    {
        $basic_field_name = [
            'heading'       => 'required|string|max:100',
        ];

        $slug    = Str::slug(SiteSectionConst::BRAND_SECTION);
        $section = SiteSections::where("key", $slug)->first();

        if ($section != null) {
            $data = json_decode(json_encode($section->value), true);
        } else {
            $data = [];
        }
        $validator = Validator::make($request->all(), [
            'image'            => "nullable|image|mimes:jpg,png,svg,webp|max:10240",
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        }

        $validated = $validator->validate();


        $data['language']     = $this->contentValidate($request, $basic_field_name);
        $update_data['key']   = $slug;
        $update_data['value'] = $data;
        try {
            SiteSections::updateOrCreate(['key' => $slug], $update_data);
        } catch (Exception $e) {
            return back()->with(['error' => ['Something went wrong! Please try again.']]);
        }
        return back()->with(['success' => ['Section updated successfully!']]);
    }

    /**
     * Method for store download app item
     * @param string $slug
     * @param \Illuminate\Http\Request  $request
     */
    public function brandItemStore(Request $request, $slug)
    {

        $slug    = Str::slug(SiteSectionConst::BRAND_SECTION);
        $section = SiteSections::where("key", $slug)->first();

        if ($section != null) {
            $section_data = json_decode(json_encode($section->value), true);
        } else {
            $section_data = [];
        }
        $unique_id = uniqid();

        $validator = Validator::make($request->all(), [
            'image'           => "nullable|image|mimes:jpg,png,svg,webp|max:10240",
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput()->with('modal', 'brand-add');
        }
        $validated = $validator->validate();

        $section_data['items'][$unique_id]['id']         = $unique_id;
        $section_data['items'][$unique_id]['image']      = "";
        $section_data['items'][$unique_id]['created_at'] = now();
        if ($request->hasFile("image")) {
            $section_data['items'][$unique_id]['image'] = $this->imageValidate($request, "image", $section->value->items->image ?? null);
        }

        $update_data['key']   = $slug;
        $update_data['value'] = $section_data;
        try {
            SiteSections::updateOrCreate(['key' => $slug], $update_data);
        } catch (Exception $e) {
            return back()->with(['error' => ['Something went wrong! Please try again']]);
        }

        return back()->with(['success' => ['Section item added successfully!']]);
    }
    /**
     * Method for update download app item
     * @param string $slug
     * @return view
     */
    public function brandItemUpdate(Request $request, $slug)
    {
        $request->validate([
            'target'           => 'required|string',
        ]);


        $slug    = Str::slug(SiteSectionConst::BRAND_SECTION);
        $section = SiteSections::getData($slug)->first();
        if (!$section) {
            return back()->with(['error' => ['Section not found!']]);
        }
        $section_values = json_decode(json_encode($section->value), true);
        if (!isset($section_values['items'])) {
            return back()->with(['error' => ['Section item not found!']]);
        }
        if (!array_key_exists($request->target, $section_values['items'])) {
            return back()->with(['error' => ['Section item is invalid!']]);
        }

        $request->merge(['old_image' => $section_values['items'][$request->target]['image'] ?? null]);

        $validator = Validator::make($request->all(), [
            'image'                  => "nullable|image|mimes:jpg,png,svg,webp|max:10240",
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput()->with('modal', 'brand-edit');
        }
        $validated = $validator->validate();


        if ($request->hasFile("image")) {
            $section_values['items'][$request->target]['image'] = $this->imageValidate($request, "image", $section_values['items'][$request->target]['image'] ?? null);
        }
        try {
            $section->update([
                'value' => $section_values,
            ]);
        } catch (Exception $e) {
            return back()->with(['error' => ['Something went wrong! Please try again']]);
        }

        return back()->with(['success' => ['Information updated successfully!']]);
    }

    /**
     * Method for delete download app item
     * @param string $slug
     * @return view
     */
    public function brandItemDelete(Request $request, $slug)
    {
        $request->validate([
            'target'     => 'required|string',
        ]);

        $slug    = Str::slug(SiteSectionConst::BRAND_SECTION);
        $section = SiteSections::getData($slug)->first();
        if (!$section) {
            return back()->with(['error' => ['Section not found!']]);
        }
        $section_values = json_decode(json_encode($section->value), true);
        if (!isset($section_values['items'])) {
            return back()->with(['error' => ['Section item not found!']]);
        }
        if (!array_key_exists($request->target, $section_values['items'])) {
            return back()->with(['error' => ['Section item is invalid!']]);
        }

        try {
            $image_name = $section_values['items'][$request->target]['image'];
            unset($section_values['items'][$request->target]);
            $image_path = get_files_path('site-section') . '/' . $image_name;
            delete_file($image_path);
            $section->update([
                'value'    => $section_values,
            ]);
        } catch (Exception $e) {
            return back()->with(['error' => ['Something went wrong! Please try again.']]);
        }
        return back()->with(['success' => ['Section item deleted successfully!']]);
    }

    /**
     * Method for show download app section
     * @param string $slug
     * @param \Illuminate\Http\Request $request
     */
    public function downloadAppView($slug)
    {
        $page_title   = "Download App Section";
        $section_slug = Str::slug(SiteSectionConst::DOWNLOAD_APP_SECTION);
        $data         = SiteSections::getData($section_slug)->first();
        $languages    = $this->languages;

        return view('admin.sections.setup-sections.download-app-section', compact(
            'page_title',
            'data',
            'languages',
            'slug'
        ));
    }
    /**
     * Method for update download app section
     * @param string
     * @param \Illuminate\\Http\Request $request
     */

    public function downloadAppUpdate(Request $request, $slug)
    {
        $basic_field_name = [
            'heading'       => 'required|string|max:100',
            'sub_heading'   => 'required|string',
        ];

        $slug    = Str::slug(SiteSectionConst::DOWNLOAD_APP_SECTION);
        $section = SiteSections::where("key", $slug)->first();

        if ($section != null) {
            $data = json_decode(json_encode($section->value), true);
        } else {
            $data = [];
        }
        $validator = Validator::make($request->all(), [
            'image'            => "nullable|image|mimes:jpg,png,svg,webp|max:10240",
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        }

        $validated = $validator->validate();

        $data['image'] = $section->value->image ?? "";

        if ($request->hasFile("image")) {
            $data['image'] = $this->imageValidate($request, "image", $section->value->image ?? null);
        }

        $data['language']     = $this->contentValidate($request, $basic_field_name);
        $update_data['key']   = $slug;
        $update_data['value'] = $data;
        try {
            SiteSections::updateOrCreate(['key' => $slug], $update_data);
        } catch (Exception $e) {
            return back()->with(['error' => ['Something went wrong! Please try again.']]);
        }
        return back()->with(['success' => ['Section updated successfully!']]);
    }



    /**
    * Method for show download app section
    * @param string $slug
    * @param \Illuminate\Http\Request $request
    */
    public function footerView($slug)
    {

        $page_title   = "Footer Section";
        $section_slug = Str::slug(SiteSectionConst::FOOTER);
        $data         = SiteSections::getData($section_slug)->first();
        $languages    = $this->languages;

        return view('admin.sections.setup-sections.footer', compact(
            'page_title',
            'data',
            'languages',
            'slug'
        ));
    }
    /**
     * Method for update download app section
     * @param string
     * @param \Illuminate\\Http\Request $request
     */

    public function footerUpdate(Request $request, $slug)
    {
        $basic_field_name = [
            'heading'       => 'required|string|max:100',

        ];

        $slug    = Str::slug(SiteSectionConst::FOOTER);
        $section = SiteSections::where("key", $slug)->first();

        if ($section != null) {
            $data = json_decode(json_encode($section->value), true);
        } else {
            $data = [];
        }


        $data['language']     = $this->contentValidate($request, $basic_field_name);
        $update_data['key']   = $slug;
        $update_data['value'] = $data;
        try {
            SiteSections::updateOrCreate(['key' => $slug], $update_data);
        } catch (Exception $e) {
            return back()->with(['error' => ['Something went wrong! Please try again.']]);
        }
        return back()->with(['success' => ['Section updated successfully!']]);
    }
    /**
     * Method for store download app item
     * @param string $slug
     * @param \Illuminate\Http\Request  $request
     */
    public function downloadAppItemStore(Request $request, $slug)
    {
        $basic_field_name = [
            'item_title'    => "required|string|max:2555",
            'item_heading'  => "required|string|max:2555",
        ];

        $language_wise_data = $this->contentValidate($request, $basic_field_name, "download-app-add");
        if ($language_wise_data instanceof RedirectResponse) {
            return $language_wise_data;
        }
        $slug    = Str::slug(SiteSectionConst::DOWNLOAD_APP_SECTION);
        $section = SiteSections::where("key", $slug)->first();

        if ($section != null) {
            $section_data = json_decode(json_encode($section->value), true);
        } else {
            $section_data = [];
        }
        $unique_id = uniqid();

        $validator = Validator::make($request->all(), [
            'icon'            => "required|string|max:100",
            'link'            => "required|url",
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput()->with('modal', 'download-app-add');
        }
        $validated = $validator->validate();

        $section_data['items'][$unique_id]['language']   = $language_wise_data;
        $section_data['items'][$unique_id]['id']         = $unique_id;
        $section_data['items'][$unique_id]['link']       = $validated['link'];
        $section_data['items'][$unique_id]['icon']       = $validated['icon'];
        $section_data['items'][$unique_id]['created_at'] = now();


        $update_data['key']   = $slug;
        $update_data['value'] = $section_data;
        try {
            SiteSections::updateOrCreate(['key' => $slug], $update_data);
        } catch (Exception $e) {
            return back()->with(['error' => ['Something went worng! Please try again']]);
        }

        return back()->with(['success' => ['Section item added successfully!']]);
    }
    /**
     * Method for update download app item
     * @param string $slug
     * @return view
     */
    public function downloadAppItemUpdate(Request $request, $slug)
    {
        $request->validate([
            'target'           => 'required|string',
        ]);

        $basic_field_name = [
            'item_title_edit'       => "required|string|max:2555",
            'item_heading_edit'     => "required|string|max:2555",
            'icon_edit'             => "required|string|max:2555",
        ];



        $slug    = Str::slug(SiteSectionConst::DOWNLOAD_APP_SECTION);
        $section = SiteSections::getData($slug)->first();
        if (!$section) {
            return back()->with(['error' => ['Section not found!']]);
        }
        $section_values = json_decode(json_encode($section->value), true);
        if (!isset($section_values['items'])) {
            return back()->with(['error' => ['Section item not found!']]);
        }
        if (!array_key_exists($request->target, $section_values['items'])) {
            return back()->with(['error' => ['Section item is invalid!']]);
        }

        $request->merge(['old_image' => $section_values['items'][$request->target]['image'] ?? null]);

        $language_wise_data = $this->contentValidate($request, $basic_field_name, "download-app-edit");
        if ($language_wise_data instanceof RedirectResponse) {
            return $language_wise_data;
        }

        $language_wise_data = array_map(function ($language) {
            return replace_array_key($language, "_edit");
        }, $language_wise_data);
        $validator = Validator::make($request->all(), [
            'icon_edit'              => "required|string|max:100",
            'link'                   => "required|url",
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput()->with('modal', 'download-app-edit');
        }
        $validated = $validator->validate();

        $section_values['items'][$request->target]['language'] = $language_wise_data;
        $section_values['items'][$request->target]['link']     = $validated['link'];
        $section_values['items'][$request->target]['icon']     = $validated['icon_edit'];

        try {
            $section->update([
                'value' => $section_values,
            ]);
        } catch (Exception $e) {
            return back()->with(['error' => ['Something went worng! Please try again']]);
        }

        return back()->with(['success' => ['Information updated successfully!']]);
    }
    /**
     * Method for delete download app item
     * @param string $slug
     * @return view
     */
    public function downloadAppItemDelete(Request $request, $slug)
    {
        $request->validate([
            'target'     => 'required|string',
        ]);

        $slug    = Str::slug(SiteSectionConst::DOWNLOAD_APP_SECTION);
        $section = SiteSections::getData($slug)->first();
        if (!$section) {
            return back()->with(['error' => ['Section not found!']]);
        }
        $section_values = json_decode(json_encode($section->value), true);
        if (!isset($section_values['items'])) {
            return back()->with(['error' => ['Section item not found!']]);
        }
        if (!array_key_exists($request->target, $section_values['items'])) {
            return back()->with(['error' => ['Section item is invalid!']]);
        }

        try {
            $image_name = $section_values['items'][$request->target]['image'];
            unset($section_values['items'][$request->target]);
            $image_path = get_files_path('site-section') . '/' . $image_name;
            delete_file($image_path);
            $section->update([
                'value'    => $section_values,
            ]);
        } catch (Exception $e) {
            return back()->with(['error' => ['Something went wrong! Please try again.']]);
        }
        return back()->with(['success' => ['Section item deleted successfully!']]);
    }





    /**
     * Method for get languages form record with little modification for using only this class
     * @return array $languages
     */
    public function languages()
    {
        $languages   = Language::whereNot('code', LanguageConst::NOT_REMOVABLE)->select("code", "name")->get()->toArray();
        $languages[] = [
            'name'      => LanguageConst::NOT_REMOVABLE_CODE,
            'code'      => LanguageConst::NOT_REMOVABLE,
        ];
        return $languages;
    }

    /**
     * Method for validate request data and re-decorate language wise data
     * @param object $request
     * @param array $basic_field_name
     * @return array $language_wise_data
     */
    public function contentValidate($request, $basic_field_name, $modal = null)
    {
        $languages = $this->languages();

        $current_local      = get_default_language_code();
        $validation_rules   = [];
        $language_wise_data = [];
        foreach ($request->all() as $input_name => $input_value) {
            foreach ($languages as $language) {
                $input_name_check = explode("_", $input_name);
                $input_lang_code  = array_shift($input_name_check);
                $input_name_check = implode("_", $input_name_check);
                if ($input_lang_code == $language['code']) {
                    if (array_key_exists($input_name_check, $basic_field_name)) {
                        $langCode = $language['code'];
                        if ($current_local == $langCode) {
                            $validation_rules[$input_name] = $basic_field_name[$input_name_check];
                        } else {
                            $validation_rules[$input_name] = str_replace("required", "nullable", $basic_field_name[$input_name_check]);
                        }
                        $language_wise_data[$langCode][$input_name_check] = $input_value;
                    }
                    break;
                }
            }
        }
        if ($modal == null) {
            $validated = Validator::make($request->all(), $validation_rules)->validate();
        } else {
            $validator = Validator::make($request->all(), $validation_rules);
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput()->with("modal", $modal);
            }
            $validated = $validator->validate();
        }

        return $language_wise_data;
    }

    /**
     * Method for validate request image if have
     * @param object $request
     * @param string $input_name
     * @param string $old_image
     * @return boolean|string $upload
     */
    public function imageValidate($request, $input_name, $old_image)
    {
        if ($request->hasFile($input_name)) {
            $image_validated = Validator::make($request->only($input_name), [
                $input_name         => "image|mimes:png,jpg,webp,jpeg,svg",
            ])->validate();

            $image  = get_files_from_fileholder($request, $input_name);
            $upload = upload_files_from_path_dynamic($image, 'site-section', $old_image);
            return $upload;
        }

        return false;
    }
}
