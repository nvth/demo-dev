<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Football Stats Manager</title>
<link rel="icon" type="image/x-icon" href="../img/favicon.ico">
<link rel="stylesheet" href="../statics/details.css">
<script src="../statics/js/details.js"></script>
</head>
<body>
<div class="wrapper">
    <h1>List of Football Shoe Stats</h1>

    <table>
        <tr>
            <th>Name of Shoes</th>
            <th>Scored</th>
            <th>Assisted</th>
        </tr>
<!-- HTML BLOCK-->

<!-- PHP BLOCK-->
<?php
    include "../dbconnect.php";
    include "authenticate.php"; // check auth
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id']; //check permission

        $q = "SELECT ms.nameshoes, ms.shoe_id, SUM(si.scored) AS total_scored, SUM(si.assisted) AS total_assisted
        FROM account acc
        INNER JOIN myshoes ms ON acc.id = ms.owner_id
        INNER JOIN shoeinformation si ON ms.shoe_id = si.shoe_id
        WHERE acc.id = $user_id
        GROUP BY ms.nameshoes, ms.shoe_id";
        //exceute
        $rs = mysqli_query($conn, $q);

        while ($row = mysqli_fetch_array($rs)) {
    
?>
<!-- HTML BLOCK-->
    <tr>
        <!--lấy dư liệu shoe_id từ database-->
        <td class="shoeNameCell" data-shoe-id="<?php echo $row['shoe_id']; ?>"><?php echo $row['nameshoes']; ?></td>
        <td><?php echo $row['total_scored']?></td>
        <td><?php echo $row['total_assisted']?></td>
    </tr>
    <div id="shoeDetails"></div>
    <script src="../statics/js/javascript.shoev1.js"></script>

<!-- PHP BLOCK-->    
<?php } 
            } else {
                header('location:../index.php');
            }
?>
<!-- HTML BLOCK-->
</table>
<div class="button-container">
    <button class="back-button" onclick="window.location.href='dashboard.php'">Back to Manager Dashboard</button>
    <button class="back-button" onclick="window.location.href='update_shoe_details.php'">Update Shoe Stats</button>
    <button class="logout-btn" onclick="window.location.href='logout.php'">Logout</button>
</div>
</body>
</html>