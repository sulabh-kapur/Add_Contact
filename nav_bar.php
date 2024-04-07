<?php    

$author_id=$_SESSION['user_id'];


$image_query ="SELECT * FROM registartion_1 WHERE id = $author_id";
$res_1 = mysqli_query($connection,$image_query);
while($row_image = mysqli_fetch_assoc($res_1)){
  $out_1 = $row_image['image'];
  
}



$query = "SELECT COUNT(*) as total_record FROM contact WHERE auth_id = '$author_id'";
$result = mysqli_query($connection ,$query);

 
while($row= mysqli_fetch_assoc($result)){
    $output_1 = $row;  
    $count = $row['total_record'];
    
}

$query = "SELECT COUNT(id) as total_count FROM registartion_1";
$res = mysqli_query($connection,$query);
$out = '';
while($row_1=mysqli_fetch_assoc($res)){
$out = $row_1;
$count_1 = $row_1['total_count'];
}

?>  
  
  
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <img style="width:50px;height:60px;" src="./uploads/<?php echo $out_1; ?>"/>
    <li class="nav-item active">
        <a class="nav-link" href="http://localhost/Project1/add_Contact.php">Add Contact<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="http://localhost/Project1/registerform.php">Register <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">

        <a class="nav-link" href="http://localhost/Project1/listing.php">List (<?php echo $count;?>) </a>
</li>
<li class="nav-item active">
        <a class="nav-link" href="http://localhost/Project1/list_register.php">Users List(<?php echo $count_1;?>)</a>
</li>
<li class="nav-item active">
        <a class="nav-link" href="http://localhost/Project1/logout.php">Logout</a>
</li>
    </ul>
  </div>
</nav>