@extends('admin.layouts.master')

@push('css')

@endpush

@section('page-title')
    @include('admin.components.page-title', ['title' => __($page_title)])
@endsection

@section('breadcrumb')
    @include('admin.components.breadcrumb', [
        'breadcrumbs' => [
            [
                'name' => __('Dashboard'),
                'url' => setRoute('admin.dashboard'),
            ],
        ],
        'active' => __('Extensions'),
    ])
@endsection

@section('content')
    <div class="table-area">
        <div class="table-wrapper">
            <div class="table-header">
                <h5 class="title">{{ __("Extensions") }}</h5>
            </div>
            <div class="table-responsive">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($drivers as $key => $item)
                            <tr>
                                <td>
                                    <ul class="user-list">
                                        <li><img src="{{ get_image($item->image, 'social-auth-driver') }}" alt="image"></li>
                                    </ul>
                                </td>
                                <td>{{ $item->driver_name }}</td>
                                <td>
                                    @include('admin.components.form.switcher', [
                                        'name'          => 'status',
                                        'data_target'   => $item->id,
                                        'value'         => $item->status,
                                        'options'       => ['Enable' => 1, 'Disabled' => 0],
                                        'onload'        => true,
                                        'permission'    => "admin.social.auth.status.update",
                                    ])
                                </td>
                                <td>
                                    @if (admin_permission_by_name("admin.social.auth.status.update"))
                                        <button type="button" class="btn btn--base edit-button" data-name="{{ __($item->driver_name) }}"
                                            data-credentials="{{ json_encode($item->credentials) }}"
                                            data-action="{{ setRoute('admin.social.auth.update', $item->ulid) }}">
                                            <i class="las la-pencil-alt"></i>
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            @include('admin.components.alerts.empty',['colspan' => 5])
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Edit Modal --}}
    @include('admin.components.modals.social-auth-driver-edit')

@endsection

@push('script')
    <script>
        switcherAjax("{{ setRoute('admin.social.auth.status.update') }}");
    </script>
@endpush
