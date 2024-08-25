<?php
    include "../dbconnect.php";

    $delete_shoe_id = $_POST['delete_shoe_id'];

    $q = "delete from myshoes where shoe_id = $delete_shoe_id";
    mysqli_query($conn, $q);
    echo "Product deleted!";
    header('location: listShoe.php');
?>