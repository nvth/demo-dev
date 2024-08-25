<!DOCTYPE html>
<html>
<head>
<title>Manager Shoe Stats</title>
<link rel="icon" type="image/x-icon" href="../img/favicon.ico">
<link rel="stylesheet" href="../statics/dashboard.css">
</head>
<body>
    <table>
        <tr>
            <td>
                <div class="button-container">
                    <form action="upload_infomation.php" method="post">
                        <button type="submit" class="button" name="Upload">Upload</button>
                    </form>
                </div>
                <div class="button-container">
                    <form action="details.php" method="post">
                        <button type="submit" class="button" name="details">Details Stats</button>
                    </form>
                </div>
                <div class="button-container">
                    <form action="listShoe.php" method="post">
                        <button type="submit" class="button" name="details">List Shoe</button>
                    </form>
                </div>
            </td>
        </tr>
    </table>
</body>
</html>

<?php

include "authenticate.php"; // check auth

if (isset($_POST['upload'])) {
    # code...
    header("location:upload_infomation.php"); 
}

if (isset($_POST['details'])) {
    # code...
    header("location:details.php"); 
}

if (isset($_POST['listShoe'])) {
    # code...
    header("location:listShoe.php"); 
}
?>