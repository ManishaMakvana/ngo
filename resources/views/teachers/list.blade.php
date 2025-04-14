<!DOCTYPE html>
<html>
<head>
    <title>Teachers List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa; /* Light gray background */
            color: #333; /* Dark text for readability */
            margin: 20px;
            text-align: center;
        }
        h2 {
            color: #007bff; /* Blue heading */
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #ffffff; /* White background for table */
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color:rgb(124, 181, 241);
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2; /* Light gray alternate rows */
        }
        button {
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            margin: 5px;
        }
        .download-btn {
            background-color:rgb(97, 148, 190); /* Green */
            color: white;
        }
        .upload-btn {
            background-color:rgb(231, 200, 115); /* Yellow */
            color: black;
        }
        button:hover {
            opacity: 0.8;
        }
        a {
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h2>Imported Teachers</h2>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Teacher Name</th>
            <th>Teacher ID</th>
            <th>Password</th>
            <th>Action</th>
        </tr>
        @foreach($teachers as $teacher)
        <tr>
            <td>{{ $teacher->id }}</td>
            <td>{{ $teacher->email }}</td>
            <td>{{ $teacher->teacher_name }}</td>
            <td>{{ $teacher->teacher_id }}</td>
            <td>{{ $teacher->password }}</td>
            <td>
                <a href="{{ route('teacher.editPassword', $teacher->id) }}">
                    <button style="background-color:rgb(209, 85, 97); color: white;">Change Password</button>
                </a>
            </td>
        </tr>
        @endforeach
    </table>
    <br>

    <a href="{{ route('teacher.export') }}">
        <button class="download-btn">📥 Download Teachers List</button>
    </a>

    <a href="{{ route('teacher.form') }}">
        <button class="upload-btn">📤 Upload Another File</button>
    </a>
</body>
</html>
