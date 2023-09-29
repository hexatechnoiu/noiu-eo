<!DOCTYPE html>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1, maximum-scale=1" />
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
          <div class="logo">
            <img src="https://gdrive.azfasa15.workers.dev/logo-eo-blue" class="h-16 mt-6 mx-auto" alt="NOIU Logo" />
          </div>

          <h1>Invoice</h1>
      </div>
      <div class="invoice-details">
          <p><strong>Invoice Number:</strong> NOIU_EO//{{ date('dmy_his') }}//{{ $detail['booking_id'] }}</p>
          <p><strong>Invoice Date:</strong> {{ date('d/m/y h:i:s') }}</p>
      </div>
      <table class="invoice-table">
          <thead>
              <tr>
              </tr>
          </thead>
          <tbody>
              <tr>
                <th>Package Name</th>

                  <td>{{ $detail['package_name'] }}</td>
              </tr>
              <tr>
                <th>Desc</th>

                  <td style="word-wrap: break-word">{{ $detail['package_desc'] }}</td>
              </tr>
              <tr>
                <th>For Date</th>

                  <td>{{ $detail['for_date'] }}</td>
              </tr>
              <tr>
              <th>Status</th>
                  <td style="text-transform: capitalize">{{ $detail['status'] }}</td>
              </tr>
              <tr>
                  <th>Price</th>

                  <td>{{ $detail['package_price'] }}</td>
              </tr>
              <th>Payment Method</th>

                  <td>{{ $detail['payment_method'] }}</td>
              </tr>
          </tbody>
      </table>
      <div class="invoice-total">
          <p><strong>Total:</strong> {{ $detail['package_price'] }}</p>
      </div>

      <div class="invoice-footer">
          <strong>Please keep this Email</strong><br>
          <div>This order was created by {{ $detail['user_name_db'] }} as {{ $detail['order_name'] }}</div><br>
          <p>Thank you for your business!</p>
        </div>
      </div>
      <small style="margin: 18%">This email created automatically</small> <br>
</body>

</html>
