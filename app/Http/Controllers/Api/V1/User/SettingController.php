<?php

namespace App\Http\Controllers\Api\V1\User;

use Exception;
use Illuminate\Http\Request;
use App\Constants\GlobalConst;
use App\Http\Helpers\Response;
use App\Models\Admin\Language;
use App\Models\Admin\AppSettings;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Models\Admin\AppOnboardScreens;
use App\Models\Admin\DeliverySettings;
use App\Models\Admin\Product;
use App\Models\Admin\Shipment;
use App\Models\Admin\SiteSections;
use App\Models\Admin\TempCart;
use App\Models\Admin\Unit;
use App\Providers\Admin\CurrencyProvider;
use Illuminate\Support\Facades\Validator;
use App\Providers\Admin\BasicSettingsProvider;

class SettingController extends Controller
{
    protected $languages;
    public function __construct()
    {
        $this->languages = Language::get();
    }
    public function basicSettings()
    {
        $basic_settings = BasicSettingsProvider::get()->only(['id', 'site_name', 'base_color', 'secondary_color', 'site_title', 'timezone', 'site_logo', 'site_logo_dark', 'site_fav', 'site_fav_dark', 'user_registration', 'agree_policy']);

        $languages = Language::select(['id', 'name', 'code', 'status'])->get();

        $app_settings        = AppSettings::first();
        $onboard_screen_user = AppOnboardScreens::where('type', GlobalConst::USER)->orderByDesc('id')->where('status', 1)->get()->map(function ($data) {
            return [
                'id'         => $data->id,
                'title'      => $data->title,
                'sub_title'  => $data->sub_title,
                'image'      => $data->image,
                'status'     => $data->status,
                'created_at' => $data->created_at,
                'updated_at' => $data->updated_at,
            ];
        });


        $base_cur = CurrencyProvider::default()->first();
        $base_cur->makeHidden(['admin_id', 'country', 'name', 'created_at', 'updated_at', 'type', 'flag', 'sender', 'receiver', 'default', 'status', 'editData']);

        $app_image_paths = [
            'base_url'          => url("/"),
            'path_location'     => files_asset_path_basename("app-images"),
            'default_image'     => files_asset_path_basename("default"),
        ];


        return Response::success([__("Basic settings fetch successfully!")], [
            'basic_settings'         => $basic_settings,
            'base_cur'               => $base_cur,
            'languages'              => $languages,
            'splash_screen'          => $app_settings,
            'user_onboard_screens'   => $onboard_screen_user,
            'image_paths'            => [
                'base_path'         => url("/"),
                'path_location'     => files_asset_path_basename("image-assets"),
                'default_image'     => files_asset_path_basename("default"),
                'product_image'     => files_asset_path_basename("site-section"),
            ],
            'app_image_paths'   => $app_image_paths,
        ], 200);
    }
    public function unit()
    {
        $unit = Unit::orderByDesc('id')->where('status', 1)->get()->map(function ($data) {
            return [
                'id'         => $data->id,
                'name'       => $data->name,
                'unit'       => $data->unit,
                'slug'       => $data->slug,
                'status'     => $data->status,
                'created_at' => $data->created_at,
                'updated_at' => $data->updated_at,
            ];
        });

        return Response::success([__("Unit fetch successfully!")], [
            'unit'    => $unit,
        ], 200);
    }

    public function delivery()
    {
        $delivery = DeliverySettings::orderByDesc('id')->first();

        return Response::success([__("Delivery fetch successfully!")], [
            'delivery'    => $delivery,
        ], 200);
    }
    public function shipment()
    {
        $shipment = Shipment::orderByDesc('id')->get()->map(function ($data) {
            return [
                'id'                  => $data->id,
                'name'                => $data->name,
                'delivery_delay_days' => $data->delivery_delay_days,
                'delivery_charge'     => $data->delivery_charge,
                'star_time'           => $data->star_time,
                'end_time'            => $data->end_time,
                'time_range'          => $data->time_range,
                'default'             => $data->default,
                'default_status'      => '1 = default shipment'
            ];
        });

        return Response::success([__("Shipment fetch successfully!")], [
            'shipment'    => $shipment,
        ], 200);
    }
    public function splashScreen()
    {
        $user_splash = AppSettings::select('splash_screen_image as user_slash', 'version')->first();

        $image_paths = [
            'base_url'          => url("/"),
            'path_location'     => files_asset_path_basename("app-images"),
            'default_image'     => files_asset_path_basename("default"),
        ];

        return Response::success([__('Splash screen data fetch successfully!')], [
            'user_splash'   => $user_splash,
            'image_paths'   => $image_paths,
        ], 200);
    }

    public function onboardScreens()
    {
        $onboard_screen_user = AppOnboardScreens::where('type', GlobalConst::USER)->orderByDesc('id')->where('status', 1)->get()->map(function ($data) {
            return [
                'id'         => $data->id,
                'title'      => $data->title,
                'sub_title'  => $data->sub_title,
                'image'      => $data->image,
                'status'     => $data->status,
                'created_at' => $data->created_at,
                'updated_at' => $data->updated_at,
            ];
        });


        $image_paths = [
            'base_url'          => url("/"),
            'path_location'     => files_asset_path_basename("app-images"),
            'default_image'     => files_asset_path_basename("default"),
        ];

        return Response::success([__('Onboard screen data fetch successfully!')], [
            'user_onboard_screens'   => $onboard_screen_user,
            'image_paths'            => $image_paths,
        ], 200);
    }

    public function getLanguages()
    {
        try {
            $api_languages = get_api_languages();
        } catch (Exception $e) {
            return Response::error([$e->getMessage()], [], 500);
        }

        return Response::success([__("Language data fetch successfully!")], [
            'languages' => $api_languages,
        ], 200);
    }

    public function frontendData()
    {
        $banner       = SiteSections::where('key', 'banner-section')->first();
        $specialOffer = SiteSections::where('key', 'special-offer-section')->first();
        $languages    = $this->languages;

        $lang    = request()->lang ?? 'en'; // Default to 'en' if not provided
        $default = 'en';

        $banner_data = [];
        if ($banner && isset($banner->value->items)) {
            foreach ($banner->value->items as $value) {
                $banner_data[] = [
                    'id'    => $value->id    ?? null,
                    'image' => $value->image ?? null,
                ];
            }
        }

        $offer_data = [];
        if ($specialOffer && isset($specialOffer->value->items)) {
            foreach ($specialOffer->value->items as $value) {
                // Safely access language properties
                $languageData = $value->language->{$lang} ?? $value->language->{$default} ?? null;

                $offer_data[] = [
                    'id'    => $value->id                ?? null,
                    'image' => $value->image             ?? null,
                    'name'  => $languageData->item_name  ?? null,
                    'offer' => $languageData->item_offer ?? null,
                    'price' => $value->price             ?? null,
                ];
            }
        }

        return Response::success([__("Data fetched successfully!")], [
            'banner'       => $banner_data,
            'specialOffer' => $offer_data,
        ], 200);
    }

    public function productSearch(Request $request)
    {
        $languages = $this->languages;
        $lang      = request()->lang ?? 'en'; // Default to 'en' if not provided
        $default   = 'en';

        $query        = $request->get('product_name');
        $convert_text = ucfirst($query);


        if ($request->product_name) {
            $products = Product::where("data->language->{$lang}->name", 'LIKE', "%{$convert_text}%")->with('unit', 'shipment', 'sub_category', 'category')->get();
        }

        $productData = $products->map(function ($data) use ($lang, $default) {
            return [
                'id'                 => $data->id,
                'data'               => $data->data->language->$lang ?? $data->data->language->$default,
                'price'              => $data->price,
                'offer_price'        => $data->offer_price,
                'uuid'               => $data->uuid,
                'quantity'           => $data->quantity,
                'available_quantity' => $data->available_quantity,
                'image'              => $data->image,
                'status'             => $data->status,
                'popular'            => $data->popular,
                'popular_status'     => '1 = popular',
                'meta_image'         => $data->meta_image,
                'sub_category'       => $data->sub_category->data->language->$lang ?? $data->sub_category->data->language->$default,
                'area'               => $data->area,
                'shipment'           => $data->shipment,
                'unit'               => $data->unit()->first()->unit ?? null,
                'currency_code'      => get_default_currency_code(),
                'currency_symbol'    => get_default_currency_symbol(),
            ];
        });

        // if($product == []){
        //               return Response::success([__("No product Found!")], [
        // ], 200);
        // }

        return Response::success([__("Data fetched successfully!")], [
           'product' => $productData,
        ], 200);
    }
}
