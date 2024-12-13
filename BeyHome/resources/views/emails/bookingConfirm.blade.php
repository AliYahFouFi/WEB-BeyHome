<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
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
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
        }

        .email-header h1 {
            color: #007bff;
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
    </style>
</head>

<body>
    <div class="email-container">
        <div class="email-header">
            <h1>Booking Confirmation</h1>
        </div>
        <div class="email-body">
            <p>Dear {{ $user->name }},</p>
            <p>Thank you for your booking. We're excited to confirm your reservation for:</p>
            <ul>
                <li><strong>Property Name:</strong> {{ $property->name }}</li>
                <li><strong>Location:</strong> {{ $property->location }}</li>
                <li><strong>Price:</strong> ${{ $property->price }}</li>

            </ul>
            <p>If you have any questions or need further assistance, feel free to contact us.</p>
        </div>
        <div class="email-footer">
            <p>&copy; {{ date('Y') }} BeyHome. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
