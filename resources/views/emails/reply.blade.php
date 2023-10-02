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
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="invoice">
        <div class="invoice-header">
            <div class="logo flex justify-center">
                <img src="https://gdrive.azfasa15.workers.dev/logo-eo-blue" class="h-16 mt-6 mx-auto" alt="NOIU Logo" />
            </div>
            <div style="text-align: start;">
              <h3>[{{ $data['username']}}]</h3>
              <p>{{ $data['old_message']}}</p>
            </div>
            <hr>
            <div style="text-align: end;">
              <h3>[Admin]</h3>
              <main>{!! $data['content'] !!}</main>
            </div>
        </div>
    </div>

</body>

</html>
