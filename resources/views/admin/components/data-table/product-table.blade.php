@php
    $default_lang_code = language_const()::NOT_REMOVABLE;

    $system_default_lang = get_default_language_code();
    $languages_for_js_use = $languages->toJson();
@endphp
<table class="custom-table">
    <thead>
        <tr>
              <th></th>
            <th></th>
            <th>{{ __('Name') }}</th>
            <th>{{ __('Description') }}</th>
            <th>{{ __('Sub Category') }}</th>
            <th>{{ __('Category') }}</th>
            <th>{{ __('Area') }}</th>
            <th>{{ __('Price') }}</th>
            <th>{{ __('Initial Stock') }}</th>
            <th>{{ __('Available Stock') }}</th>
            <th>{{ __('Order Quantity') }}</th>
            <th>{{ __('Unit') }}</th>
             <th>{{ __('Shipment') }}</th>
            <th>{{ __('Status') }}</th>
            <th>{{ __('Action') }}</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($product ?? [] as $key => $item)
            <tr data-item="{{ json_encode($item) }}">
                  <td>{{ $item->id}}</td>
                <td>
                    <ul class="user-list">
                        <li><img src="{{ get_image($item->image, 'site-section') }}" alt="Profile"></li>
                    </ul>
                </td>
                <td>{{ $item->data->language->$system_default_lang->name ?? '' }}</td>
                <td>{{ $item->data->language->$system_default_lang->description ?? '' }}</td>
                <td>{{ $item->sub_category->data->language->$system_default_lang->name ?? '' }}</td>
                <td>{{ $item->category->data->language->$system_default_lang->name ?? '' }}</td>
                <td> {{ $item->areas->pluck('name')->implode(', ') ?: 'Not specified' }}</td>
                <td>
                    @if ($item->offer_price)
                        <span class="price"><b>{{ get_amount($item->offer_price) }}
                                {{ get_default_currency_code() }}</b></span>
                        <del>{{ get_amount($item->price) }}
                            {{ get_default_currency_code() }}</del>
                    @else
                        <span class="price"><b>{{ get_amount($item->price) }}
                                {{ get_default_currency_code() }}</b></span>
                    @endif
                </td>
                <td>{{ $item->quantity ?? '' }} </td>
                <td>{{ $item->available_quantity ?? '' }} </td>
                <td>{{ $item->order_quantity ?? '' }} </td>
                <td>{{ $item->unit()->first()->unit ?? ''  }} </td>
                <td>{{ $item->shipment()->first()->name ?? ''  }} </td>

                <td> @include('admin.components.form.switcher', [
                    'name' => 'status',
                    'value' => $item->status,
                    'options' => [__('Enable') => 1, __('Disable') => 0],
                    'onload' => true,
                    'data_target' => $item->id,
                    'permission' => 'admin.product.status.update',
                ])
                </td>
                <td>
                    <button class="btn btn--base btn--danger delete-modal-button"><i
                            class="las la-trash-alt"></i></button>
                    <button class="btn btn--base edit-modal-button">
                        <a href="{{ route('admin.product.edit', $item->id) }}" class="btn-edit">
                            <i class="las la-pen"></i>
                        </a>
                    </button>
                </td>

            </tr>
        @empty
            @include('admin.components.alerts.empty', ['colspan' => 16])
        @endforelse
    </tbody>
</table>

@push('script')
    <script>
        $(document).ready(function() {
            // Switcher
            switcherAjax("{{ setRoute('admin.product.status.update') }}");
        })
    </script>
@endpush
