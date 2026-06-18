<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thanks for reaching out to NexaGTM</title>
</head>
<body style="margin: 0; padding: 0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; background-color: #0d1117; color: #ffffff;">

  <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="padding: 40px 20px;">
    <tr>
      <td align="center">
        <table role="presentation" width="100%" max-width="600px" cellspacing="0" cellpadding="0" border="0" style="background-color: #161b22; border-radius: 16px; border: 1px solid #30363d; overflow: hidden; max-width: 600px;">
          
          <tr>
            <td align="center" style="padding: 30px 0; background-color: #0d1117; border-bottom: 2px solid #3fb950;">
              <img src="{{ $message->embed(public_path('pic/logo.png')) }}" alt="NexaGTM Logo" width="60" style="display: block;">
            </td>
          </tr>

          <tr>
            <td style="padding: 40px 30px;">
              <h1 style="margin: 0 0 20px 0; font-size: 24px; color: #ffffff;">Hi {{ $data['name'] ?? 'there' }},</h1>
              <p style="margin: 0 0 20px 0; line-height: 1.6; color: #c9d1d9;">Thanks for reaching out to NexaGTM. We’ve received your inquiry and a member of our team will get back to you within 24–48 hours.</p>
              
              <div style="background-color: #0d1117; padding: 20px; border-left: 4px solid #3fb950; border-radius: 4px; margin-bottom: 30px;">
                <p style="margin: 0 0 10px 0; font-size: 12px; font-weight: bold; text-transform: uppercase; color: #3fb950;">Your Message:</p>
                <p style="margin: 0; font-style: italic; color: #8b949e; line-height: 1.5;">"{{ $data['message'] ?? '' }}"</p>
              </div>

              <p style="margin: 0; line-height: 1.6; color: #c9d1d9;">Best regards,<br><strong>The NexaGTM Team</strong></p>
            </td>
          </tr>

          <tr>
            <td style="padding: 20px 30px; background-color: #0d1117; text-align: center; font-size: 12px; color: #8b949e;">
              &copy; {{ date('Y') }} NexaGTM. All rights reserved.
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>

</body>
</html>