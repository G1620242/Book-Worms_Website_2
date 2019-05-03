<?php

session_start();
include ("config.php");

if(!isset($_GET['pid'])){
  header("Location: revisionnotes.php");
} else{
  $pid = $_GET['pid'];
  $sql = "DELETE FROM posts Where id=$pid";
  mysqli_query($conn,$sql);
  header("Location: revisionnotes.php");
}
 ?>
