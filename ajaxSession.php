<?php
require_once("include/initialize.php"); 
$_SESSION['tp'] = $_POST['tp'];
$_SESSION['mtp'] = $_POST['mtp'];
$_SESSION['mp'] = $_POST['mp'];
$_SESSION['pi'] = $_POST['pi'];
$_SESSION['inp'] = $_POST['inp'];
echo 'success';

?>