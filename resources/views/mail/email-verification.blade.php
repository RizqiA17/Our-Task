<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Email</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            align-content: center;
            height: 100svh;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            padding: 32px 20px;
            text-align: center;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
            border-radius: 6px 6px 0 0;
        }

        .content {
            padding: 20px;
        }

        .content p {
            line-height: 1.6;
            color: #333;
        }

        .content .otp {
            padding: 20px;
            font-size: 24px;
            font-weight: bold;
            width: 100%;
            display: flex;
            justify-content: center;

            .otp-number {
                letter-spacing: 32px;
                border: 2px solid #dadada;
                padding: 16px 0;
                padding-left: 32px;
                border-radius: 6px;
                text-align: center;
            }
        }

        .footer {
            background: #f7f7f7;
            text-align: center;
            padding: 15px;
            font-size: 12px;
            color: #777;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background: #28a745;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }

        /* Light Mode */
        @media (prefers-color-scheme: light) {
            .header {
                background: #99c5f6;
                color: white;
            }

            .content .otp  .otp-number {
                background: #fafafa;
            }

            .footer {
                background: #f7f7f7;
            }
        }

        /* Dark Mode */
        @media (prefers-color-scheme: dark) {
            body {
                background-color: #121212;
                color: #ffffff;
            }

            .container {
                background: #1e1e1e;
            }

            .header {
                background: #2a2a2a;
                color: white;
            }

            .content .otp {
                .otp-number{
                    border: 2px solid #2a2a2a;
                }
            }

            .content p {
                color: #e0e0e0;
            }

            .footer {
                background: #1a1a1a;
                color: #bbbbbb;
            }

            .button {
                background: #2ecc71;
            }
        }

        @media (max-width: 600px) {
            .container {
                width: 100%;
                box-shadow: none;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Hello, {{ ucwords($user->name) }}!</h1>
        </div>
        <div class="content">
            <p>Thank you for signing up. To verify your email address, please use the One-Time Password (OTP) below.
            </p>
            <div class="otp">
                <div class="otp-number">{{ $otp->otp }}</div>
            </div>
            <p>This code is valid for the next 5 minutes. If you did not request this verification, please ignore this
                email or contact our support.</p>
            <p>
                <br>
                &emsp; Best regards,
            <h3>&emsp; Our Task</h3>
            </p>
        </div>
        <div class="footer">
            <p>&copy;  {{ date('Y') }} Our Task. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
