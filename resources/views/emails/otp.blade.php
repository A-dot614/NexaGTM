<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; background: #0d1117; color: #e6edf3; }
        .container { max-width: 480px; margin: 40px auto; background: #161b22; border-radius: 12px; padding: 32px; }
        .otp { font-size: 36px; font-weight: bold; letter-spacing: 12px; color: #3fb950; text-align: center; padding: 20px; background: #0d1117; border-radius: 8px; margin: 24px 0; }
        .footer { font-size: 12px; color: #8b949e; margin-top: 24px; }
    </style>
</head>
<body>
    <div class="container">
        <h2 style="color:#3fb950;">NexaGTM Security Code</h2>
        <p>Hi {{ $userName }},</p>
        <p>Your one-time login code is:</p>
        <div class="otp">{{ $otp }}</div>
        <p>This code expires in <strong>10 minutes</strong>. Do not share it with anyone.</p>
        <div class="footer">If you didn't request this, please ignore this email.</div>
    </div>
</body>
</html>
