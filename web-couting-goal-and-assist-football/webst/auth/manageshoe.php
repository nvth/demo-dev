<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Football Player Stats</title>
<link rel="stylesheet" href="../statics/manageshoe.css">
<link rel="icon" type="image/x-icon" href="../img/favicon.ico">
</head>
<body>
    <h1>Football Player Stats</h1>
    <table>
        <tr>
            <th>Stadium</th>
            <th>Name of Shoes</th>
            <th>Size</th>
            <th>Scored</th>
            <th>Assisted</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
<?php
include("../dbconnect.php");

if (isset($_GET['id'])) {
    # code...
    $ms_shoeID = $_GET['id'];
    $sql = "SELECT si.stadium_name, si.info_id, ms.nameshoes, ms.size, si.scored, si.assisted, si.matchday
            FROM myshoes ms
            INNER JOIN shoeinformation si ON ms.shoe_id = si.shoe_id
            WHERE ms.shoe_id = $ms_shoeID";

$rs = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($rs)) {
?>
    <tr>
        <td><?php echo $row['stadium_name']?></td>
        <td><?php echo $row['nameshoes']?></td>
        <td><?php echo $row['size']?></td>
        <td><?php echo $row['scored']?></td>
        <td><?php echo $row['assisted']?></td>
        <td><?php echo $row['matchday']?></td>
        <td class="action-buttons">
        <form action="deteleShoeinfo.php" class="delete-form" method="POST">
            <input name="info_id" value="<?php echo $row['info_id'] ?>" type="hidden">
            <button type="submit" class='btn btn-delete'>Delete</button>
        </form>
    </td>
    </tr>

<?php 
    } 
}
?>
</table>
<button class="btn btn-add" onclick="window.location.href='details.php'">Back to Details</button>
</body>
</html>

