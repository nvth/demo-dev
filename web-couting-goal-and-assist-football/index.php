<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project 1</title>
    <link rel="icon" type="image/x-icon" href="../webst/img/favicon.ico">
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f8f8f8;
    }

    header {
        background-color: #333;
        color: #fff;
        text-align: center;
        padding: 10px 0;
    }

    .container {
        max-width: 800px;
        margin: 20px auto;
        padding: 0 20px;
    }

    .card {
        background-color: #fff;
        padding: 20px;
        margin-bottom: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    h1 {
        color: #333;
    }

    p {
        color: #666;
    }

    .btn {
        background-color: #4CAF50;
        color: #fff;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
    }

    .btn:hover {
        background-color: #45a049;
    }
    .btn.disabled {
        pointer-events: none;
        opacity: 0.5;
    }
</style>


</head>
<body>
<header>
        <h1>Welcome</h1>
    </header>
    <div class="container">
        <div class="card">
            <h2>Let's identify</h2>
            <a href="../webst/auth/login.php" class="btn" id="loginBtn">Login</a>
        </div>
        <div class="card">
            <h2>Let's Regist</h2>
            <a href="#" class="btn disabled" id="registBtn">Not yet!</a>
        </div>
    </div>
</body>
</html>