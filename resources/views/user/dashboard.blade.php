@extends('frontend.layouts.master')

@section('content')
    <div class="profile ptb-80">

        <form class="card-form" method="POST" action="{{ setRoute('user.profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="profile-details mb-40">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8 col-md-12">
                        <div class="profile-name">
                            <div class="profile-thumb-content">
                                <div class="preview-thumb profile-thumb">
                                    <div class="avatar-preview">
                                        <div class="profilePicPreview bg_img"
                                            data-background="{{ auth()->user()->userImage }}"></div>
                                    </div>
                                    <div class="avatar-edit">
                                        <input type='file' class="profilePicUpload" name="image" id="profilePicUpload2"
                                            accept=".png, .jpg, .jpeg, .webp, .svg" />
                                        <label for="profilePicUpload2"><i class="las la-upload"></i></label>
                                    </div>

                                </div>

                            </div>
                            <div class="account-balance text-center">
                                <h2 class="title">
                                    {{ get_amount(auth()->user()->wallets->balance) }} {{ get_default_currency_code() }}
                                </h2>
                                <p class="text--success">{{ __('Available Balance') }}</p>
                            </div>
                            <div class="col-xl-12 col-lg-12 form-group">
                                @include('admin.components.form.input', [
                                    'label' => __('First Name') . '<span>*</span>',
                                    'name' => 'firstname',
                                    'placeholder' => __('Enter First Name'),
                                    'value' => old('firstname', auth()->user()->firstname),
                                ])
                            </div>
                            <div class="col-xl-12 col-lg-12 form-group">
                                @include('admin.components.form.input', [
                                    'label' => __('Last Name') . '<span>*</span>',
                                    'name' => 'lastname',
                                    'placeholder' => __('Enter Last Name'),
                                    'value' => old('lastname', auth()->user()->lastname),
                                ])
                            </div>
                            <label>{{ __('Phone Number') }}</label>
                            <div class="d-flex gap-2">
                                <select class="form-select w-25" name="otp_country">
                                    @foreach (get_all_countries_array() as $item)
                                        <option value="{{ get_country_phone_code($item['name']) }}"
                                            @if (auth()->user()->country == $item['name']) selected @endif>
                                            {{ $item['name'] }} ({{ $item['mobile_code'] }})
                                        </option>
                                    @endforeach
                                </select>

                                <input type="text" name="phone" class="form-control w-75"
                                    value="{{ auth()->user()->mobile ?? '' }}"
                                    placeholder="{{ __('Enter phone number') }}">
                            </div>

                            <label>{{ __('Email Address') }}</label>
                            <input type="text" class="form--control" placeholder="Email" name='email'
                                value="{{ auth()->user()->email }}" readonly>
                            <label>{{ __('Your Address') }}</label>
                            <textarea class="form--control" name="address" placeholder={{ __("Notes about your order, e.g. special notes for delivery.") }}>{{ auth()->user()->address }}</textarea>

                            <div class="button pt-3">
                                <button type="submit" class="btn--base w-100">{{ __('Save') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@push('script')
    <script></script>
@endpush
