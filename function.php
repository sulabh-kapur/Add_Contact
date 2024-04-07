<?php

function getTotalcontacts($contact_id,$connection){
  $query = "SELECT COUNT(*) as total_record FROM contact WHERE auth_id = ".$contact_id;
  $res = mysqli_query($connection , $query);

  $output = false;

  while($row = mysqli_fetch_assoc($res)){
    $output = $row['total_record'];
  }
  return $output;

}

function getTotaluser($connection){
  $query1 = "SELECT COUNT(id) as total_count FROM registartion_1";
  $res1 = mysqli_query($connection,$query1);
  $out = false;
  while($row1 = mysqli_fetch_assoc($res1)){
    $out = $row1['total_count'];

  }
  return $out;
}

function getUserdetails($connection){

  $id = $_SESSION['user_id'];
  print_r($id);
}


?>