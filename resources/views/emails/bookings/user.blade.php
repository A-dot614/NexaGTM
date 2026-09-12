<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Your NexaGTM Strategy Call is Confirmed</title>
</head>
<body style="margin: 0; padding: 0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; background-color: #0d1117; color: #ffffff;">

  <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="padding: 40px 20px;">
    <tr>
      <td align="center">
        <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color: #161b22; border-radius: 16px; border: 1px solid #30363d; overflow: hidden; max-width: 600px; box-shadow: 0 10px 30px rgba(0,0,0,0.5);">
          
          <!-- Header with Logo -->
          <tr>
            <td align="center" style="padding: 28px 0; background-color: #0d1117; border-bottom: 2px solid #3fb950;">
              <table role="presentation" cellspacing="0" cellpadding="0" border="0">
                <tr>
                  <td align="center">
                    <img src="{{ $message->embed(public_path('pic/logo.png')) }}" alt="NexaGTM Logo" width="56" height="56" style="display: block; margin-bottom: 8px;">
                    <div style="font-size: 18px; font-weight: 800; color: #ffffff; letter-spacing: 0.05em;">
                      Nexa<span style="color: #3fb950;">GTM</span>
                    </div>
                  </td>
                </tr>
              </table>
            </td>
          </tr>

          <!-- Main Content -->
          <tr>
            <td style="padding: 36px 30px;">
              <h1 style="margin: 0 0 14px 0; font-size: 22px; font-weight: 800; color: #ffffff;">
                You're all set, {{ $data['name'] ?? 'there' }}! 🚀
              </h1>
              <p style="margin: 0 0 24px 0; font-size: 15px; line-height: 1.6; color: #c9d1d9;">
                Your 30-minute GTM Strategy Call has been confirmed. We're excited to learn about your business and map out an outbound acquisition engine tailored to your market.
              </p>

              <!-- Meeting Details Card -->
              <div style="background-color: #0d1117; border: 1px solid #3fb950; border-radius: 12px; padding: 22px; margin-bottom: 26px;">
                <div style="font-size: 11px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.15em; color: #3fb950; margin-bottom: 12px;">
                  Meeting Details
                </div>
                
                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                  <tr>
                    <td style="padding: 6px 0; font-size: 13px; color: #8b949e; width: 35%;">Format:</td>
                    <td style="padding: 6px 0; font-size: 14px; color: #ffffff; font-weight: 700;">
                      @if(($data['call_type'] ?? '') === 'video')
                        📹 Video Call (Google Meet)
                      @else
                        📞 Voice Call (Phone / WhatsApp)
                      @endif
                    </td>
                  </tr>
                  <tr>
                    <td style="padding: 6px 0; font-size: 13px; color: #8b949e;">Date:</td>
                    <td style="padding: 6px 0; font-size: 14px; color: #ffffff; font-weight: 700;">
                      {{ \Carbon\Carbon::parse($data['date'])->format('l, F j, Y') }}
                    </td>
                  </tr>
                  <tr>
                    <td style="padding: 6px 0; font-size: 13px; color: #8b949e;">Time Slot:</td>
                    <td style="padding: 6px 0; font-size: 14px; color: #3fb950; font-weight: 700;">
                      {{ $data['time_slot'] ?? '-' }}
                    </td>
                  </tr>
                  <tr>
                    <td style="padding: 6px 0; font-size: 13px; color: #8b949e;">Your Timezone:</td>
                    <td style="padding: 6px 0; font-size: 14px; color: #c9d1d9; font-weight: 600;">
                      🌍 {{ $data['timezone'] ?? 'Local Time' }}
                    </td>
                  </tr>
                  @if(!empty($data['topic']))
                  <tr>
                    <td style="padding: 6px 0; font-size: 13px; color: #8b949e;">Topic:</td>
                    <td style="padding: 6px 0; font-size: 14px; color: #ffffff; font-weight: 600;">
                      {{ $data['topic'] }}
                    </td>
                  </tr>
                  @endif
                </table>
              </div>

              <!-- Next Steps Notice -->
              <div style="background-color: #1c2128; border-radius: 8px; padding: 16px 20px; margin-bottom: 28px; border-left: 4px solid #3fb950;">
                <h4 style="margin: 0 0 6px 0; font-size: 13px; font-weight: 700; color: #ffffff; text-transform: uppercase; letter-spacing: 0.05em;">
                  What Happens Next?
                </h4>
                @if(($data['call_type'] ?? '') === 'video')
                  <p style="margin: 0; font-size: 13px; color: #8b949e; line-height: 1.5;">
                    A calendar invitation containing the secure Google Meet link has been prepared. Please accept the invitation to have it synchronized with your Google Calendar or Outlook.
                  </p>
                @else
                  <p style="margin: 0; font-size: 13px; color: #8b949e; line-height: 1.5;">
                    Our strategy advisor will contact you directly via phone or WhatsApp at <strong style="color: #ffffff;">{{ $data['phone'] ?? 'your provided contact number' }}</strong> promptly at your scheduled time.
                  </p>
                @endif
              </div>

              <h4 style="margin: 0 0 10px 0; font-size: 13px; font-weight: 700; color: #ffffff; text-transform: uppercase; letter-spacing: 0.05em;">
                Agenda Highlights
              </h4>
              <ul style="margin: 0 0 28px 0; padding-left: 20px; font-size: 13px; color: #8b949e; line-height: 1.7;">
                <li>Understanding your target Ideal Customer Profile (ICP) and current sales bottleneck</li>
                <li>Review of outbound domain architecture & inbox deliverability setup</li>
                <li>Live recommendations to scale booked demos and pipeline velocity</li>
              </ul>

              <p style="margin: 0; font-size: 14px; line-height: 1.6; color: #c9d1d9;">
                Need to reschedule or have urgent questions beforehand? Simply reply to this email.<br><br>
                Looking forward to speaking with you,<br>
                <strong style="color: #ffffff;">The NexaGTM Team</strong>
              </p>
            </td>
          </tr>

          <!-- Footer -->
          <tr>
            <td style="padding: 20px 30px; background-color: #0d1117; text-align: center; font-size: 12px; color: #8b949e; border-top: 1px solid #21262d;">
              &copy; {{ date('Y') }} NexaGTM. Built for high-growth B2B outbound teams.
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>

</body>
</html>
