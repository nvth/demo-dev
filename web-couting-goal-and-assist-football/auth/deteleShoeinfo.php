<?php
    include "../dbconnect.php";

    $info_id = $_POST['info_id'];

    $q = "delete from shoeinformation where info_id = $info_id";
    mysqli_query($conn, $q);
    echo "Product deleted!";
    header('location: details.php');
?>