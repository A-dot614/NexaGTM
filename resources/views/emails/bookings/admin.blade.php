<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>New Strategy Call Booked</title>
</head>
<body style="margin: 0; padding: 0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; background-color: #0d1117; color: #ffffff;">

  <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="padding: 40px 20px;">
    <tr>
      <td align="center">
        <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color: #161b22; border-radius: 16px; border: 1px solid #30363d; overflow: hidden; max-width: 600px; box-shadow: 0 10px 30px rgba(0,0,0,0.5);">
          
          <!-- Header -->
          <tr>
            <td style="padding: 24px 30px; background-color: #0d1117; border-bottom: 2px solid #3fb950;">
              <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                <tr>
                  <td>
                    <span style="font-size: 11px; font-weight: 800; letter-spacing: 0.15em; text-transform: uppercase; color: #3fb950; display: block; margin-bottom: 4px;">NexaGTM Scheduling</span>
                    <h2 style="margin: 0; color: #ffffff; font-size: 20px; font-weight: 700;">
                      📅 New {{ ucfirst($data['call_type'] ?? 'Call') }} Call Booked
                    </h2>
                  </td>
                  <td align="right">
                    <span style="display: inline-block; padding: 6px 12px; border-radius: 9999px; font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em; {{ ($data['call_type'] ?? '') === 'video' ? 'background-color: #0d3822; color: #3fb950; border: 1px solid #3fb950;' : 'background-color: #1c2d42; color: #58a6ff; border: 1px solid #388bfd;' }}">
                      {{ ($data['call_type'] ?? '') === 'video' ? '📹 Video Call' : '📞 Voice Call' }}
                    </span>
                  </td>
                </tr>
              </table>
            </td>
          </tr>

          <!-- Schedule Badge Highlight -->
          <tr>
            <td style="padding: 20px 30px 0 30px;">
              <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color: #0d1117; border-radius: 12px; border: 1px solid #30363d; padding: 16px 20px;">
                <tr>
                  <td style="padding: 0 10px 0 0;">
                    <div style="font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em; color: #8b949e; margin-bottom: 4px;">Scheduled Date & Time</div>
                    <div style="font-size: 16px; font-weight: 700; color: #ffffff;">
                      {{ \Carbon\Carbon::parse($data['date'])->format('l, F j, Y') }}
                    </div>
                    <div style="font-size: 14px; font-weight: 600; color: #3fb950; margin-top: 2px;">
                      {{ $data['time_slot'] ?? '-' }}
                    </div>
                  </td>
                  <td align="right" style="vertical-align: middle;">
                    <div style="font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; color: #8b949e;">Client Timezone</div>
                    <div style="font-size: 13px; font-weight: 600; color: #c9d1d9; margin-top: 2px;">
                      🌍 {{ $data['timezone'] ?? 'UTC' }}
                    </div>
                  </td>
                </tr>
              </table>
            </td>
          </tr>

          <!-- Lead Details -->
          <tr>
            <td style="padding: 24px 30px 30px 30px;">
              <h3 style="margin: 0 0 16px 0; font-size: 13px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em; color: #8b949e;">Attendee Details</h3>
              
              <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                @php
                $details = [
                    'Full Name' => $data['name'] ?? '-',
                    'Work Email' => $data['email'] ?? '-',
                    'Phone / WhatsApp' => $data['phone'] ?? 'Not provided',
                    'Company Name' => $data['company'] ?? 'Not provided',
                    'Discussion Topic' => $data['topic'] ?? 'General GTM Strategy',
                    'Call Preference' => ($data['call_type'] ?? '') === 'video' ? 'Video Meeting (Google Meet / Zoom)' : 'Voice Call (WhatsApp / Direct Phone)'
                ];
                @endphp

                @foreach($details as $label => $value)
                <tr>
                  <td style="padding: 10px 0; font-size: 13px; color: #8b949e; width: 35%; border-bottom: 1px solid #21262d;">{{ $label }}</td>
                  <td style="padding: 10px 0; font-size: 14px; color: #ffffff; font-weight: 600; border-bottom: 1px solid #21262d;">
                    @if($label === 'Work Email')
                      <a href="mailto:{{ $value }}" style="color: #3fb950; text-decoration: none;">{{ $value }}</a>
                    @elseif($label === 'Phone / WhatsApp' && $value !== 'Not provided')
                      <a href="tel:{{ $value }}" style="color: #58a6ff; text-decoration: none;">{{ $value }}</a>
                    @else
                      {{ $value }}
                    @endif
                  </td>
                </tr>
                @endforeach
              </table>

              @if(!empty($data['notes']))
              <div style="margin-top: 24px; padding-top: 20px; border-top: 1px solid #30363d;">
                <p style="margin: 0 0 8px 0; font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em; color: #3fb950;">Client Goals / Project Notes:</p>
                <div style="background-color: #0d1117; padding: 16px; border-radius: 8px; color: #c9d1d9; font-size: 14px; line-height: 1.6; border: 1px solid #30363d;">
                  {!! nl2br(e($data['notes'])) !!}
                </div>
              </div>
              @endif

              <!-- Quick Action Button -->
              <div style="margin-top: 28px; text-align: center;">
                <a href="mailto:{{ $data['email'] }}?subject=Re:%20NexaGTM%20Strategy%20Call" style="display: inline-block; background-color: #3fb950; color: #0d1117; font-weight: 700; font-size: 13px; text-transform: uppercase; letter-spacing: 0.1em; padding: 12px 28px; border-radius: 8px; text-decoration: none;">
                  Reply to Lead Directly &rarr;
                </a>
              </div>
            </td>
          </tr>

          <!-- Footer -->
          <tr>
            <td style="padding: 18px 30px; background-color: #0d1117; text-align: center; font-size: 12px; color: #8b949e; border-top: 1px solid #21262d;">
              NexaGTM Automated Call Scheduling Engine &bull; {{ config('app.url') }}
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>

</body>
</html>
