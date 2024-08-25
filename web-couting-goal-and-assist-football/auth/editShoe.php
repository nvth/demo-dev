<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Shoes</title>
    <link rel="icon" type="image/x-icon" href="../img/favicon.ico">
    <link rel="stylesheet" href="../statics/edit.css">
</head>
<body>
<?php
    include "../dbconnect.php";
    include "authenticate.php";

    $shoe_id = $_POST['shoe_id_update']; //get shoe_id
    $q = "select * from myshoes where shoe_id = $shoe_id";
    $rs = mysqli_query($conn, $q);

    $row = mysqli_fetch_assoc($rs);

    if (isset($_POST['add-btn'])) {
        # code...
        $updateShoename= $_POST['nameshoes'];
        $updateShoesize = $_POST['size'];

        $q = "UPDATE myshoes SET nameshoes = '$updateShoename', size ='$updateShoesize' where shoe_id=".$shoe_id;
        mysqli_query($conn, $q);
        echo "Product updated!";
        header('location: listShoe.php');

    }
?>
    <form action="editShoe.php" method="post" enctype = "multipart/form-data">

        <h1>Detail of <?php echo htmlspecialchars($row['nameshoes'],ENT_QUOTES, 'UTF-8') ?></h1>
    <!-- get id of database to query update -->
        <input type="hidden" name="shoe_id_update" value=<?php echo htmlspecialchars($row['shoe_id'],ENT_QUOTES, 'UTF-8'); ?>>
        <p>Name of Shoes</p>
        <input type="text" name="nameshoes" value = "<?php echo htmlspecialchars($row['nameshoes'],ENT_QUOTES, 'UTF-8');?>">
        <p>Size</p>
        <input type="text" name="size" value = <?php echo htmlspecialchars($row['size'],ENT_QUOTES, 'UTF-8');?>>
        <button type="submit" name="add-btn">Update Product</button>
</form>
<button class="back-button" onclick="window.location.href='dashboard.php'">Back to Manager Dashboard</button>  
</body>
</html>


