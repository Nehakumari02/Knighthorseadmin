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
        'active' => __('Dashboard'),
    ])
@endsection

@section('content')
    <div class="dashboard-area">
        <div class="dashboard-item-area">
            <div class="row">
                <div class="col-xxxl-4 col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-15">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <div class="left">
                                <h6 class="title">{{ __('Total Users') }}</h6>
                                <div class="user-info">
                                    <h2 class="user-count">{{ formatNumberInKNotation($data['total_user_count']) }}</h2>
                                </div>
                                <div class="user-badge">
                                    <span class="badge badge--success">{{ __('Active') }} {{ $data['active_user'] }}</span>
                                    <span class="badge badge--info">{{ __('Unverified') }}
                                        {{ $data['unverified_user'] }}</span>
                                </div>
                            </div>
                            <div class="right">
                                <div class="chart" id="chart6" data-percent="{{ $data['user_percent'] }}">
                                    <span>{{ round($data['user_percent']) }}%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxxl-4 col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-15">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <div class="left">
                                <h6 class="title">{{ __('Total Products') }}</h6>
                                <div class="user-info">
                                    <h2 class="user-count">{{ formatNumberInKNotation($data['total_product_count']) }}</h2>
                                </div>
                                <div class="user-badge">
                                    <span class="badge badge--info">{{ __('Active') }}
                                        {{ $data['active_product'] }}</span>
                                    <span class="badge badge--warning">{{ __('Inactive') }}
                                        {{ $data['pending_product'] }}</span>
                                </div>
                            </div>
                            <div class="right">
                                <div class="chart" id="chart7" data-percent="{{ $data['product_percent'] }}">
                                    <span>{{ round($data['product_percent']) }}%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxxl-4 col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-15">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <div class="left">
                                <h6 class="title">{{ __('Total Order') }}</h6>
                                <div class="user-info">
                                    <h2 class="user-count">{{ formatNumberInKNotation($data['total_booking_count']) }}</h2>
                                </div>
                                <div class="user-badge">
                                    <span class="badge badge--info">{{ __('Confirmed') }}
                                        {{ $data['confirm_booking'] }}</span>
                                    <span class="badge badge--warning">{{ __('Pending') }}
                                        {{ $data['pending_booking'] }}</span>
                                </div>
                            </div>
                            <div class="right">
                                <div class="chart" id="chart8" data-percent="{{ $data['booking_percent'] }}">
                                    <span>{{ round($data['booking_percent']) }}%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxxl-4 col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-15">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <div class="left">
                                <h6 class="title">{{ __('Total Stock') }}</h6>
                                <div class="user-info">
                                    <h2 class="user-count">{{ formatNumberInKNotation($data['total_stock']) }}</h2>
                                </div>
                                <div class="user-badge">
                                    <span class="badge badge--info">{{ __('available Stock') }}
                                        {{ $data['available_stock'] }}</span>
                                </div>
                            </div>
                            <div class="right">
                                <div class="chart" id="chart9" data-percent="{{ $data['stock_percent'] }}">
                                    <span>{{ round($data['stock_percent']) }}%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxxl-4 col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-15">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <div class="left">
                                <h6 class="title">{{ __('Total Support Ticket') }}</h6>
                                <div class="user-info">
                                    <h2 class="user-count">{{ formatNumberInkNotation($data['total_ticket_count']) }}</h2>
                                </div>
                                <div class="user-badge">
                                    <span class="badge badge--info">{{ __('Active') }}
                                        {{ formatNumberInkNotation($data['active_ticket']) }}</span>
                                    <span class="badge badge--warning">{{ __('Pending') }}
                                        {{ formatNumberInkNotation($data['pending_ticket']) }}</span>
                                </div>
                            </div>
                            <div class="right">
                                <div class="chart" id="chart10" data-percent="{{ $data['percent_ticket'] }}">
                                    <span>{{ round($data['percent_ticket']) }}%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxxl-4 col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-15">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <div class="left">
                                <h6 class="title">{{ __('Total Order Money') }}</h6>
                                <div class="user-info">
                                    <h2 class="user-count">
                                        {{ get_default_currency_symbol() }}{{ get_amount($data['total_money']) }}</h2>
                                </div>
                                <div class="user-badge">
                                    <span class="badge badge--info">{{ __('This Month') }}
                                        {{ get_default_currency_symbol() }}{{ get_amount($data['this_month_money']) }}</span>
                                    <span class="badge badge--warning">{{ __('Last Month') }}
                                        {{ get_default_currency_symbol() }}{{ get_amount($data['last_month_money']) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxxl-4 col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-15">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <div class="left">
                                <h6 class="title">{{ __('Total Profit') }}</h6>
                                <div class="user-info">
                                    <h2 class="user-count">
                                        {{ get_default_currency_symbol() }}{{ get_amount($data['total_charges']) }}</h2>
                                </div>
                                <div class="user-badge">
                                    <span class="badge badge--info">{{ __('This Month') }}
                                        {{ get_default_currency_symbol() }}{{ get_amount($data['this_month_charge']) }}</span>
                                    <span class="badge badge--warning">{{ __('Last Month') }}
                                        {{ get_default_currency_symbol() }}{{ get_amount($data['last_month_charge']) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                     <div class="col-xxxl-4 col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-15">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <div class="left">
                                <h6 class="title">{{ __('Total Category') }}</h6>
                                <div class="user-info">
                                    <h2 class="user-count">
                                        {{ $data['total_category'] }}</h2>
                                </div>
                                <div class="user-badge">
                                    <span class="badge badge--info">{{ __('Active') }}
                                     {{ $data['active_category'] }}</span>
                                    <span class="badge badge--warning">{{ __('Inactive') }}
                                        {{ ($data['inactive_category']) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="chart-area mt-15">
        <div class="row mb-15-none">
            <div class="col-xxl-6 col-xl-6 col-lg-6 mb-15">
                <div class="chart-wrapper">
                    <div class="chart-area-header">
                        <h5 class="title">{{ __('Order Analytics') }}</h5>
                    </div>
                    <div class="chart-container">
                        <div id="chart1" data-chart_one_data="{{ json_encode($data['chart_one_data']) }}"
                            data-month_day="{{ json_encode($data['month_day']) }}" class="sales-chart"></div>
                    </div>
                </div>
            </div>
            <div class="col-xxxl-6 col-xxl-3 col-xl-6 col-lg-6 mb-15">
                <div class="chart-wrapper">
                    <div class="chart-area-header">
                        <h5 class="title">{{ __('User Analytics') }}</h5>
                    </div>
                    <div class="chart-container">
                        <div id="chart4" class="balance-chart"
                            data-user_chart_data="{{ json_encode($data['user_chart_data']) }}"></div>
                    </div>
                    <div class="chart-area-footer">
                        <div class="chart-btn">
                            <a href="{{ setRoute('admin.users.index') }}"
                                class="btn--base w-100">{{ __('View User') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="table-area mt-15">
        <div class="table-wrapper">
            <div class="table-header">
                <h5 class="title">{{ __('Latest Bookings') }}</h5>
            </div>
            <div class="table-responsive">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>{{ __('Order ID') }}</th>
                            <th>{{ __('Price') }}</th>
                            <th>{{ __('P. Method') }}</th>
                            <th>{{ __('Status') }}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($booking_data ?? [] as $key => $item)
                            <tr>
                                <td>{{ $item->trx_id ?? '' }}</td>

                                <td>{{ get_default_currency_symbol() }}{{ get_amount($item->price) }}</td>
                                <td>{{ $item->payment_method ?? '' }}</td>
                                <td>
                                    <span
                                        class="{{ $item->stringStatus->class }}">{{ __($item->stringStatus->value) }}</span>
                                </td>
                                <td>
                                    <a href="{{ setRoute('admin.booking.log.details', $item->trx_id) }}"
                                        class="btn btn--base btn--primary"><i class="las la-info-circle"></i></a>

                                </td>
                            </tr>
                        @empty
                            @include('admin.components.alerts.empty', ['colspan' => 6])
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        // apex-chart
        var chart1 = $('#chart1');
        var chart_one_data = chart1.data('chart_one_data');
        var month_day = chart1.data('month_day');
        var options = {
            series: [{
                name: "{{ __('Pending') }}",
                color: "#5A5278",
                data: chart_one_data.pending_data
            }, {
                name: "{{ __('Completed') }}",
                color: "#6F6593",
                data: chart_one_data.complete_data
            }, ],
            chart: {
                type: 'bar',
                height: 350,
                stacked: true,
                toolbar: {
                    show: false
                },
                zoom: {
                    enabled: true
                }
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    legend: {
                        position: 'bottom',
                        offsetX: -10,
                        offsetY: 0
                    }
                }
            }],
            plotOptions: {
                bar: {
                    horizontal: false,
                    borderRadius: 10
                },
            },
            xaxis: {
                type: 'datetime',
                categories: month_day,

            },
            legend: {
                position: 'bottom',
                offsetX: 40
            },
            fill: {
                opacity: 1
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart1"), options);
        chart.render();

        var chart4 = $('#chart4');
        var user_chart_data = chart4.data('user_chart_data');
        var options = {
            series: user_chart_data,
            chart: {
                width: 350,
                type: 'pie'
            },
            colors: ['#5A5278', '#6F6593', '#8075AA', '#A192D9'],
            labels: ['{{ __('Active') }}', '{{ __('Unverified') }}', '{{ __('Banned') }}', '{{ __('All') }}'],
            responsive: [{
                breakpoint: 1480,
                options: {
                    chart: {
                        width: 280
                    },
                    legend: {
                        position: 'bottom'
                    }
                },
                breakpoint: 1199,
                options: {
                    chart: {
                        width: 380
                    },
                    legend: {
                        position: 'bottom'
                    }
                },
                breakpoint: 575,
                options: {
                    chart: {
                        width: 280
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }],
            legend: {
                position: 'bottom'
            },
        };

        var chart = new ApexCharts(document.querySelector("#chart4"), options);
        chart.render();
    </script>
@endpush
