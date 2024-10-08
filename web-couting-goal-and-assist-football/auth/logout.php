<?php
session_start();

function logout() {
    // Xóa tất cả các biến session
    $_SESSION = array();

    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    session_destroy();
}

logout();

header('Location: ../index.php')
// if (isset($_GET['logout'])) {
//     logout();
//     header('Location: ../index.php'); 
//     exit();
// }
// ?>