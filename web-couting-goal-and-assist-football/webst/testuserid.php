<?php
// Bắt đầu phiên làm việc
session_start();

include "dbconnect.php";

if (isset($_POST["login-btn"])) {
    # code...
    $username = $_POST['userid'];
    $password = $_POST['password'];
    $rows = mysqli_query($conn, "select * from account where username = '$username' and password = '$password'");
    $count = mysqli_num_rows($rows);

    if ($count == 1){
        $_SESSION['logged'] = true;
        $sql = "SELECT id FROM account WHERE username = '$username'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $user_id = $row['id'];
        $_SESSION['user_id'] = $user_id;
    }
    // Kiểm tra và sử dụng ID người dùng từ biến session
    if(isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        echo "ID của người dùng sau khi đăng nhập: " . $user_id;
    } else {
        echo "Người dùng chưa đăng nhập hoặc ID không tồn tại trong session.";
    }

}

?>

<body>
    <div class="login-form">
        <h2>Login Form</h2>
        <form action="testuserid.php" method="post">
            <label for="username">Username</label>
            <input type="text" name="userid" required>
            <label for="password">Password</label>
            <input type="password" name="password" required>
            <button type="submit" name="login-btn" value="Login">Login</button>
        </form>
    </div>
</body>