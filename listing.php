<?php

include('./function.php');
include ('./connection.php');
if(!isset($_SESSION['user_id'])){
	header('Location:http://localhost/Project1/login.php');
	exit;
}

$author_id = $_SESSION['user_id'];


$total_records = getTotalcontacts($author_id,$connection);

// echo $total_records;
$limit = 5;

$total_page = ceil($total_records/$limit);
$current_page = 1;
if(isset($_GET['page']) && !empty($_GET['page'])){
  $current_page= $_GET['page'];
}

$offset = ($current_page-1) * $limit;



$success = false;
$error = false;

if(isset($_SESSION['error']) AND !empty($_SESSION['error'])){
  $error = $_SESSION['error'];
  unset($_SESSION['error']);
  
}
if(isset($_SESSION['success']) AND !empty($_SESSION['success'])){
  $success = $_SESSION['success'];
  unset($_SESSION['success']);
  
}

$query = 'SELECT * FROM contact WHERE auth_id = '.$author_id.'  Limit '.$limit.' OFFSET '.$offset;
$result = mysqli_query($connection,$query);


if(isset($_SESSION['search_result']) AND !empty($_SESSION['search_result'])){

  $output = $_SESSION['search_result'];
  unset($_SESSION['search_result']);

} else {

  $output = [];
  while($row = mysqli_fetch_assoc($result)){


    $output[] = $row;

    
  }
  



}

$search_keyword = false;
if(isset($_SESSION['search_keyword']) AND !empty($_SESSION['search_keyword'])){
  $search_keyword = $_SESSION['search_keyword'];
  unset($_SESSION['search_keyword']);
}
?>


<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>Listing Page</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  

  <title>Listing Page</title>
</head>
<body>
<?php include ('./nav_bar.php'); ?>


<?php if($error != false) {?>

  
<div class='alert alert-danger'>

<?php foreach($error as $key => $value){?>
<p><?php echo $value; ?></p>

<?php } ?>
</div>

<?php } ?>

<?php if( $success != false ){?>

<div class='alert alert-success'>

<p><?php echo $success; ?></p>

</div>

<?php }?>

<div class="container">
  
  <?php if(count($output) > 0) { ?>


    <nav class="navbar navbar-light bg-light">
  <form class="form-inline" action="./search_server.php" method="post">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" name="search" aria-label="Search" value="<?php echo $search_keyword;?>">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
</nav>

   

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Address</th>
        <th>Image</th>
        <th>Action</th>

      </tr>
    </thead>
    <tbody>
    <?php foreach($output as $key => $value){ ?>

        <tr>

            <td><?php echo $value['first_name']; ?></td>
            <td><?php echo $value['last_name']; ?></td>
            <td><?php echo $value['email']; ?></td>
            <td><?php echo $value['contact']; ?></td>
            <td><?php echo $value['address']; ?></td>
            <td><img width="70" height="80" src= "./uploads/<?php echo $value['image']; ?>"/></td>

            <td><a href="./edit.php?id=<?php echo $value['id']; ?>" class="btn btn-primary">Edit</a>
            <a href="./delete.php?id=<?php echo $value['id']; ?>" class="deletebtn btn btn-danger">Delete</a></td>   
        </tr>
        <?php
       ?>
    
    <?php } ?>
   
    </tbody>
  </table>
  <ul class="pagination">
    <?php for($i=1; $i<=$total_page; $i++){?>
       <li><a type="button" class="btn btn-submit" href="http://localhost/Project1/listing.php?page=<?php echo $i;?>"> <?php echo $i;?></a></li>
      
       
     <?php }?>
</ul>

  <?php }  else {?>
    <h3>Sorry,No Data is available!</h3>
<?php } ?>
</div>

</body>
</html>