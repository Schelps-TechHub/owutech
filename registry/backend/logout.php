<?php
include "dbconfig.php";
session_unset();
session_destroy();

header('Location: ../pages/user_login.php');
?>