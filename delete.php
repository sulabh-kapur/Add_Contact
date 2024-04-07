<?php
include('./connection.php');
$id = $_GET["id"];

$query = "DELETE FROM contact WHERE id = '$id'";
$result = mysqli_query($connection,$query);

     
     if(isset($_GET['id']))
     {
        $_SESSION['success'] = 'Your Record has been deleted';
     }
     else{
        $_SESSION['error'] = 'Not deleted';
     }

    header('Location: http://localhost/Project1/listing.php');
     exit;
?>