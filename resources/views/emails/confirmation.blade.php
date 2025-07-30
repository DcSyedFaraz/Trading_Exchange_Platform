<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Your Subscription</title>
    <style>
        /* Email-safe CSS */
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, sans-serif;
            background: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .header {
            background: linear-gradient(135deg, #4299e1 0%, #667eea 100%);
            padding: 30px;
            text-align: center;
        }

        .logo {
            color: white;
            font-size: 24px;
            font-weight: 700;
            text-decoration: none;
        }

        .content {
            padding: 40px 30px;
            background: #ffffff;
            text-align: center;
        }

        .icon {
            font-size: 48px;
            margin-bottom: 20px;
            display: block;
        }

        .title {
            color: #2d3748;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 20px;
            line-height: 1.3;
        }

        .message {
            color: #4a5568;
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .confirm-button {
            display: inline-block;
            background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
            color: white !important;
            padding: 14px 32px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 16px;
            box-shadow: 0 4px 12px rgba(72, 187, 120, 0.3);
            transition: all 0.2s ease;
        }

        .confirm-button:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(72, 187, 120, 0.4);
        }

        .footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #e2e8f0;
            color: #718096;
            font-size: 14px;
        }

        .signature {
            color: #2d3748;
            font-weight: 600;
        }

        .help-text {
            margin-top: 20px;
            color: #a0aec0;
            font-size: 12px;
            line-height: 1.4;
        }
    </style>
</head>

<body
    style="margin: 0; padding: 20px; background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%); min-height: 100vh;">
    <div class="email-container">
        <div class="header"> <a href="#" class="logo">{{ config('app.name') }}</a> </div>
        <div class="content"> <span class="icon">📧</span>
            <h1 class="title">Confirm Your Subscription</h1>
            <p class="message"> Please confirm your newsletter subscription by clicking the button below. </p> <a
                href="{{ url('/newsletter/confirm/' . $token) }}" class="confirm-button"> Confirm Subscription </a>
            <p class="help-text"> If the button doesn't work, copy and paste this link into your browser:<br>
                {{ url('/newsletter/confirm/' . $token) }} </p>
            <div class="footer"> Thanks,<br> <span class="signature">{{ config('app.name') }}</span> </div>
        </div>
    </div>
</body>

</html>
