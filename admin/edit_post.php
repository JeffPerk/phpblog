<?php
  //include the config and the database
  include "../libs/config.php";
  include "../libs/database.php";
  include "../functions.php";
  //Creating new database object
  $db = new Database();

  //Getting the id
  $id = $_GET['id'];
  $query = "SELECT * FROM posts WHERE id='$id'";
  $posts = $db->select($query);


  //Query to receive categories from database
  $query2 = "SELECT * FROM categories";
  $cats = $db->select($query2);

  //Updating posts
  if(isset($_POST['update'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category = $_POST['cat'];
    $author = $_POST['author'];
    $tags = $_POST['tags'];

  //creating variables for image posts
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    if(!$title || !$content || !$category || !$author || !$tags) {
      echo "Please fill all fields";
    } else {
      move_uploaded_file($image_tmp, "../images/$image");
      $query = "UPDATE posts SET category_id='$category', title='$title', content='$content', author='$author', image='$image', date=NOW(), tags='$tags' WHERE id='$id'";
      $run = $db->update($query);
      $newimage = $posts[0]['image'];
      unlink("../images/".$newimage);
      if($run) {
        header('location: index.php?msg=Post updated');
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
          <form action="edit_post.php?id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label>Post Title</label>
              <input type="text" name="title" class="form-control" placeholder="Enter a title" value="<?php echo $posts[0]['title'];?>">
            </div>
            <div class="form-group">
              <label>Post Content</label>
              <textarea class="form-control" rows="3" name="content" placeholder="Enter content"><?php echo $posts[0]['content'];?></textarea>
            </div>
            <select name="cat" class="form-control">
              <option>Select a Category</option>
              <?php foreach($cats as $cat) : ?>
              <option value="<?php echo $cat['id'];?>"><?php echo $cat['title']; ?></option>
            <?php endforeach; ?>
            </select>
            <?php foreach($posts as $item) : ?>
            <div class="form-group">
              <label>Author Name:</label>
              <input type="text" name="author" class="form-control" placeholder="Enter author" value="<?php echo $item['author'];?>">
            </div>
            <div class="form-group">
              <label>Post Image:</label>
              <input type="file" name="image">
              <img src="../images/<?php echo $item['image'];?>" style="height: 100px; width: 100px;"/>
            </div>
            <div class="form-group">
              <label>Tags:</label>
              <input type="text" name="tags" class="form-control" placeholder="Enter tags" value="<?php echo $item['tags'];?>">
            </div>
          <?php endforeach; ?>
            <button type="submit" name="update" class="btn btn-default">Update</button>
            <a href="index.php" class="btn btn-success">Cancel</a>
            <a href="delete_post.php?id=<?php echo $id;?>" class="btn btn-danger">Delete</a>
          </form>
        </div><!-- /.blog-main -->
        <?php
          include "includes/footer.php";
         ?>
