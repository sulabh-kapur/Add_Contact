<?php
include ('./connection.php');
$search = $_POST['search'];
$_SESSION['search_keyword'] = $search;



$query = "SELECT * FROM contact WHERE first_name LIKE '%".$search."%' OR last_name LIKE '%".$search."%' OR contact LIKE '%".$search."%'";
$res = mysqli_query($connection,$query);
$output = [];
while($row = mysqli_fetch_assoc($res)){
    $output[] = $row;
}
$_SESSION['search_result'] = $output;
header('Location:http://localhost/Project1/listing.php?page=1');
exit;
?>
