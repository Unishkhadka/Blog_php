<?php
include "common/connection.php";
session_start();
session_destroy();
header("Location: login.php");
?>