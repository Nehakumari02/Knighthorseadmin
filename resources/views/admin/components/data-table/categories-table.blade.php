@php
    $default_lang_code = language_const()::NOT_REMOVABLE;

    $system_default_lang = get_default_language_code();
    $languages_for_js_use = $languages->toJson();
@endphp
<table class="custom-table">
    <thead>
        <tr>
            <th></th>
            <th>{{ __('Category Name') }}</th>
            <th>{{ __('Title') }}</th>
            <th>{{ __('User Type') }}</th>
            <th>{{ __('Status') }}</th>
            <th>{{ __('Action') }}</th>
            

        </tr>
    </thead>
    <tbody>
        @forelse ($category ?? [] as $key => $item)
            <tr data-item="{{ json_encode($item) }}">
                <td>
                    <ul class="user-list">
                        <li><img src="{{ get_image($item->image,"site-section") }}" alt="Profile"></li>
                    </ul>
                </td>
                <td>{{ $item->data->language->$system_default_lang->name }}</td>
                <td>{{ $item->data->language->$system_default_lang->title }}</td>
                <td>{{ $item->user_type ?? 'N/A' }}</td>


                <td> @include('admin.components.form.switcher', [
                    'name' => 'status',
                    'value' => $item->status,
                    'options' => [__('Enable') => 1, __('Disable') => 0],
                    'onload' => true,
                    'data_target' => $item->id,
                    'permission' => 'admin.product_categories.status.update',
                ])
                </td>
                <td>
                    <button class="btn btn--base btn--danger delete-modal-button"><i
                            class="las la-trash-alt"></i></button>
                    <button class="btn btn--base edit-modal-button">
                        <a href="{{ route('admin.product.categories.edit', $item->id) }}" class="btn-edit">
                            <i class="las la-pen"></i>
                        </a>
                    </button>
                </td>

            </tr>
        @empty
            @include('admin.components.alerts.empty', ['colspan' => 6])
        @endforelse
    </tbody>
</table>

@push('script')
    <script>
        $(document).ready(function() {
            // Switcher
            switcherAjax("{{ setRoute('admin.product.categories.status.update') }}");
        })
    </script>
@endpush
