<?php
  //include the config and the database
  include "libs/config.php";
  include "libs/database.php";
  include "functions.php";

  $db = new Database();

  $query = "SELECT * FROM posts ORDER BY id DESC";
  $posts = $db->select($query);

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
    <title>PHP Blog</title>
    <!-- Bootstrap core CSS -->
    <link href="styles/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="styles/custom.css" rel="stylesheet">
  </head>

  <body>

    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item active" href="index.php">Home</a>
          <a class="blog-nav-item" href="#">All Posts</a>
          <a class="blog-nav-item" href="#">Services</a>
          <a class="blog-nav-item" href="#">About</a>
          <a class="blog-nav-item" href="#">Contact</a>
        </nav>
      </div>
    </div>

    <div class="container">

      <div class="blog-header">
        <h1 class="blog-title">PHP Tutorials Blog</h1>
        <p class="lead blog-description">All about PHP tutorials, news, and guides.</p>
      </div>

      <div class="row">

        <div class="col-sm-8 blog-main">

          <?php
            foreach($posts as $item)  :?>
          <div class="blog-post">
            <h2 class="blog-post-title"><?php echo $item['title']; ?></h2>
            <p class="blog-post-meta"> on <?php echo formatDate($item['date']); ?> by <a href="#"><?php echo $item['author']; ?></a></p>
            <img src="images/<?php echo $item['image'];?>" style="height:200px; width: 200px; float: left; margin-right: 20px; margin-bottom: 10px;" />
            <p style="text-align: justify;"><?php echo substr($item['content'],0,300); ?></p>
            <a id="readmore" href="single_post.php?id=<?php echo $item['id'];?>">Read More</a>
          </div><!-- /.blog-post -->
        <?php endforeach; ?>

        </div><!-- /.blog-main -->
