<?php require_once('./includes/functions.php'); ?>
<?php require_once('./includes/dbconnect.php'); ?>
<?php include('./includes/header.php'); ?>
<div class="py-2 font-xl bg-orange-400">Index</div>
<?php
$query = "SELECT * 
    FROM subjects";

$result = mysqli_query($connection, "SELECT * FROM subjects");

while($row= mysqli_fetch_array($result)){
    echo $row["menu_name"]. " " .$row["position"] . "<br />" ;
}

?>
<?php require('./includes/footer.php'); ?>