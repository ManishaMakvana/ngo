<!DOCTYPE html>
<html>
<head>
    <title>Teacher Account Credentials</title>
</head>
<body>
    <h2>Dear  {{ $teacherName }},</h2>
    <p>Your account has been created successfully. Below are your login credentials:</p>
    <ul>
    <ul>
        <li><strong>Email:</strong> {{ $email }}</li>
        <li><strong>Password:</strong> {{ $password }}</li>
        <li><strong>Teacher ID:</strong> {{ $teacherId }}</li>
    </ul>
    </ul>
    <p>Please change your password after logging in.</p>
    <p>Best regards,</p>
    <p>Admin Team</p>
</body>
</html>
