<?php
  //include the config and the database
  include "../libs/config.php";
  include "../libs/database.php";
  include "../functions.php";
  //Creating new database object
  $db = new Database();


  //Inserting posts
  if(isset($_POST['submit'])) {
    $title = $_POST['title'];


    if(!$title) {
      echo "Please enter a category";
    } else {

      $query = "INSERT INTO categories (title) VALUES ('$title')";
      $run = $db->insert($query);
      if($run) {
        header("location: index.php");
      }
    }
  }


 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>Admin Panel</title>
    <!-- Bootstrap core CSS -->
    <link href="../styles/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../styles/custom.css" rel="stylesheet">
  </head>

  <body>

    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item active" href="index.php">Dashboard</a>
          <a class="blog-nav-item" href="add_post.php">Add New Post</a>
          <a class="blog-nav-item" href="add_category.php">Add New Category</a>
          <a class="blog-nav-item pull-right" href="../index.php">View Blog</a>
          <a class="blog-nav-item pull-right" href="logout.php">Logout</a>
        </nav>
      </div>
    </div>

    <div class="container">

      <div class="row">

        <div class="col-sm-12 blog-main">
          <br/>
          <form action="add_category.php" method="post">
            <div class="form-group">
              <label>Category Title</label>
              <input type="text" name="title" class="form-control" placeholder="Enter a title">
            </div>
            <button type="submit" name="submit" class="btn btn-success">Submit</button>
            <a href="index.php" class="btn btn-danger">Cancel</a>
          </form>
        </div><!-- /.blog-main -->
        <?php
          include "includes/footer.php";
         ?>
