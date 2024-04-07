<?php
include('./connection.php');
$id  = $_GET['id'];

$query  = "SELECT * FROM contact WHERE id = $id ";
$result = mysqli_query($connection,$query);
 while( $row =mysqli_fetch_assoc($result)){
	$output =  $row;
 }
 
if(isset($_SESSION['error']) AND !empty($_SESSION['error'])){
    $error = $_SESSION['error'];
    unset($_SESSION['error']);
    
  }
  if(isset($_SESSION['success']) AND !empty($_SESSION['success'])){
    $success = $_SESSION['success'];
    unset($_SESSION['success']);
    
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>Update Form</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
	color: #fff;
	background: #63738a;
	font-family: 'Roboto', sans-serif;
}
.form-control {
	height: 40px;
	box-shadow: none;
	color: #969fa4;
}
.form-control:focus {
	border-color: #5cb85c;
}
.form-control, .btn {        
	border-radius: 3px;
}
.signup-form {
	width: 450px;
	margin: 0 auto;
	padding: 30px 0;
  	font-size: 15px;
}
.signup-form h2 {
	color: #636363;
	margin: 0 0 15px;
	position: relative;
	text-align: center;
}
.signup-form h2:before, .signup-form h2:after {
	content: "";
	height: 2px;
	width: 30%;
	background: #d4d4d4;
	position: absolute;
	top: 50%;
	z-index: 2;
}	
.signup-form h2:before {
	left: 0;
}
.signup-form h2:after {
	right: 0;
}
.signup-form .hint-text {
	color: #999;
	margin-bottom: 30px;
	text-align: center;
}
.signup-form form {
	color: #999;
	border-radius: 3px;
	margin-bottom: 15px;
	background: #f2f3f7;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	padding: 30px;
}
.signup-form .form-group {
	margin-bottom: 20px;
}
.signup-form input[type="checkbox"] {
	margin-top: 3px;
}
.signup-form .btn {        
	font-size: 16px;
	font-weight: bold;		
	min-width: 140px;
	outline: none !important;
}
.signup-form .row div:first-child {
	padding-right: 10px;
}
.signup-form .row div:last-child {
	padding-left: 10px;
}    	
.signup-form a {
	color: #fff;
	text-decoration: underline;
}
.signup-form a:hover {
	text-decoration: none;
}
.signup-form form a {
	color: #5cb85c;
	text-decoration: none;
}	
.signup-form form a:hover {
	text-decoration: underline;
}  
</style>
</head>
<body>
<?php include ('./nav_bar.php'); ?>
<?php  if(isset($error) && ($error)){ ?>

<?php  if(is_array($error)) { ?>


	 <?php foreach($error as $val) { ?>
		
		<div class="alert alert-danger text-center"><p><?php echo $val; ?></p></div>

	<?php } ?>

<?php }  else { ?>
	
	<div class="alert alert-danger text-center"><p><?php echo $error; ?></p></div>

<?php } ?>

<?php } ?>


<?php  if(isset($success) && ($success)){ ?>


<div class="alert alert-success text-center"><?php echo $success; ?></div>

<?php } ?>
<div class="signup-form">
    <form action="./server_edit.php" method="post">
		<h2>Update</h2>
        <div class="form-group">
			<div class="row">
			<input type="hidden" class="form-control" name="id" value="<?php echo $output['id'];?>" id="id" >
				<div class="col"><input type="text" class="form-control" name="first_name" placeholder="First Name" value="<?php echo $output['first_name'];?>" ></div>
				<div class="col"><input type="text" class="form-control" name="last_name" placeholder="Last Name" value="<?php echo $output['last_name'];?>"></div>
			</div>        	
        </div>
        <div class="form-group">
        	<input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $output['email'];?>">
        </div>
		<div class="form-group">
            <input type="text" class="form-control" name="contact" placeholder="Contact" value="<?php echo $output['contact'];?>" >
        </div>  
        <div class="form-group">
            <input type="text" class="form-control" name="address" placeholder="Address" value="<?php echo $output['address'];?>" >
        </div>       
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block">Update</button>
        </div>
    </form>
</div>
</body>
</html>