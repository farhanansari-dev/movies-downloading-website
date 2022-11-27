<!doctype html>
<html lang="en">
  <head>
    <?php require('./components/_links.php'); ?>
    <title>Satxtech.com | Free HD Movies & web series </title>
  </head>
  <body>
    <header>
    <?php require('./components/_navbar.php'); ?>
    <?php require('./components/_search_bar.php'); ?>
    </header>
    <main>
     <div class="container" id="test">
      <?php require('./components/_categories.php'); ?>
      <?php require('./components/_get_movie_by_category.php'); 
      require('./components/_categories_array.php');
      foreach ($categories_array as $category) {
      get_movie_by_category($category);
      }
      
      foreach ($movie_type_array as $type) {
      get_movie_by_type($type);
      }
      ?>
      </div>
      </main>
  </body>
</html>
