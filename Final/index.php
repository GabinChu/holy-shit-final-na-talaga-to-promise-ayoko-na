<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url('background_image.jpg');
            background-size: cover;
            background-position: center;
        }

        header {
            background-color: #3498db;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }

        nav {
            background-color: #2c3e50;
            padding: 10px 0;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        li {
            display: inline-block;
            margin: 0 10px;
        }

        li a {
            text-decoration: none;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        li a:hover {
            background-color: #34495e;
        }

        li a.active {
            background-color: #2980b9;
        }

        /* Animation */
        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        nav {
            animation: fadeIn 0.5s ease;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to Arellano University Jose Rizal Campus</h1>
        <h2>Cafeteria Ordering System</h2>
    </header>
    <nav>
        <ul>
            <li><a href="student_login.php">Students Log in</a></li>
            <li><a href="staff_login.php">Staff Log in</a></li>
            <li><a href="admin_login.php">Admin Log in</a></li>
        </ul>
    </nav>
</body>
</html>
