<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>OTP Verification</title>
</head>
<body style="margin:0; padding:0; background-color:#f4f6f8; font-family: Arial, sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0">
    <tr>
        <td align="center" style="padding: 40px 0;">
            <table width="500" cellpadding="0" cellspacing="0" style="background:#ffffff; border-radius:8px; box-shadow:0 4px 10px rgba(0,0,0,0.08);">

                <!-- Header -->
                <tr>
                    <td align="center" style="padding:20px; background:#0d6efd; color:#ffffff; border-radius:8px 8px 0 0;">
                        <h2 style="margin:0;">OTP Verification</h2>
                    </td>
                </tr>

                <!-- Body -->
                <tr>
                    <td style="padding:30px; color:#333333;">
                        <p style="font-size:16px;">Hello 👋,</p>

                        <p style="font-size:15px;">
                            Your One Time Password (OTP) is:
                        </p>

                        <div style="text-align:center; margin:30px 0;">
                            <span style="font-size:32px; letter-spacing:5px; font-weight:bold; color:#0d6efd;">
                                {{ $otp }}
                            </span>
                        </div>

                        <p style="font-size:14px;">
                            This OTP is valid for <strong>10 minutes</strong>.  
                            Please do not share this code with anyone.
                        </p>

                        <p style="font-size:14px; margin-top:25px;">
                            If you did not request this OTP, please ignore this email.
                        </p>

                        <p style="margin-top:30px;">
                            Regards,<br>
                            <strong>{{ config('app.name') }}</strong>
                        </p>
                    </td>
                </tr>

                <!-- Footer -->
                <tr>
                    <td align="center" style="padding:15px; font-size:12px; color:#999999;">
                        © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
                    </td>
                </tr>

            </table>
        </td>
    </tr>
</table>

</body>
</html>
