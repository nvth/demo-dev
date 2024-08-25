<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Shoes Stast</title>
    <link rel="stylesheet" type="text/css" href="../statics/datepicker/datepicker.css">
    <link rel="stylesheet" type="text/css" href="../statics/updateshoe.css">
    <link rel="icon" type="image/x-icon" href="../img/favicon.ico">
</head>
<body>
<!-- PHP BLOCK -->
<?php
include ('../dbconnect.php');
include('authenticate.php');

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT nameshoes, shoe_id FROM myshoes WHERE owner_id=$user_id"; //get name of shoe, id of shoe from database
    $rs = mysqli_query($conn, $sql);

?>
<!-- HTML start form -->
<form action="update_shoe_details.php" method="post" enctype="multipart/form-data">
<label for="">Select Shoes for update stats</label></br>
<select name="shoe_id" >
    <?php   
        while ($row = mysqli_fetch_array($rs)) {
            $shoe_id = $row['shoe_id'];
            $nameshoes = $row['nameshoes'];
        ?>
            <option value="<?php echo htmlspecialchars($row['shoe_id'],ENT_QUOTES, 'UTF-8'); ?>"> 
                <?php echo htmlspecialchars($nameshoes,ENT_QUOTES, 'UTF-8'); ?> 
            </option>
    <?php } ?>
</select>
<?php } ?>
        <!-- Get id of database to query update -->

        <p>Stadium</p>
        <input type="text" name="stadium_name">
        <p>Scored</p>
        <input type="text" name="scored">
        <p>Assisted</p>
        <input type="text" name="assisted">
        <p>Match day</p>
        <div class="datepicker">
            <input type="text" id="datepickerInput" name="matchday" placeholder="Select a date">
            <div class="calendar" id="calendar"></div>
        </div>
        <script src="../statics/datepicker/datepicker.js"></script>
        <br>
        <button type="submit" name="add-btn">Update Product</button>
    </form>
<!-- HTML END FORM-->

<!-- php code block -->
<?php 
    if (isset($_POST['add-btn'])) {
        # code...
        $updateShoeid= $_POST['shoe_id']; //  biến $schoe_id được lấy tại thẻ <select name="shoe_id"> dòng 21
        $updateScore = $_POST['scored'];
        $updateAssisted = $_POST['assisted'];
        $updateStadium = $_POST['stadium_name'];
        $updateMatchday = $_POST['matchday'];

        // $q = "INSERT INTO shoeinformation (shoe_id, scored, assisted, stadium_name, matchday) VALUES ('$updateShoeid', '$updateScore', '$updateAssisted', '$updateStadium', '$updateMatchday')";
        // mysqli_query($conn, $q);
        $sql = "INSERT INTO shoeinformation (shoe_id, scored, assisted, stadium_name, matchday) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iiiss", $updateShoeid, $updateScore, $updateAssisted, $updateStadium, $updateMatchday);
        $stmt->execute();
        header('location: details.php');
    }
?>
<!-- html code blocks -->


<?php
$conn->close();
?> 
<!---HTML BLOCK -->
</body>
</html>

