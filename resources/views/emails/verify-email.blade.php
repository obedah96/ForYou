<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Your Email Address</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            padding: 20px;
            text-align: center;
        }
        .email-header {
            background-color: #4CAF50;
            color: #ffffff;
            padding: 20px;
            font-size: 24px;
            font-weight: bold;
        }
        .email-body {
            padding: 20px;
            font-size: 16px;
            line-height: 1.6;
        }
        .email-button {
            display: inline-block;
            margin: 20px 0;
            padding: 12px 20px;
            background-color: #4CAF50;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .email-button:hover {
            background-color: #45a049;
        }
        .email-footer {
            font-size: 14px;
            color: #888;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            Verify Your Email Address
        </div>
        <div class="email-body">
            <p>Hello!</p>
            <p>Thank you for signing up. Please click the button below to verify your email address:</p>
            <a href="{{ $verificationUrl }}" class="email-button">Verify Email</a>
            <p>If you did not create this account, no further action is required.</p>
        </div>
        <div class="email-footer">
            <p>Thank you,<br>Your Company Name</p>
        </div>
    </div>
</body>
</html>
