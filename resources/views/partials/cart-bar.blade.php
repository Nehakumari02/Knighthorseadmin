<style>
    .cart-bar .btn--base {
        text-align: left  !important;
    }
</style>
<div class="cart-bar">
    <div class="cartbar-close">
        <button class="cart-hide"><i class="las la-angle-double-right"></i></button>
    </div>
    <div class="cartbar-inner">
        <div class="cartbar-header">
            <div class="cart-header text-center">
                <h2 class="title">{{ __('Cart') }} <i class="las la-shopping-bag"></i></h2>
            </div>
        </div>
        <div class="cartbar-item">
            <div class="cart-item-wrapper">
                @if (count(session('cart', [])) > 0)
                    @foreach (session('cart', []) as $id => $item)
                        <div class="cart-item catagori-item" data-id="{{ $id }}">
                            <div class="cart-content">
                                <div class="cart-thumb">
                                    <img src="{{ asset('public/frontend/images/site-section/', $item['image']) }}">
                                </div>
                                <div class="cart-title">
                                    <a href="#">{{ $item['name'] }}</a>
                                    <div class="button">
                                        <div class="quantity-area">
                                            <form method='POST' class='quantity d-flex' action='#'>
                                                <input type='button' value='-' class='qtyminus-cart minus'
                                                    data-id='{{ $id }}'>
                                                <input type='text' name='quantity' value='{{ $item['quantity'] }}'
                                                    class='qty text-center cart-qty-{{ $id }}' readonly>
                                                <input type='button' value='+' class='qtyplus-cart plus'
                                                    data-id='{{ $id }}'>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="remove-btn"><i class="las la-trash"></i></button>
                        </div>
                    @endforeach
                @else
                    <div class="empty-cart-message text-center py-4">
                        <i class="las la-shopping-cart fs-1"></i>
                        <p class="mt-2">Your cart is empty</p>
                    </div>
                @endif
            </div>
        </div>
        <div class="cartbar-bottom">
            <div class="price-details">
                @php
                    $totalAmount = 0;

                    $totalOriginalAmount = 0;
                    $totalDiscount = 0;

                    if (count(session('cart', [])) > 0) {
                        foreach (session('cart', []) as $id => $item) {
                            $totalOriginalAmount += $item['price'] * $item['quantity'];

                            // If offer_price exists and is less than price
                            if (isset($item['offer_price']) && $item['offer_price'] > 0) {
                                $totalAmount += $item['offer_price'] * $item['quantity'];
                                $totalDiscount = 0;
                            } else {
                                $totalAmount += $item['price'] * $item['quantity'];
                            }
                        }
                    }
                @endphp

                @if (count(session('cart', [])) > 0)
                    <p class="total-pp">{{ __('Subtotal') }}: <span>${{ number_format($totalOriginalAmount, 2) }}</span>
                    </p>
                    <p class="discount-pp">{{ __('Total Discount') }}:
                        <span>${{ number_format($totalDiscount, 2) }}</span>
                    </p>
                    <p class="payment-pp">{{ __('Payable Amount') }}:
                        <span>${{ number_format($totalAmount, 2) }}</span>
                    </p>
                @else
                    <p class="total-pp">{{ __('Subtotal') }}: <span>$0.00</span></p>
                    <p class="discount-pp">{{ __('Total Discount') }}: <span>$0.00</span></p>
                    <p class="payment-pp">{{ __('Payable Amount') }}: <span>$0.00</span></p>
                @endif
            </div>
        </div>
    </div>
    <div class="checkout-btn pt-3">
        <a href="{{ route('checkout') }}"
            class="btn--base w-100 {{ count(session('cart', [])) == 0 ? 'disabled' : '' }}">
            {{ __('Proceed:') }} <span>${{ number_format($totalAmount, 2) }}</span>
        </a>
    </div>
</div>
@push('script')
    <script>
        $(document).ready(function() {
            const APP_URL = '{{ url('/') }}';



            let cart = {};

            // Initialize cart from session
            loadCartFromServer();

            // Hide cart when clicking outside
            $(document).on('click', function(e) {
                const $bodyWrapper = $('.body-wrapper');
                if (!$(e.target).closest('.cart-bar').length &&
                    !$(e.target).closest('.cart-btn-wrapper').length &&
                    $('.cart-bar').hasClass('show')) {
                    $('.cart-bar').removeClass('show');
                     $bodyWrapper.removeClass('show');
                }
            });

            // Prevent clicks inside cart from closing it
            $('.cart-bar').on('click', function(e) {
                e.stopPropagation();
            });

            function initCart() {
                // Add to Cart
                $('.add-to-cart-btn').on('click', function(e) {


                    e.preventDefault();
                    addToCart($(this));
                });

                // Quantity controls in product list
                $('.qtyplus').on('click', function() {

                    updateQuantity($(this), 1);
                });

                $('.qtyminus').on('click', function() {
                    updateQuantity($(this), -1);
                });

                // Cart item controls
                $('.cart-item-wrapper')
                    .on('click', '.qtyplus-cart', function() {
                        console.log(142);

                        updateCartItemQuantity($(this).data('id'), 1);
                    })
                    .on('click', '.qtyminus-cart', function() {
                        updateCartItemQuantity($(this).data('id'), -1);
                    })
                    .on('click', '.remove-btn', function() {
                        removeCartItem($(this).closest('.cart-item').data('id'));
                    });
            }

            function loadCartFromServer() {
                $.get('{{ route('cart.get') }}', function(response) {
                    if (response.success && response.cart) {

                        if (Array.isArray(response.cart)) {
                            cart = {};
                            response.cart.forEach(item => {
                                cart[item.id] = item;
                                $(`.product-qty-${item.id}`).val(item.quantity);
                                $(`.add-to-bag-${item.id}`).addClass('active');
                            });
                        } else {
                            cart = response.cart || {};
                            Object.values(cart).forEach(item => {
                                $(`.product-qty-${item.id}`).val(item.quantity);
                                $(`.add-to-bag-${item.id}`).addClass('active');
                            });
                        }
                        updateCartUI();
                        updateCartCount();
                    }
                    initCart();
                }).fail(function() {
                    console.error('Failed to load cart');
                    initCart();
                });
            }

            function saveCartToServer() {
                const cartArray = Object.values(cart);

                // Calculate totals for server
                const {
                    totalOriginalAmount,
                    totalAmount,
                    totalDiscount
                } = calculateTotals();

                $.post('{{ route('cart.update') }}', {
                    _token: '{{ csrf_token() }}',
                    cart: cartArray,
                    totalAmount: totalAmount,
                    totalOriginalAmount: totalOriginalAmount,
                    totalDiscount: totalDiscount
                }, function(response) {
                    if (!response.success) {
                        console.error('Failed to save cart');
                    }
                }).fail(function() {
                    console.error('Failed to save cart');
                });
            }

            function addToCart(button) {
                const container = button.closest('.catagori-item');
                const qtyInput = container.find('.qty');
                const quantity = parseInt(qtyInput.val()) || 1;
                const id = button.data('id');

                const item = {
                    id: id,
                    name: button.data('name'),
                    price: parseFloat(button.data('price')),
                    
                    main_price: parseFloat(button.data('main-price')),
                    shipment_type: button.data('shipment-type'),
                    offer_price: parseFloat(button.data('offer-price')),
                    image: button.data('image'),
                    quantity: quantity
                };

                if (!cart[id]) {
                    cart[id] = item;
                    updateCartCount();
                } else {
                    cart[id].quantity += quantity;
                    $(`.product-qty-${id}`).val(cart[id].quantity);
                }

                container.find('.add-to-bag-' + id).addClass('active');
                updateCartUI();
                saveCartToServer();
            }

            function updateQuantity(element, change) {
                const container = element.closest('.catagori-item');
                const input = container.find('.qty');
                let value = parseInt(input.val()) || 1;
                const id = element.data('id');

                if (!cart[id]) return;

                if (change > 0) {
                    // Increase quantity
                    value++;
                    cart[id].quantity = value;
                } else if (value > 1) {
                    // Decrease quantity (but not below 1)
                    value--;
                    cart[id].quantity = value;
                } else {
                    // Delete item when quantity would go below 1
                    delete cart[id];
                    $('.add-to-bag-' + id).removeClass('active');
                    $(`.product-qty-${id}`).val(1);
                    updateCartCount();
                    updateCartUI();
                    saveCartToServer();
                    return; // Exit early since item was deleted
                }

                // Update UI and save to server
                input.val(value);
                $(`.product-qty-${id}`).val(value);
                updateCartUI();
                saveCartToServer();
            }

            function updateCartItemQuantity(id, change) {
                if (!cart[id]) return;

                if (change > 0) {
                    cart[id].quantity++;
                } else if (cart[id].quantity > 1) {
                    cart[id].quantity--;
                } else {
                    delete cart[id];
                    $('.add-to-bag-' + id).removeClass('active');
                    $(`.product-qty-${id}`).val(1);
                    updateCartCount();
                }

                $(`.product-qty-${id}`).val(cart[id]?.quantity || 1);
                updateCartUI();
                saveCartToServer();
            }

            function removeCartItem(id) {
                $('.add-to-bag-' + id).removeClass('active');
                $(`.product-qty-${id}`).val(1);
                delete cart[id];
                updateCartUI();
                updateCartCount();
                saveCartToServer();
            }

            function updateCartCount() {
                const productCount = Object.keys(cart).length;
                $('.cart-number').text(productCount);
            }

            function calculateTotals() {

                let totalAmount = 0;
                let totalOriginalAmount = 0;
                let totalDiscount = 0;

                Object.values(cart).forEach(item => {
                    const itemOriginalPrice = item.main_price || item.price;
                    const itemFinalPrice = item.offer_price > 0 ? item.offer_price : item.price;
                    totalOriginalAmount += itemOriginalPrice * item.quantity;
                    totalAmount += itemFinalPrice * item.quantity;
                    totalDiscount += (itemOriginalPrice - itemFinalPrice) * item.quantity;
                });

                return {
                    totalOriginalAmount,
                    totalAmount,
                    totalDiscount
                };
            }

            function updateCartUI() {
                const $wrapper = $('.cart-item-wrapper');
                $wrapper.empty();

                if (Object.keys(cart).length === 0) {
                    $wrapper.append(`
                        <div class="empty-cart-message text-center py-4">
                            <i class="las la-shopping-cart fs-1"></i>
                            <p class="mt-2">Your cart is empty</p>
                        </div>
                    `);

                    // Clear all totals when cart is empty
                    $('.total-pp span').text('$0.00');
                    $('.discount-pp span').text('$0.00');
                    $('.payment-pp span, .checkout-btn span').text('$0.00');

                    $('.cart-bar').removeClass('show');
                    updateCartCount();
                    return;
                }





                // Calculate totals
                const {
                    totalOriginalAmount,
                    totalAmount,
                    totalDiscount
                } = calculateTotals();

                // Update cart items
                Object.values(cart).forEach(item => {
                    const itemFinalPrice = item.offer_price > 0 ? item.offer_price : item.price;


                    const itemTotal = itemFinalPrice * item.quantity;
                    const offer_price = item.main_price * item.quantity;

                    $wrapper.append(`
                        <div class="cart-item catagori-item" data-id="${item.id}">
                            <div class="cart-content">
                                <div class="cart-thumb">
                                    <img src="${APP_URL}/public/frontend/images/site-section/${item.image}" alt="cart">
                                </div>
                                <div class="cart-title">
                                    <a href="#">${item.name}</a>
                                   
                                <div class="product-price">
                                        ${
                                            item.offer_price == 0
                                            ? `<span class="text--danger">$${itemTotal.toFixed(2)}</span>`
                                            : `<span class="mrp">$${offer_price.toFixed(2)}</span> <span class="text--danger">$${itemTotal.toFixed(2)}</span>`
                                        }
                                    </div>
                                    <div class="button">
                                        <div class="quantity-area">
                                            <form method='POST' class='quantity d-flex' action='#'>
                                                <input type='button' value='-' class='qtyminus-cart minus' data-id='${item.id}'>
                                                <input type='text' name='quantity' value='${item.quantity}' class='qty text-center cart-qty-${item.id}' readonly>
                                                <input type='button' value='+' class='qtyplus-cart plus' data-id='${item.id}'>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="remove-btn"><i class="las la-trash"></i></button>
                        </div>
                    `);

                    $(`.product-qty-${item.id}`).val(item.quantity);
                });

                // Update totals display
                $('.total-pp span').text(`$${totalOriginalAmount.toFixed(2)}`);
                $('.discount-pp span').text(`$${totalDiscount.toFixed(2)}`);
                $('.payment-pp span, .checkout-btn span').text(`$${totalAmount.toFixed(2)}`);
            }
        });
    </script>
@endpush
