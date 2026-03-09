<!doctype html>
<html lang="az">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Contact Message</title>
</head>
<body style="margin:0; padding:0; background:#f6f7fb; font-family: Arial, Helvetica, sans-serif; color:#111827;">
  <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#f6f7fb; padding:28px 12px;">
    <tr>
      <td align="center">
        <table role="presentation" width="640" cellpadding="0" cellspacing="0" style="max-width:640px; width:100%;">
          <!-- Header -->
          <tr>
            <td style="padding: 6px 6px 14px 6px;">
              <div style="font-size:12px; color:#6b7280; letter-spacing:0.08em; text-transform:uppercase;">
                Yeni müraciət
              </div>
              <div style="font-size:22px; font-weight:700; line-height:1.25; margin-top:6px;">
                Contact Message
              </div>
              <div style="font-size:13px; color:#6b7280; margin-top:8px;">
                Bu email əlaqə formasından gələn yeni mesajdır.
              </div>
            </td>
          </tr>

          <!-- Card -->
          <tr>
            <td style="background:#ffffff; border-radius:16px; padding:18px; box-shadow:0 8px 24px rgba(17,24,39,0.08);">
              <!-- Person row -->
              <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                <tr>
                  <td style="padding: 4px 0 14px 0; border-bottom:1px solid #eef0f4;">
                    <div style="font-size:14px; color:#6b7280;">Göndərən</div>
                    <div style="font-size:18px; font-weight:700; margin-top:4px;">
                      {{ $data['name'] ?? '-' }} {{ $data['surname'] ?? '' }}
                    </div>
                  </td>
                </tr>
              </table>

              <!-- Details -->
              <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="margin-top:14px;">
                <tr>
                  <td style="padding:10px 0; border-bottom:1px dashed #eef0f4;">
                    <div style="font-size:12px; color:#6b7280; text-transform:uppercase; letter-spacing:.06em;">Email</div>
                    <div style="font-size:14px; font-weight:600; margin-top:4px;">
                      <a href="mailto:{{ $email ?? '' }}" style="color:#111827; text-decoration:none;">
                        {{ $data['email'] ?? '-' }}
                      </a>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td style="padding:10px 0; border-bottom:1px dashed #eef0f4;">
                    <div style="font-size:12px; color:#6b7280; text-transform:uppercase; letter-spacing:.06em;">Telefon</div>
                    <div style="font-size:14px; font-weight:600; margin-top:4px;">
                      <a href="tel:{{ $phone ?? '' }}" style="color:#111827; text-decoration:none;">
                        {{ $data['phone'] ?? '-' }}
                      </a>
                    </div>
                  </td>
                </tr>
              </table>

              <!-- Message -->
              <div style="margin-top:16px;">
                <div style="font-size:12px; color:#6b7280; text-transform:uppercase; letter-spacing:.06em;">
                  Mesaj
                </div>
                <div style="margin-top:8px; background:#f9fafb; border:1px solid #eef0f4; border-radius:14px; padding:14px; font-size:14px; line-height:1.6; white-space:pre-wrap;">
                  {{ $data['message'] ?? '-' }}
                </div>
              </div>

              <!-- CTA -->
              <div style="margin-top:18px;">
                <table role="presentation" cellpadding="0" cellspacing="0">
                  <tr>
                    <td style="background:#111827; border-radius:12px;">
                      <a href="mailto:{{ $email ?? '' }}"
                         style="display:inline-block; padding:12px 16px; color:#ffffff; text-decoration:none; font-weight:700; font-size:14px;">
                        Cavabla (Email)
                      </a>
                    </td>
                    <td style="width:10px;"></td>
                    <td style="background:#eef0f4; border-radius:12px;">
                      <a href="tel:{{ $phone ?? '' }}"
                         style="display:inline-block; padding:12px 16px; color:#111827; text-decoration:none; font-weight:700; font-size:14px;">
                        Zəng et (Telefon)
                      </a>
                    </td>
                  </tr>
                </table>
              </div>

            </td>
          </tr>

          <!-- Footer -->
          <tr>
            <td style="padding:14px 6px 0 6px; font-size:12px; color:#9ca3af; line-height:1.6;">
              Bu email avtomatik yaradılıb. Əgər bu müraciət sizə aid deyilsə, nəzərə almayın.
              <div style="margin-top:6px;">
                © {{ date('Y') }} {{ config('app.name') }}
              </div>
            </td>
          </tr>

        </table>
      </td>
    </tr>
  </table>
</body>
</html>