<?php
date_default_timezone_set("Asia/Calcutta");
include ("../connection.php");
$id = mysqli_real_escape_string($con,$_GET['id']);
$query = "UPDATE `tbl_buyproduct` SET `status`='Delivered' WHERE b_id=$id";
$result = mysqli_query($con, $query) or die("Selection error: " . mysqli_error($con));
header('Location:status.php');
?>