<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Helpers\Response;
use App\Models\Admin\SmsProvider;
use App\Http\Controllers\Controller;
use App\Constants\PaymentGatewayConst;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Admin\SmsProviderRequest;
use App\Models\Admin\BasicSettings;
use App\Models\TemporaryData;
use App\Http\Helpers\SmsProviders\Twilio;

class SmsProviderController extends Controller
{
    /**
     * showing all available providers
     * @param \Illuminate\Http\Request $request
     */
    public function index(Request $request)
    {
        $page_title = __("SMS Providers");
        $providers  = SmsProvider::paginate(10);

        return view('admin.sections.setup-sms.providers.index', compact('page_title', 'providers'));
    }

    /**
     * store new sms provider to the database
     * @param \App\Http\Request\SmsProviderRequest $request
     */
    public function store(SmsProviderRequest $request)
    {
        $validated = $request->validated();

        $input_fields = [];
        foreach ($validated['title'] as $key => $title) {
            $input_fields[] = [
                'label'         => $title,
                'placeholder'   => "Enter " . $title,
                'name'          => ($validated['name'][$key] == null) ? str_replace(" ", "_", strtolower($title)) : $validated['name'][$key],
                'value'         => $validated['value'][$key] ?? "",
            ];
        }
        $validated['credentials'] = $input_fields;

        // Check Image File is Available or not
        if ($request->hasFile('image')) {
            $image              = get_files_from_fileholder($request, 'image');
            $upload             = upload_files_from_path_dynamic($image, 'api-providers');
            $validated['image'] = $upload;
        }

        try {
            SmsProvider::create([
                'name'          => $validated['provider_name'],
                'slug'          => Str::slug($validated['provider_name']),
                'title'         => $validated['provider_title'],
                'image'         => $validated['image'] ?? null,
                'credentials'   => $validated['credentials'],
            ]);
        } catch (Exception $e) {
            return back()->with(['error' => [__("Something went wrong! Please try again")]]);
        }

        return back()->with(['success' => [__("SMS Provider Added Successfully!")]]);
    }

    /**
     * edit provider information
     * @param \Illuminate\Http\Request $request
     * @param string $uuid
     */
    public function edit(Request $request, string $uuid)
    {
        $provider = SmsProvider::where('uuid', $uuid)->firstOrFail();

        $page_title = __('Edit Provider');
        return view('admin.sections.setup-sms.providers.edit', compact('page_title', 'provider'));
    }

    /**
     * provider update
     * @param \Illuminate\Http\Request $request
     * @param string $uuid
     */
    public function update(Request $request, string $uuid)
    {
        $validated_gateway = Validator::make(['uuid' => $uuid, 'mode' => $request->mode], [
            'uuid'      => 'exists:sms_providers',
            'mode'      => "required|string|in:" . PaymentGatewayConst::ENV_SANDBOX . "," . PaymentGatewayConst::ENV_PRODUCTION,
        ], [
            'uuid.exists'   => __("Selected provider is invalid!"),
        ])->validate();

        $provider = SmsProvider::where('uuid', $uuid)->first();

        $credentials_validation_rules = [];
        $credentials                  = $provider->credentials;
        foreach ($credentials as $values) {
            $values                                        = (array) $values;
            $credentials_validation_rules[$values['name']] = "nullable|string";
        }

        $credentials_input_fields = array_keys($credentials_validation_rules);
        $validated_credentials    = Validator::make($request->only($credentials_input_fields), $credentials_validation_rules)->validate();

        $credentials_array = json_decode(json_encode($credentials), true);
        foreach ($credentials_array as $key => $item) {
            foreach ($validated_credentials as $input_name => $value) {
                if ($input_name == $item['name']) {
                    $item['value'] = $value;
                }
                $credentials_array[$key] = $item;
            }
        }

        try {
            $image = $provider->image;
            if ($request->hasFile('image')) {
                $image        = get_files_from_fileholder($request, 'image');
                $upload_image = upload_files_from_path_dynamic($image, 'api-providers', $provider->image);
                $image        = $upload_image;
            }
            $provider->update([
                'credentials'   => $credentials_array,
                'image'         => $image,
                'env'           => $validated_gateway['mode'],
            ]);
        } catch (Exception $e) {
            return back()->with(['error' => [__('Something went wrong! Please try again.')]]);
        }

        return back()->with(['success' => [__("Information updated successfully!")]]);
    }

    /**
     * Provider status update
     * @param \Illuminate\Http\Request $request
     */
    public function statusUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'status'                    => 'required|boolean',
            'data_target'               => 'required|string',
        ]);
        if ($validator->stopOnFirstFailure()->fails()) {
            $error = ['error' => $validator->errors()];
            return Response::error($error, null, 400);
        }
        $validated = $validator->safe()->all();
        $target    = $validated['data_target'];

        $status = $validated['status'] == "1" ? false : true;

        try {
            if ($status == true) {
                SmsProvider::where('status', true)->update([
                    'status' => false
                ]);
            }

            SmsProvider::where('id', $target)->update([
                'status' => $status
            ]);
        } catch (Exception $e) {
            $error = ['error' => [__('Something went wrong!. Please try again.')]];
            return Response::error($error, null, 500);
        }

        $success = ['success' => [__('Provider status updated successfully!')]];
        return Response::success($success, ['redirect_url' => setRoute('admin.setup.sms.providers.index')], 200);
    }

    public function sendTestSMS(Request $request)
    {

        $validated = $request->validate([
            'otp_country' => 'required',
            'number'      => 'required',
        ]);
       
        $otp_country = ltrim($request->otp_country, '+');
        $receiver = '+' . $otp_country . $request->number;
    

        $provider   = SmsProvider::where('slug', 'twilio')->active()->first();

        if (!$provider) {
            return back()->with(['error' => [__('SMS provider not configured')]]);
        }
        $provider_name = $provider->name;

        try {
            $twilio  = new Twilio($provider);
            $message = 'This is a test message from : ' . $provider_name . 'Provider';

            $tempData = TemporaryData::create([
                'type'       => 'test_message',
                'identifier' => $receiver,
                'data'       => [
                    'token'        => Str::uuid(),
                    'country_code' => $request->otp_country,
                    'number'       => $request->number,
                    'otp'          => [
                        'sended'      => false,
                        'provider'    => $provider_name,
                        'message_sid' => null
                    ]
                ]
            ]);

            $result = $twilio->send($receiver, $message, $provider_name, $tempData);

            if ($result instanceof TemporaryData) {
                return  back()
                    ->with(['success' => [__('Verification code sent to your phone')]]);
            }

            return back()->with(['error' => [__('Failed to send verification code')]]);
        } catch (Exception $e) {

            return back()->with(['error' => [__('Failed to send SMS. Please try again later.')]]);
        }
    }
}
