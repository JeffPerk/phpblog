
<div class="col-sm-3 col-sm-offset-1 blog-sidebar">
  <div class="sidebar-module sidebar-module-inset">
    <h4>About</h4>
    <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
  </div>
  <div class="sidebar-module">
    <h4>Categories</h4>
    <ol class="list-unstyled">
      <?php foreach($cats as $item) : ?>
      <li><a href="category.php?id=<?php echo $item['id']; ?>"><?php echo $item['title']; ?></a></li>
    <?php endforeach; ?>
    </ol>
  </div>

</div><!-- /.blog-sidebar -->
