<!DOCTYPE html>
<html>
<head>
    <title>Password Changed Notification</title>
</head>
<body>
    <h2>Dear {{ $teacherName }},</h2>
    <p>Your password has been successfully changed.</p>
    <p>Here are your new login credentials:</p>
    <ul>
        <li><strong>Email:</strong> {{ $email }}</li>
        <li><strong>New Password:</strong> {{ $newPassword }}</li>
    </ul>
    <p>Please change your password after logging in for security purposes.</p>
    <p>If you did not request this change, please contact the administrator immediately.</p>
    <p>Best regards,</p>
    <p>Admin Team</p>
</body>
</html>
