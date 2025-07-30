<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $campaign->subject }}</title>
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
        }

        .subject {
            color: #2d3748;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 24px;
            line-height: 1.3;
        }

        .body {
            color: #4a5568;
            font-size: 16px;
            line-height: 1.8;
            margin-bottom: 30px;
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

        .tracking-pixel {
            display: block;
            margin: 20px auto 0;
        }
    </style>
</head>

<body
    style="margin: 0; padding: 20px; background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%); min-height: 100vh;">
    <div class="email-container">
        <div class="header"> <a href="#" class="logo">{{ config('app.name') }}</a> </div>
        <div class="content">
            <h1 class="subject">{{ $campaign->subject }}</h1>
            <div class="body"> {!! nl2br(e($campaign->body)) !!} </div>
            <div class="my-4 text-center">
                <a href="{{ "http://michael.test/campaign/click/$pivotId" }}"
                    style="background:#4299e1;color:#fff;padding:10px 20px;border-radius:6px;text-decoration:none;display:inline-block">Visit
                    Site</a>
            </div>
            <div class="footer"> Thanks,<br> <span class="signature">{{ config('app.name') }}</span> </div>
        </div>
    </div>
    {{-- Tracking Pixel --}}
    <img src="{{ "http://michael.test/campaign/open/$pivotId" }}" alt="" width="1"
        height="1" class="tracking-pixel">
</body>

</html>
