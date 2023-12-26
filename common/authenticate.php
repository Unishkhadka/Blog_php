<?php
include "connection.php";
session_start();
$Uid = $_SESSION['Uid'];
if (!isset($Uid)) {
    header("Location: login/login.php");
}
?>