<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Upload Shoe Information</title>
<link rel="icon" type="image/x-icon" href="../img/favicon.ico">
<link rel="stylesheet" href="../statics/upload_infomation.css">
</head>
<body>
    <form id="shoeForm" action="upload_infomation.php" method="post" enctype="multipart/form-data">
        <p>Name of shoe</p>
        <input type="text" name="shoeName">
        <p>Size of shoe</p>
        <input type="text" name="shoeSize">
        <button type="submit" name="add-btn">Upload Shoe Information</button>
        <button type="button" onclick="redirectToOtherPage()">Back to Details</button>
    </form>

    <script>
        function redirectToOtherPage() {
            window.location.href = 'details.php'; 
        }
    </script>
</body>
</html>
<!--php--->
<?php

    include "../dbconnect.php";
    include "authenticate.php"; //check auth

    if (isset($_POST['add-btn'])) {
        # code...
        if (isset($_SESSION['user_id'])) { //check authen.idor
            $user_id = $_SESSION['user_id'];

            $shoeName= $_POST['shoeName'];
            $shoeSize = $_POST['shoeSize'];
            $q = "INSERT INTO myshoes (nameshoes, size, owner_id)
            values('$shoeName', '$shoeSize', '$user_id' )
            ";
            mysqli_query($conn, $q);

    }
}
?>

