<!DOCTYPE html>
<html>

<head>
    <title>Exam Result Notification</title>
</head>

<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #eee; border-radius: 10px;">
        <h2 style="color: #2563eb;">Exam Result Update</h2>

        <p>Dear <strong>{{ $student->name }}</strong>,</p>

        <p>The result for your <strong>{{ $phase }}</strong> has been updated.</p>

        <div style="padding: 15px; background-color: #f8fafc; border-radius: 8px; margin: 20px 0; text-align: center;">
            <p style="margin: 0; font-size: 14px; text-transform: uppercase; color: #64748b;">Result Status</p>
            <p
                style="margin: 5px 0 0; font-size: 24px; font-weight: bold; color: {{ $result == 'Pass' ? '#059669' : ($result == 'Failed' ? '#dc2626' : '#d97706') }};">
                {{ $result }}
            </p>
        </div>

        @if($result == 'Pass')
            <p>Congratulations! You have successfully passed this phase. You can view your license progress in your dashboard.
            </p>
        @elseif($result == 'Failed')
            <p>Unfortunately, you did not pass this attempt. Please open booking your booking dashboard to view re-test
                procedures.</p>
        @else
            <p>Your result status has been updated to {{ $result }}.</p>
        @endif

        <p>You can login to your dashboard to view full details.</p>

        <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #eee; font-size: 12px; color: #94a3b8;">
            <p>This is an automated message. Please do not reply directly to this email.</p>
        </div>
    </div>
</body>

</html>