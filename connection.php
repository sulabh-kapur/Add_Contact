<?php
session_start();
$server = 'localhost';
$user = 'root';
$password = '';
$database = 'project_1';
$connection = mysqli_connect($server,$user,$password,$database);
?>