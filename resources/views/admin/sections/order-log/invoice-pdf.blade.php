<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Invoice {{ $transaction->trx_id }}</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 14px;
            color: #333;
        }

        .header {
            width: 100%;
            border-bottom: 2px solid #ddd;
            padding-bottom: 20px;
            margin-bottom: 20px;
        }

        .company-info {
            text-align: right;
        }

        .invoice-title {
            font-size: 24px;
            font-weight: bold;
            color: #555;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .table th {
            background-color: #f4f4f4;
        }

        .total-section {
            text-align: right;
            margin-top: 20px;
            font-size: 16px;
        }

        .badge {
            padding: 5px 10px;
            color: #fff;
            border-radius: 4px;
            font-size: 12px;
        }

        .success {
            background-color: #28a745;
        }

        .warning {
            background-color: #ffc107;
            color: #000;
        }
    </style>
</head>

<body>

    <div class="header">
        <table style="width: 100%; border: none;">
            <tr>
                <td>
                    <h2 style="margin: 0;">{{ $transaction->user->fullname ?? 'Guest' }}</h2>
                    <p>Phone: {{ $transaction->user->mobile ?? 'N/A' }}<br>
                        Email: {{ $transaction->user->email ?? 'N/A' }}</p>
                </td>
                <td class="company-info">
                    <span class="invoice-title">INVOICE</span><br>
                    <strong>TRX:</strong> {{ $transaction->trx_id }}<br>
                    <strong>Date:</strong> {{ $transaction->created_at->format('d M Y, h:i A') }}
                </td>
            </tr>
        </table>
    </div>

    <h3>Order Details</h3>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Unit Price</th>
            </tr>
        </thead>
        <tbody>
            @php
                $cartItems = $transaction->booking_data->data->user_cart->data ?? [];
                $total = 0;
            @endphp
            @foreach($cartItems as $index => $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ get_amount($item->price) }} {{ $transaction->currency_code ?? '' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="total-section">
        <p><strong>Total Amount:</strong> {{ get_amount($transaction->price) }} {{ $transaction->currency_code ?? '' }}
        </p>
        <p><strong>Payment Method:</strong> {{ $transaction->payment_gateway->name ?? 'N/A' }}</p>
        <p>
            <strong>Status:</strong>
            @if($transaction->status == 1) <span class="badge success">Paid/Complete</span>
            @elseif($transaction->status == 2) <span class="badge warning">Pending</span>
            @else <span class="badge warning">Other</span>
            @endif
        </p>
    </div>

</body>

</html>