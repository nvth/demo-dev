<!DOCTYPE html>
<html>
<head>
<title>Manager Shoe Stats</title>
<link rel="icon" type="image/x-icon" href="../img/favicon.ico">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('../img/wembley.jpg');
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .button-container {
            display: inline-block;
            margin-right: 10px;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            color: #fff;
            background-color: #4CAF50;
            border: 1px solid #4CAF50;
            border-radius: 5px;
            cursor: pointer;
            transition: transform 0.2s, background-color 0.3s;
        }

        .button:hover {
            background-color: #45a049;
            transform: scale(1.1);
        }
    </style>
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
                        <button type="submit" class="button" name="details">Details</button>
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

?>