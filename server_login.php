<?php
include('./connection.php');
$required_fields = ['email','password'];
$error = [];


foreach($required_fields as $key => $value){

    if(isset($_POST[$value]) AND empty($_POST[$value])){

     $error[] = "This field required <nsbp>".$value;

    }

 }

   if(count($error) ==0){

      $email = $_POST['email'];
      $password = $_POST['password'];
      $remember = $_POST['remember'];
      

      if(isset($_POST['remember']) && !empty($_POST['remember'])) {

        setcookie('email',$email,time()+(86400*30),'/');
        setcookie('password',$password,time()+(86400*30),'/');
        setcookie('remember',true,time()+(86400*30),'/');

     } else {
        
      setcookie("email",'',-1,'/');
      setcookie("password",'',-1,'/');
      setcookie("remember",'',-1,'/');

     

     }

      $query = "SELECT * FROM registartion_1 WHERE email = '$email' AND password = '$password'";
      $result = mysqli_query($connection,$query);
      $count =  mysqli_num_rows($result);

      if($count > 0){
         while($row = mysqli_fetch_assoc($result)){ 

               if($row['is_active'] == 1){

                  $_SESSION['user_id'] = $row['id'];
                  $_SESSION['success'] = 'Form has been Login Sucessfully !';
                  header('Location:http://localhost/Project1/add_Contact.php');
              
                 
               } else {
                  $_SESSION['error'] = 'Since you are inactivated.Please contact administrator of this website.';
               }
         }
      }else{
         $_SESSION['error'] = "Invalid !";
         header('Location:http://localhost/Project1/login.php');
         exit;
      }

      

   } else{
      $_SESSION['error'] = $error;
   }

 header('Location:http://localhost/Project1/login.php');
 exit;
?>