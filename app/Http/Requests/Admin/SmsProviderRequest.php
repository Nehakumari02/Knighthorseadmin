<?php

namespace App\Http\Requests\Admin;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SmsProviderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $provider_name = $this->provider_name;

        return [
            'provider_name'              => ['required','string','max:60',Rule::unique('utility_providers', 'slug')->where(function ($query) use ($provider_name) {
                $slug = Str::slug($provider_name);
                $query->where('slug', $slug);
            })],
            'provider_title'            => 'required|string|max:60',
            'title'                     => 'required|array',
            'title.*'                   => 'string|max:60',
            'name'                      => 'required|array',
            'name.*'                    => 'string|max:60',
            'value'                     => 'nullable|array',
            'value.*'                   => 'nullable|string|max:255',
            'image'                     => 'nullable|image|mimes:png,jpg,jpeg,svg,webp'
        ];
    }
}
