<?php
include ('./connection.php');
session_destroy();

header('Location:http://localhost/Project1/login.php');
exit;
?>