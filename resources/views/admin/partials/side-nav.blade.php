<div class="sidebar">
    <div class="sidebar-inner">
        <div class="sidebar-logo">
            <a href="{{ setRoute('admin.dashboard') }}" class="sidebar-main-logo">
                <img src="{{ get_logo($basic_settings,'white')}}" data-white_img="{{ get_logo($basic_settings, 'white') }}"
                    alt="logo">
            </a>
            <button class="sidebar-menu-bar">
                <i class="fas fa-exchange-alt"></i>
            </button>
        </div>
        <div class="sidebar-user-area">
            <div class="sidebar-user-thumb">
                <a href="{{ setRoute('admin.profile.index') }}"><img
                        src="{{ get_image(Auth::user()->image, 'admin-profile', 'profile') }}" alt="user"></a>
            </div>
            <div class="sidebar-user-content">
                <h6 class="title">{{ Auth::user()->username }}</h6>
                <span class="sub-title">{{ Auth::user()->getRolesString() }}</span>
            </div>
        </div>
        @php
            $current_route = Route::currentRouteName();
        @endphp
        <div class="sidebar-menu-wrapper">
            <ul class="sidebar-menu">

                @include('admin.components.side-nav.link', [
                    'route' => 'admin.dashboard',
                    'title' => __('Dashboard'),
                    'icon' => 'menu-icon las la-rocket',
                ])

                {{-- Section Default --}}
                @include('admin.components.side-nav.link-group', [
                    'group_title' => __('Default'),
                    'group_links' => [
                        [
                            'title' => __('Setup Currency'),
                            'route' => 'admin.currency.index',
                            'icon' => 'menu-icon las la-coins',
                        ],
                        [
                            'title' => __('Fees & Charges'),
                            'route' => 'admin.trx.settings.index',
                            'icon' => 'menu-icon las la-wallet',
                        ],
                    ],
                ])

                {{-- Section Default --}}
                @include('admin.components.side-nav.link-group', [
                    'group_title' => __('E-commerce'),
                    'group_links' => [
                        'dropdown' => [
                            [
                                'title' => __('Settings'),
                                'icon' => 'menu-icon las la-cog',
                                'links' => [
                                    [
                                        'title' => __('Unit'),
                                        'route' => 'admin.unit.index',
                                        'icon' => 'menu-icon las la-ruler',
                                    ],
                                    [
                                        'title' => __('Delivery'),
                                        'route' => 'admin.delivery.index',
                                        'icon' => 'menu-icon las la-truck',
                                    ],
                                    [
                                        'title' => __('Shipment'),
                                        'route' => 'admin.shipment.index',
                                        'icon' => 'menu-icon las la-truck',
                                    ],
                                ],
                            ],
                            [
                                'title' => __('Products'),
                                'icon' => 'menu-icon las la-boxes',
                                'links' => [
                                    [
                                        'title' => __('Category'),
                                        'route' => 'admin.product.categories.index',
                                        'icon' => 'menu-icon las la-tags',
                                    ],
                                    [
                                        'title' => __('Sub Category'),
                                        'route' => 'admin.product.sub.categories.index',
                                        'icon' => 'menu-icon las la-tag',
                                    ],
                                    [
                                        'title' => __('Area'),
                                        'route' => 'admin.area.index',
                                        'icon' => 'menu-icon las la-map-marker-alt',
                                    ],
                                    [
                                        'title' => __('Product List'),
                                        'route' => 'admin.product.index',
                                        'icon' => 'menu-icon las la-boxes',
                                    ],
                                ],
                            ],
                             [
                            'title' => __('Wishlist'),
                            'icon' => 'menu-icon las la-heart',
                            'links' => [
                                [
                                    'title' => __('All Wishlists'),
                                    'route' => 'admin.wishlist.index', // Make sure this route exists
                                    'icon' => 'menu-icon las la-list',
                                ],
                                // Optional: Add more sub-links here if needed
                                // [
                                //    'title' => __('Most Popular'),
                                //    'route' => 'admin.wishlist.popular',
                                //    'icon' => 'menu-icon las la-star',
                                // ],
                            ],
                        ],
                            [
                                'title' => __('Order'),
                                'icon' => 'menu-icon las la-shopping-cart',
                                'links' => [
                                    [
                                        'title' => __('Pending Logs'),
                                        'route' => 'admin.order.log.pending',
                                        'icon' => 'menu-icon las la-hourglass-half',
                                    ],
                                    [
                                        'title' => __('Completed Logs'),
                                        'route' => 'admin.order.log.complete',
                                        'icon' => 'menu-icon las la-check-circle',
                                    ],
                                    [
                                        'title' => __('Canceled Logs'),
                                        'route' => 'admin.order.log.canceled',
                                        'icon' => 'menu-icon las la-times-circle',
                                    ],
                                    [
                                        'title' => __('All Logs'),
                                        'route' => 'admin.order.log.index',
                                        'icon' => 'menu-icon las la-list',
                                    ],
                                ],
                            ],
                            [
                                'title' => __('Transacitons'),
                                'icon' => 'menu-icon las la-money-bill-wave',
                                'links' => [
                                    [
                                        'title' => __('Pending Logs'),
                                        'route' => 'admin.booking.log.pending',
                                        'icon' => 'menu-icon las la-hourglass-half',
                                    ],
                                    [
                                        'title' => __('Completed Logs'),
                                        'route' => 'admin.booking.log.complete',
                                        'icon' => 'menu-icon las la-check-circle',
                                    ],
                                    [
                                        'title' => __('Canceled Logs'),
                                        'route' => 'admin.booking.log.canceled',
                                        'icon' => 'menu-icon las la-times-circle',
                                    ],
                                    [
                                        'title' => __('All Logs'),
                                        'route' => 'admin.booking.log.index',
                                        'icon' => 'menu-icon las la-list',
                                    ],
                                ],
                            ],
                            [
                                'title' => __('Shipment'),
                                'icon' => 'menu-icon las la-shipping-fast',
                                'links' => [
                                    [
                                        'title' => __('Booked Logs'),
                                        'route' => 'admin.shipment.log.booked',
                                        'icon' => 'menu-icon las la-hourglass-half',
                                    ],
                                    [
                                        'title' => __('Ready For Shipment'),
                                        'route' => 'admin.shipment.log.shipment',
                                        'icon' => 'menu-icon las la-check-circle',
                                    ],
                                    [
                                        'title' => __('On The Way'),
                                        'route' => 'admin.shipment.log.way',
                                        'icon' => 'menu-icon las la-times-circle',
                                    ],
                                    [
                                        'title' => __('Delivered'),
                                        'route' => 'admin.shipment.log.delivered',
                                        'icon' => 'menu-icon las la-list',
                                    ],
                                ],
                            ],

                        ],
                    ],
                ])


                {{-- Interface Panel --}}
                @include('admin.components.side-nav.link-group', [
                    'group_title' => __('Interface Panel'),
                    'group_links' => [
                        'dropdown' => [
                            [
                                'title' => __('User Care'),
                                'icon' => 'menu-icon las la-user-edit',
                                'links' => [
                                    [
                                        'title' => __('Active Users'),
                                        'route' => 'admin.users.active',
                                    ],
                                    [
                                        'title' => __('Email Unverified'),
                                        'route' => 'admin.users.email.unverified',
                                    ],
                                    [
                                        'title' => __('All Users'),
                                        'route' => 'admin.users.index',
                                    ],
                                    [
                                        'title' => __('Email To Users'),
                                        'route' => 'admin.users.email.users',
                                    ],
                                    [
                                        'title' => __('Banned Users'),
                                        'route' => 'admin.users.banned',
                                    ],
                                ],
                            ],
                            [
                                'title' => __('Admin Care'),
                                'icon' => 'menu-icon las la-user-shield',
                                'links' => [
                                    [
                                        'title' => __('All Admin'),
                                        'route' => 'admin.admins.index',
                                    ],
                                    [
                                        'title' => __('Admin Role'),
                                        'route' => 'admin.admins.role.index',
                                    ],
                                    [
                                        'title' => __('Role Permission'),
                                        'route' => 'admin.admins.role.permission.index',
                                    ],
                                    [
                                        'title' => __('Email To Admin'),
                                        'route' => 'admin.admins.email.admins',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ])

                {{-- Section Settings --}}
                @include('admin.components.side-nav.link-group', [
                    'group_title' => __('Settings'),
                    'group_links' => [
                        'dropdown' => [
                            [
                                'title' => __('Web Settings'),
                                'icon' => 'menu-icon lab la-safari',
                                'links' => [
                                    [
                                        'title' => __('Basic Settings'),
                                        'route' => 'admin.web.settings.basic.settings',
                                    ],
                                    [
                                        'title' => __('Image Assets'),
                                        'route' => 'admin.web.settings.image.assets',
                                    ],
                                    [
                                        'title' => __('Setup SEO'),
                                        'route' => 'admin.web.settings.setup.seo',
                                    ],
                                ],
                            ],
                            [
                                'title' => __('App Settings'),
                                'icon' => 'menu-icon las la-mobile',
                                'links' => [
                                    [
                                        'title' => __('Splash Screen'),
                                        'route' => 'admin.app.settings.splash.screen',
                                    ],
                                    [
                                        'title' => __('Onboard Screen'),
                                        'route' => 'admin.app.settings.onboard.index',
                                    ],
                                ],
                            ],
                            [
                                'title' => __('Setup Social Auth'),
                                'icon' => 'menu-icon las la-mobile',
                                'links' => [
                                    [
                                        'title' => __('User Panel'),
                                        'route' => 'admin.social.auth.index',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ])

                @include('admin.components.side-nav.link', [
                    'route' => 'admin.languages.index',
                    'title' => __('Languages'),
                    'icon' => 'menu-icon las la-language',
                ])

                @include('admin.components.side-nav.link', [
                    'route' => 'admin.system.maintenance.index',
                    'title' => __('System Maintenance'),
                    'icon' => 'menu-icon las la-tools',
                ])

                {{-- Verification Center --}}
                @include('admin.components.side-nav.link-group', [
                    'group_title' => __('Verification Center'),
                    'group_links' => [
                        'dropdown' => [
                            [
                                'title' => __('Setup Email'),
                                'icon' => 'menu-icon las la-envelope-open-text',
                                'links' => [
                                    [
                                        'title' => __('Email Method'),
                                        'route' => 'admin.setup.email.config',
                                    ],
                                ],
                            ],
                              [
                                'title' => __('Setup Sms'),
                                'icon' => 'menu-icon las la-envelope-open-text',
                                'links' => [
                                    [
                                        'title' => __('Sms Method'),
                                        'route' => 'admin.setup.sms.providers.index',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ])


                @if (admin_permission_by_name('admin.setup.sections.section'))
                    <li class="sidebar-menu-header">{{ __('Setup Web Content') }}</li>
                    @php
                        $current_url = URL::current();

                        $setup_section_childs = [
                            setRoute('admin.setup.sections.section', 'banner'),
                            setRoute('admin.setup.sections.section', 'brand'),
                            setRoute('admin.setup.sections.section', 'download-app'),
                            setRoute('admin.setup.sections.section', 'special-offer'),
                        ];
                    @endphp

                    <li class="sidebar-menu-item sidebar-dropdown @if (in_array($current_url, $setup_section_childs)) active @endif">
                        <a href="javascript:void(0)">
                            <i class="menu-icon las la-terminal"></i>
                            <span class="menu-title">{{ __('Setup Section') }}</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li class="sidebar-menu-item">
                                <a href="{{ setRoute('admin.setup.sections.section', 'banner') }}"
                                    class="nav-link @if ($current_url == setRoute('admin.setup.sections.section', 'banner')) active @endif">
                                    <i class="menu-icon las la-ellipsis-h"></i>
                                    <span class="menu-title">{{ __('Banner Section') }}</span>
                                </a>
                                <a href="{{ setRoute('admin.setup.sections.section', 'brand') }}"
                                    class="nav-link @if ($current_url == setRoute('admin.setup.sections.section', 'brand')) active @endif">
                                    <i class="menu-icon las la-ellipsis-h"></i>
                                    <span class="menu-title">{{ __('Brand Section') }}</span>
                                </a>

                                <a href="{{ setRoute('admin.setup.sections.section', 'download-app') }}"
                                    class="nav-link @if ($current_url == setRoute('admin.setup.sections.section', 'download-app')) active @endif">
                                    <i class="menu-icon las la-ellipsis-h"></i>
                                    <span class="menu-title">{{ __('Downlaod App section') }}</span>
                                </a>

                                <a href="{{ setRoute('admin.setup.sections.section', 'special-offer') }}"
                                    class="nav-link @if ($current_url == setRoute('admin.setup.sections.section', 'special-offer')) active @endif">
                                    <i class="menu-icon las la-ellipsis-h"></i>
                                    <span class="menu-title">{{ __('Special Offer section') }}</span>
                                </a>

                          

                            </li>
                        </ul>
                    </li>
                @endif



                @include('admin.components.side-nav.link', [
                    'route' => 'admin.extensions.index',
                    'title' => __('Extensions'),
                    'icon' => 'menu-icon las la-puzzle-piece',
                ])

                @include('admin.components.side-nav.link', [
                    'route' => 'admin.useful.links.index',
                    'title' => __('Useful Links'),
                    'icon' => 'menu-icon las la-link',
                ])

                @if (admin_permission_by_name('admin.payment.gateway.view'))
                    <li class="sidebar-menu-header">{{ __('Payment Methods') }}</li>
                    @php
                        $payment_payment_method_childs = [
                            setRoute('admin.payment.gateway.view', ['payment-method', 'automatic']),
                            setRoute('admin.payment.gateway.view', ['money-out', 'manual']),
                        ];
                    @endphp
                    <li class="sidebar-menu-item sidebar-dropdown @if (in_array($current_url, $payment_payment_method_childs)) active @endif">
                        <a href="javascript:void(0)">
                            <i class="menu-icon las la-funnel-dollar"></i>
                            <span class="menu-title">{{ __('Payment Method') }}</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li class="sidebar-menu-item">
                                <a href="{{ setRoute('admin.payment.gateway.view', ['payment-method', 'automatic']) }}"
                                    class="nav-link @if ($current_url == setRoute('admin.payment.gateway.view', ['payment-method', 'automatic'])) active @endif">
                                    <i class="menu-icon las la-ellipsis-h"></i>
                                    <span class="menu-title">{{ __('Automatic') }}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                {{-- Notifications --}}
                @include('admin.components.side-nav.link-group', [
                    'group_title' => __('Notification'),
                    'group_links' => [
                        'dropdown' => [
                            [
                                'title' => __('Push Notification'),
                                'icon' => 'menu-icon las la-bell',
                                'links' => [
                                    [
                                        'title' => __('Setup Notification'),
                                        'route' => 'admin.push.notification.config',
                                    ],
                                    [
                                        'title' => __('Send Notification'),
                                        'route' => 'admin.push.notification.index',
                                    ],
                                ],
                            ],
                        ],
                        // [
                        //     'title' => __('Contact Messages'),
                        //     'route' => 'admin.contact.messages.index',
                        //     'icon' => 'menu-icon las la-sms',
                        // ],
                    ],
                ])

                @php
                    $bonus_routes = ['admin.cookie.index', 'admin.server.info.index', 'admin.cache.clear'];
                @endphp

                @if (admin_permission_by_name_array($bonus_routes))
                    <li class="sidebar-menu-header">{{ __('Bonus') }}</li>
                @endif

                @include('admin.components.side-nav.link', [
                    'route' => 'admin.cookie.index',
                    'title' => __('GDPR Cookie'),
                    'icon' => 'menu-icon las la-cookie-bite',
                ])

                @include('admin.components.side-nav.link', [
                    'route' => 'admin.server.info.index',
                    'title' => __('Server Info'),
                    'icon' => 'menu-icon las la-sitemap',
                ])

                @include('admin.components.side-nav.link', [
                    'route' => 'admin.cache.clear',
                    'title' => __('Clear Cache'),
                    'icon' => 'menu-icon las la-broom',
                ])
            </ul>
        </div>
    </div>
</div>
