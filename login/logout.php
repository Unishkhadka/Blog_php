<?php
include "common/connection.php";
session_start();
session_destroy();
header("Location: /Blog_php/login/login.php");
?>