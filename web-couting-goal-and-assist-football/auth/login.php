<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<title>Upload Shoe Information</title>
<link rel="icon" type="image/x-icon" href="../img/favicon.ico">
<link rel="stylesheet" href="../statics/login.css">
</head>
<body>
    <div class="login-form">
        <h2>Login Form</h2>
        <form action="login.php" method="post">
            <label for="username">Username</label>
            <input type="text" name="userid" required>
            <label for="password">Password</label>
            <input type="password" name="password" required>
            <button type="submit" name="login-btn" value="Login">Login</button>
        </form>
    </div>
</body>
</html>

<?php
include "../dbconnect.php";
session_start(); // save session include $user_id

if (isset($_POST["login-btn"])) {
    # code...
    $stmt = $conn->prepare("SELECT * FROM account WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    
    $username = $_POST['userid'];
    $password = $_POST['password'];

    $stmt->execute();
    $stmt->store_result();
    $count = $stmt->num_rows;

    if ($count ==1){
        $_SESSION['logged'] = true;
        $sql = "SELECT id FROM account WHERE username = '$username'"; //get userid
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $user_id = $row['id'];
        $_SESSION['user_id'] = $user_id;
        //redirect to managershoe
        header("location:details.php");
        setcookie("success", "Login successfuly");
    }else{
        header("location:../index.php");
        setcookie("error", "login failed");
    }
}
?>