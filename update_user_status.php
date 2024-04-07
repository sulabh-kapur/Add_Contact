<?php
include('./connection.php');
$id = $_GET['id'];
$is_active = $_GET['is_active'];

if(isset($_GET['id']) && isset($_GET['is_active'])){
    $query = "UPDATE registartion_1 SET is_active =$is_active WHERE id = $id";
    $res = mysqli_query($connection,$query);
    if($res == true){
 $_SESSION['success'] = "Updated Sucessfully";
    }
    header('Location:http://localhost/Project1/list_register.php');
    exit;

}

?>