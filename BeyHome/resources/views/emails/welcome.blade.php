<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Email</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .email-container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .email-header {
            text-align: center;
            border-bottom: 2px solid #28a745;
            padding-bottom: 10px;
        }

        .email-header h1 {
            color: #28a745;
        }

        .email-body {
            margin-top: 20px;
            line-height: 1.6;
        }

        .email-body p {
            margin: 0 0 10px;
        }

        .email-footer {
            margin-top: 20px;
            text-align: center;
            color: #888;
            font-size: 14px;
        }

        .cta-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #28a745;
            color: #ffffff;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="email-header">
            <h1>Welcome to Our Platform!</h1>
        </div>
        <div class="email-body">
            <p>Hi {{ $user->name }},</p>
            <p>We’re thrilled to have you on board! Thank you for signing up. Here are a few things you can do to get
                started:</p>
            <ul>
                <li>Explore our offerings.</li>
                <li>Set up your profile for a personalized experience.</li>
                <li>Reach out to our support team if you have any questions.</li>
            </ul>
            <p>Click the button below to log in and start exploring:</p>

        </div>
        <div class="email-footer">
            <p>&copy; {{ date('Y') }} BeyHome. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
