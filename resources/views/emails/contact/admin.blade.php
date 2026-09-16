<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>New Contact Submission</title>
</head>
<body style="margin: 0; padding: 0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; background-color: #0d1117; color: #ffffff;">

  <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="padding: 40px 20px;">
    <tr>
      <td align="center">
        <table role="presentation" width="100%" max-width="600px" cellspacing="0" cellpadding="0" border="0" style="background-color: #161b22; border-radius: 16px; border: 1px solid #30363d; overflow: hidden; max-width: 600px;">
          
          <tr>
            <td style="padding: 25px 30px; background-color: #0d1117; border-bottom: 2px solid #3fb950;">
              <h2 style="margin: 0; color: #ffffff; font-size: 18px;">🚀 New GTM Lead</h2>
            </td>
          </tr>

          <tr>
            <td style="padding: 30px;">
              <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                
                @php
                $fields = [
                    'Name' => $data['name'] ?? '-',
                    'Email' => $data['email'] ?? '-',
                    'Phone' => $data['phone'] ?? '-',
                    'Company' => $data['company'] ?? '-',
                    'LinkedIn' => $data['linkedin'] ?? '-',
                    'Subject' => $data['subject'] ?? '-',
                    'Budget' => $data['budget'] ?? '-',
                    'Source' => $data['source'] ?? '-'
                ];
                @endphp

                @foreach($fields as $label => $value)
                <tr>
                  <td style="padding: 8px 0; font-size: 14px; color: #8b949e; width: 30%;">{{ $label }}</td>
                  <td style="padding: 8px 0; font-size: 14px; color: #ffffff; font-weight: 600;">{{ $value }}</td>
                </tr>
                @endforeach
              </table>

              <div style="margin-top: 25px; padding-top: 20px; border-top: 1px solid #30363d;">
                <p style="margin: 0 0 10px 0; font-size: 12px; font-weight: bold; text-transform: uppercase; color: #3fb950;">Message Content:</p>
                <div style="background-color: #0d1117; padding: 15px; border-radius: 8px; color: #c9d1d9; font-size: 14px; line-height: 1.5;">
                  {!! nl2br(e($data['message'] ?? '-')) !!}
                </div>
              </div>
            </td>
          </tr>

          <tr>
            <td style="padding: 20px 30px; background-color: #0d1117; text-align: center; font-size: 12px; color: #8b949e;">
              NexaGTM Internal Lead Notification
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>

</body>
</html>