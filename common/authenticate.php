<?php
include "connection.php";
session_start();
$Uid = $_SESSION['Uid'];
if (!isset($Uid)) {
    header("Location: /Blog_php/login/login.php");
}
?>