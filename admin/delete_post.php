<?php
  //include the config and the database
  include "../libs/config.php";
  include "../libs/database.php";
  include "../functions.php";
  //Creating new database object
  $db = new Database();
  //Deleting posts
  if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM posts WHERE id='$id'";
    $run = $db->delete($query);
    if($run) {
      header('location: index.php?msg=Post deleted');
    }
  }
 ?>
