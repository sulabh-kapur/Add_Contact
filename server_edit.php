<?php
include('./connection.php');
$url = 'http://localhost/Project1/edit.php';

$required_fields = ['first_name' , 'last_name' , 'email' , 'contact' , 'address'];   
$error=[];

foreach($required_fields as $key => $value){

   if(isset($_POST[$value]) AND empty($_POST[$value])){
        $error[] = $value." is required";
   }

}
if (count($error) == 0){

    $url = $url.'?id='.$_POST['id'];
    $id = $_POST['id'];
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['contact'];
    $address = $_POST['address'];

 
    $sql = "UPDATE contact SET first_name ='$fname',last_name='$lname',email='$email', contact ='$phone', address = '$address' WHERE id = $id";
    $result = mysqli_query( $connection, $sql );

    if($result){
        
        $_SESSION['success'] = ' Updated successfully!';
    


    } else {
        $_SESSION['error'] = 'Something went Wrong';

    }



} else{
    $_SESSION['error'] = $error;


    $url = $url.'?id='.$_POST['id'];

}

header('Location: '.$url);
exit;