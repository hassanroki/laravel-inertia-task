<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Your Email</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            background: #f3f4f6;
            font-family: Arial, sans-serif;
            color: #374151;
        }

        .wrapper {
            width: 100%;
            padding: 40px 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        }

        .content {
            padding: 40px 30px;
        }

        .content h2 {
            margin: 0 0 20px;
            font-size: 24px;
            color: #111827;
        }

        .content p {
            margin: 0 0 16px;
            font-size: 16px;
            line-height: 1.7;
        }

        .otp-wrapper {
            text-align: center;
            margin: 32px 0;
        }

        .otp-box {
            display: inline-block;
            padding: 16px 36px;
            background: #eef2ff;
            border: 2px dashed #6366f1;
            border-radius: 10px;
            color: #4338ca;
            font-size: 32px;
            font-weight: 700;
            letter-spacing: 8px;
        }

        .muted {
            color: #6b7280;
            font-size: 15px;
        }

        .expire {
            color: #dc2626;
            font-weight: 700;
        }

        .footer {
            padding: 20px;
            text-align: center;
            background: #f9fafb;
            border-top: 1px solid #e5e7eb;
            font-size: 13px;
            color: #9ca3af;
        }

        @media only screen and (max-width: 600px) {
            .content {
                padding: 30px 20px;
            }

            .otp-box {
                font-size: 26px;
                padding: 14px 24px;
                letter-spacing: 6px;
            }

            .header h1 {
                font-size: 24px;
            }

            .content h2 {
                font-size: 22px;
            }
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <div class="content">
                <h2>Verify Your Email</h2>

                <p>Hello <strong>{{ $userName }}</strong>,</p>

                <p>Your verification code is:</p>

                <div class="otp-wrapper">
                    <div class="otp-box">{{ $otp }}</div>
                </div>

                <p class="muted">
                    This code will expire in <span class="expire">10 minutes</span>.
                </p>

                <p class="muted">
                    If you did not create an account, you can ignore this email.
                </p>

                <p>
                    Best regards,<br>
                    <strong>Task App Team</strong>
                </p>
            </div>

            <div class="footer">
                © {{ date('Y') }} Task App. All rights reserved.
            </div>
        </div>
    </div>
</body>

</html>
