<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>

    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7fa;
            color: #2c3e50;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h1 {
            font-size: 2em;
            color: #1f3a65;
            margin-bottom: 20px;
        }

        /* Form Styles */
        form {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 400px;
            max-width: 90%;
        }

        label {
            display: block;
            font-size: 1.1em;
            margin-bottom: 8px;
            color: #34495e;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
            background-color: #fff;
            color: #2c3e50;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1.1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #2980b9;
        }

        /* Success and Error Messages */
        .message {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
            font-size: 1.1em;
        }

        .success {
            background-color: #28a745;
            color: white;
        }

        .error {
            background-color: #e74c3c;
            color: white;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        ul li {
            font-size: 1em;
        }
    </style>
</head>
<body>

    <h1>Edit User</h1>

    <!-- Display Success or Error Messages -->
    @if(session('success'))
        <div class="message success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="message error">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.updateUser', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="username">Username:</label>
        <input type="text" name="username" id="username" value="{{ $user->username }}" required>
        
        <label for="programid">Program ID:</label>
        <input type="text" name="programid" id="programid" value="{{ $user->programid }}" required>
        
        <button type="submit">Update</button>
    </form>

</body>
</html>
