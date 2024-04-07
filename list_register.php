
<?php
include('./connection.php');
include('./function.php');


$total_rec = getTotaluser($connection);

$limit_user = 2;

$total_pages = ceil($total_rec/$limit_user);
$current_pages = 1;
if(isset($_GET['page']) && !empty($_GET['page'])){
  $current_pages= $_GET['page'];
}

$offset_1 = ($current_pages-1) * $limit_user;




$query_1 = 'SELECT * FROM registartion_1  Limit '.$limit_user.' OFFSET '.$offset_1;

$res = mysqli_query($connection,$query_1);

$output = [];


while($row_1 = mysqli_fetch_assoc($res)){


    $output[] = $row_1;

    
}

$success = false;

if(isset($_SESSION['success']) AND !empty($_SESSION['success'])){
  $success = $_SESSION['success'];
  unset($_SESSION['success']);
}


?>


<!DOCTYPE html>

<html lang="en">
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
  <title>User List</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>

 .btn-sm{ 
    color:#fff !important;
  }

</style>
</head>
<body>
<?php include ('./nav_bar.php'); ?>

<div class="container">
  <h2>User Listing</h2>   
  
  <?php if(count($output) > 0) { ?>

    <?php echo  $success;?>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Contacts</th>
        <th>Address</th>
        <th>Action</th>

        <!-- <th>Action</th> -->
      </tr>
    </thead>
    <tbody>
    <?php foreach($output as $key => $value){?>

        <tr>

            <td><?php echo $value['first_name']; ?></td>
            <td><?php echo $value['last_name']; ?></td>
            <td><?php echo $value['email']; ?></td>
            <td><?php echo $value['contact']; ?></td>
            <td><?php echo $value['address']; ?></td>
            <td>
            <?php
              if($value['is_active']==0){
                echo '<a class="btn btn-sm btn-success" href ="./update_user_status.php?id='. $value['id'].'&is_active=1">Active</a>';
              } else{
                echo '<a class="btn btn-sm btn-danger" href ="./update_user_status.php?id='. $value['id'].'&is_active=0">Inactive</a>';
              } 
              ?>
            </td> 
        </tr>
        <?php
       ?>
    
    <?php } ?>

    


   
    </tbody>
  </table>
  <ul class="pagination">
    <?php for($i=1; $i<=$total_pages; $i++){?>
       <li><a type="button" class="btn btn-submit" href="http://localhost/Project1/list_register.php?page=<?php echo $i;?>"> <?php echo $i;?></a></li>
     <?php }?>
</ul>
  <?php }  else {?>
    <h3>Sorry,No Data is available!</h3>
<?php } ?>
</div>

</body>
</html>