<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Shoe</title>
    <link rel="stylesheet" href="../statics/listShoe.css">
    <link rel="icon" type="image/x-icon" href="../img/favicon.ico">
    <style>
    .product-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 10px;
    }

    .product-item {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: center;
    }
</style>
</head>
<body>
<table>
        <tr>
            <th>Name of Shoes</th>
            <th>Size</th>
            <th>Action</th>
        </tr>
<?php
    include "../dbconnect.php";
    include "authenticate.php";

    $owner_id = $_SESSION['user_id']; //get owner_id after login from authenticate.php
    $q = "select * from myshoes where owner_id= $owner_id";
    $rs = mysqli_query($conn, $q);

    while ($row = mysqli_fetch_array($rs)) {
?>
    <tr>
        <td class="shoe-name"><?php echo htmlspecialchars($row['nameshoes']),ENT_QUOTES, 'UTF-8' ?></td>
        <td class="shoe-size"><?php echo htmlspecialchars($row['size']),ENT_QUOTES, 'UTF-8' ?></td>
        <td class="action-buttons">
            <form method="post" action="editShoe.php">
                <input type="hidden" name="shoe_id_update" value="<?php echo htmlspecialchars($row['shoe_id'], ENT_QUOTES, 'UTF-8') ?>">
                <button type="submit">Edit</button>
            </form>
            <form method="post" action="deleteShoe.php">
                <input type="hidden" name="delete_shoe_id" value="<?php echo htmlspecialchars($row['shoe_id'], ENT_QUOTES, 'UTF-8') ?>">
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>

<?php 
    }
?>
</table>
<button class="back-button" onclick="window.location.href='dashboard.php'">Back to Manager Dashboard</button>      
</body>
</html>

