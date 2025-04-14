<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trainer Dashboard</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #2c3e50;
            color: white;
            padding: 10px 20px;
        }

        h1 {
            margin: 0;
            font-size: 2.5em;
        }

        .logout-form button {
            background-color: #e74c3c;
            color: white;
            padding: 10px 20px;
            border: none;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .logout-form button:hover {
            background-color: #c0392b;
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #34495e;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #ecf0f1;
        }

        tr:hover {
            background-color: #bdc3c7;
        }

        a {
            text-decoration: none;
            color: #3498db;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Program Info Section */
        .program-info {
            background-color: #fff;
            padding: 15px;
            margin: 15px 0;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .program-info p {
            font-size: 1.2em;
            color: #2c3e50;
        }

        .program-info strong {
            color: #3498db;
        }
    </style>
</head>
<body>

    <header>
        <h1> Trainer Dashboard</h1>
        <div class="user-info">
           
           
        </div>
        <div class="logout-form">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>
    </header>

    <div class="program-info">
        <p><strong>Program ID:</strong> {{ $program_id }}</p>
        <p><strong>Username:</strong> {{ $username }}</p>

    </div>

    <!-- Display Programs Table -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Program ID</th>
                <th>Module ID</th>
                <th>STD</th>
                <th>Document Type</th>
                <th>Title</th>
                <th>Publish Link</th>
                <th>Presentation Link</th>
                <th>YouTube Voiceover</th>
                <th>Google Slide</th>
                <th>Worksheet</th>
            </tr>
        </thead>
        <tbody>
            @foreach($programs as $program)
                <tr>
                    <td>{{ $program->id }}</td>
                    <td>{{ $program->programid }}</td>
                    <td>{{ $program->module_id }}</td>
                    <td>{{ $program->std }}</td>
                    <td>{{ $program->document_type }}</td>
                    <td>{{ $program->title }}</td>
                    <td><a href="{{ $program->publish_link }}" target="_blank">View</a></td>
                    <td><a href="{{ $program->presentation_link }}" target="_blank">View</a></td>
                    <td><a href="{{ $program->youtube_voiceover }}" target="_blank">Watch</a></td>
                    <td><a href="{{ $program->google_slide }}" target="_blank">View</a></td>
                    <td><a href="{{ $program->worksheet }}" target="_blank">Download</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
