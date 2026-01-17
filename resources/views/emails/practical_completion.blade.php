<!DOCTYPE html>
<html>

<head>
    <title>Practical Training Completed</title>
</head>

<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #eee; border-radius: 10px;">
        <h2 style="color: #059669;">Practical Training Completed!</h2>

        <p>Dear <strong>{{ $student->name }}</strong>,</p>

        <p>Congratulations! You have successfully completed your <strong>5 Practical Training Sessions</strong>.</p>

        <div
            style="padding: 15px; background-color: #f0fdf4; border-radius: 8px; margin: 20px 0; border: 1px solid #bbf7d0;">
            <p style="margin: 0; color: #166534; font-weight: bold;">
                You are now eligible to book your JPJ Test.
            </p>
        </div>

        <p>Please login to your dashboard to proceed with the next phase of your license acquisition.</p>

        <div style="text-align: center; margin: 30px 0;">
            <a href="{{ url('/') }}"
                style="background-color: #2563eb; color: white; padding: 12px 24px; text-decoration: none; border-radius: 6px; font-weight: bold;">
                Login to Dashboard
            </a>
        </div>

        <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #eee; font-size: 12px; color: #94a3b8;">
            <p>This is an automated message from Molek Driving Academy. Please do not reply directly to this email.</p>
        </div>
    </div>
</body>

</html>