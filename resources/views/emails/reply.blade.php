<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Reply</title>

    <style>
      .reply {
        width: 80%;
        max-width: 800px;
        margin: 20px auto;
        background-color: #fff;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }
    </style>
</head>

<body>
  <div class="reply">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td>
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <td align="center" style="padding-bottom: 20px;">
                            <img src="https://gdrive.azfasa15.workers.dev/logo-eo-blue" alt="NOIU Logo" style="display: block; margin: 0 auto; height: 64px;">
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 20px; padding-top:5px; background-color: #edffec; border-radius: 8px;">
                            <h3 style="color: #42b932; font-weight: bold; font-size: 16px; margin-bottom: 10px;">{{ $data['username']}}</h3>
                            <p style="font-size: 14px;">{{ $data['old_message']}}</p>
                        </td>
                    </tr>
                    <td>
                        &nbsp;
                    </td>
                    <tr>
                    <td style="padding: 20px; padding-top:5px; text-align: right; background-color: #ecf6ff; border-radius: 8px;">
                            <h3 style="color: #3182CE; font-weight: bold; font-size: 16px; margin-bottom: 10px;">Admin</h3>
                            <main style="font-size: 14px;">{!! $data['content'] !!}</main>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
  </div>
</body>

</html>
