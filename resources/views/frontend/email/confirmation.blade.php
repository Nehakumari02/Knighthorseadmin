<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }

        .logo {
            max-width: 200px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            border-radius: 8px;
            box-shadow: rgba(0, 0, 0, 0.05) 0px 3px 7px 0px;
            border: 1px solid #eee;
            overflow: hidden;
            margin: 15px 0;
        }

        th,
        td {
            border: 1px solid #eee;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f8f9fa;
            font-weight: 600;
        }

        .section-title {
            color: #2c3e50;
            margin-top: 25px;
            margin-bottom: 10px;
            font-size: 18px;
        }

        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
            font-size: 14px;
            color: #7f8c8d;
            text-align: center;
        }

        .status-pending {
            color: #f39c12;
        }

        .status-success {
            color: #27ae60;
        }

        .product-image {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 4px;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="header">
            <h2>Order Confirmation</h2>
            <p>Thank you for your purchase!</p>
        </div>

        <p>Dear {{ $user->fullname ?? $user->username }},</p>
        <p>We're pleased to confirm your order #{{ $trx_id }} has been received and is being processed. Below are
            the details of your purchase:</p>

        <h3 class="section-title">Order Summary</h3>
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @php
                    // Check if booking_data is already an object or needs decoding
                    $bookingData = is_string($user_data->booking_data->data)
                        ? json_decode($user_data->booking_data->data)
                        : $user_data->booking_data->data;

                    $cartItems = $bookingData->user_cart->data ?? [];
                @endphp

                @foreach ($cartItems as $item)
                    <tr>
                        <td>
                            <div style="display: flex; align-items: center;">
                                {{ $item->name ?? 'Product' }}
                            </div>
                        </td>
                        <td>{{ get_default_currency_symbol() }}{{ $item->price ?? '0' }}</td>
                        <td>{{ $item->quantity ?? '1' }}</td>
                        <td>{{ get_default_currency_symbol() }}{{ ($item->price ?? 0) * ($item->quantity ?? 1) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h3 class="section-title">Delivery Information</h3>
        <table>
            <tr>
                <td width="30%">Delivery Date</td>
                <td>{{ $bookingData->delivery_info->delivery_date ?? $user_data->date }}</td>
            </tr>
            <tr>
                <td>Delivery Address</td>
                <td>{{ $bookingData->delivery_info->address ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td>Contact Phone</td>
                <td>{{ $bookingData->delivery_info->phone ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td>Contact Email</td>
                <td>{{ $bookingData->delivery_info->email ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td>Delivery Notes</td>
                <td>{{ $bookingData->delivery_info->notes ?? 'None' }}</td>
            </tr>
        </table>

        <h3 class="section-title">Payment Information</h3>
        <table>
            <tr>
                <td width="30%">Payment Method</td>
                <td>{{ ucfirst($user_data->payment_method) }}</td>
            </tr>
            <tr>
                <td>Order Status</td>
                <td>
                    @if ($user_data->status == global_const()::STATUS_PENDING)
                        <span class="status-pending">{{ __('Payment Pending') }}</span>
                    @elseif ($user_data->status == global_const()::STATUS_SUCCESS)
                        <span class="status-success">{{ __('Payment Successful') }}</span>
                    @else
                        <span>{{ __('Payment Not Confirm') }}</span>
                    @endif
                </td>
            </tr>
            <tr>
                <td>Subtotal</td>
                <td>{{ get_default_currency_symbol() }}{{ getAmount($user_data->price) }}</td>
            </tr>
            <tr>
                <td>Delivery Charge</td>
                <td>{{ get_default_currency_symbol() }}{{ $bookingData->delivery_info->delivery_charge ?? '0' }}</td>
            </tr>
            <tr>
                <td><strong>Total Amount</strong></td>
                <td><strong>{{ get_default_currency_symbol() }}{{ getAmount($user_data->payable_price) }}</strong>
                </td>
            </tr>
        </table>

        <p>If you have any questions about your order, please contact our customer service team with your order number.
        </p>
        <p>We appreciate your business and hope you enjoy your purchase!</p>

        <div class="footer">
            <p>Best Regards,<br>{{ $basic_settings->site_name }}</p>
            <p>{{ date('Y') }} &copy; All Rights Reserved</p>
        </div>
    </div>
</body>

</html>
