<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .invoice {
            width: 80%;
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .invoice-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .invoice-header h1 {
            font-size: 24px;
        }

        .invoice-details {
            margin-bottom: 20px;
        }

        .invoice-details p {
            margin: 5px 0;
        }

        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .invoice-table th,
        .invoice-table td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        .invoice-table th {
            background-color: #f2f2f2;
        }

        .invoice-total {
            text-align: right;
            font-weight: bold;
        }

        .invoice-footer {
            text-align: center;
        }

        .invoice-footer p {
            margin: 10px 0;
        }
    </style>
</head>

<body>
    <div class="invoice">
        <div class="invoice-header">
            <img src="{!! $detail['image_url'] !!}" alt="NOIU Logo">

            <h1>Invoice</h1>
        </div>
        <div class="invoice-details">
            <p><strong>Invoice Number:</strong> NOIU_EO//{{ date('dmy_his') }}//{{ $detail['booking_id'] }}</p>
            <p><strong>Invoice Date:</strong> {{ date('d/m/y h:i:s') }}</p>
        </div>
        <table class="invoice-table">
            <thead>
                <tr>
                    <th>Package Name</th>
                    <th>Desc</th>
                    <th>For Date</th>
                    <th>Price</th>
                    <th>Payment Method</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $detail['package_name'] }}</td>
                    <td style="word-wrap: break-word">{{ $detail['package_desc'] }}</td>
                    <td>{{ $detail['for_date'] }}</td>
                    <td>{{ $detail['package_price'] }}</td>
                    <td>{{ $detail['payment_method'] }}</td>
                </tr>
            </tbody>
        </table>
        <div class="invoice-total">
            <p><strong>Total:</strong> {{ $detail['package_price'] }}</p>
        </div>

        <div class="invoice-footer">
          <strong>This order created by {{$detail['user_name_db']}} as {{$detail['order_name']}}</strong>
          <small>This email created automatically</small>
            <strong>Please keep this Email</strong>
            <p>Thank you for your business!</p>
        </div>
    </div>
</body>

</html>
