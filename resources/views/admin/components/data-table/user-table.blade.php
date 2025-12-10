<table class="custom-table user-search-table">
    <thead>
        <tr>
            <th></th>
            <th>{{ __("Username") }}</th>
            <th>{{ __("Email") }}</th>
            <th>{{ __("Phone") }}</th>
            <th>{{ __("Status") }}</th>
           <th>{{ __("verificationStatus") }}</th>
            <th>{{ __("Action") }}</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($users ?? [] as $key => $item)
            <tr>
                <td>
                    <ul class="user-list">
                        <li><img src="{{ $item->userImage }}" alt="user"></li>
                    </ul>
                </td>
                <td><span>{{ $item->username }}</span></td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->full_mobile ?? "N/A" }}</td>
                <td>
                    @if (Route::currentRouteName() == "admin.users.kyc.unverified")
                        <span class="{{ $item->kycStringStatus->class }}">{{ __($item->kycStringStatus->value) }}</span>
                    @else
                        <span class="{{ $item->stringStatus->class }}">{{ __($item->stringStatus->value) }}</span>
                    @endif
                </td>
    <td>
                    @if($item->verificationStatus == 'pending')
                        <span class="badge bg-warning">Pending</span>
                    @elseif($item->verificationStatus == 'approved')
                        <span class="badge bg-success">Approved</span>
                    @elseif($item->verificationStatus == 'denied')
                        <span class="badge bg-danger">Denied</span>
                    @else
                        <span class="badge bg-secondary">N/A</span>
                    @endif
                </td>
                <td>
                    @if (Route::currentRouteName() == "admin.users.kyc.unverified")
                        @include('admin.components.link.info-default',[
                            'href'          => setRoute('admin.users.kyc.details', $item->username),
                            'permission'    => "admin.users.kyc.details",
                        ])
                    @else
                        @include('admin.components.link.info-default',[
                            'href'          => setRoute('admin.users.details', $item->username),
                            'permission'    => "admin.users.details",
                        ])
                    @endif
                </td>
            </tr>
        @empty
            @include('admin.components.alerts.empty',['colspan' => 7])
        @endforelse
    </tbody>
</table>
