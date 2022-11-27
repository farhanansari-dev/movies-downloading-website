<?php require('./admin_components/check_login.php') ?>
<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
  require('./admin_components/_dbconnect.php');
  $movie_title = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['movie-title']));
  $movie_category = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['movie-category']));
  $movie_type = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['movie-type']));
  $movie_poster_link = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['movie-poster-link']));
  $movie_download_link = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['movie-download-link']));
  $movie_overview = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['movie-overview']));
  $movie_cast = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['movie-cast']));
  $movie_ratings = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['movie-ratings']));
  $movie_watched = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['movie-watched']));
  $movie_fans = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['movie-fans']));
  
  $sql_query = "INSERT INTO `movies_details` (`movie_id`, `movie_title`, `movie_category`, `movie_type`, `movie_poster_link`, `movie_download_link`, `movie_overview`, `movie_cast`, `movie_rating`, `movie_watched`, `movie_fans`, `movie_upload_time`) VALUES (NULL, '$movie_title', '$movie_category', '$movie_type', '$movie_poster_link', '$movie_download_link', '$movie_overview', '$movie_cast', '$movie_ratings', '$movie_watched', '$movie_fans', CURRENT_TIMESTAMP);";
  $result = mysqli_query($conn,$sql_query);
  if ($result) {
    $showAlert = true;
  } else {
    $showError = true;
  }
  mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php require('./admin_components/_links.php');?>
  <title>Document</title>
</head>
<body>
<?php 
require('./admin_components/_navbar.php');
echo $navbar_open;
?>
<div class="container my-3">
  <?php
    if($showAlert){
      echo '<div class="alert alert-success alert-dismissible fade show " role="alert">
              <strong>Success!</strong> Movie is uploaded successfully
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
    if($showError){
      echo '<div class="alert alert-danger alert-dismissible fade show " role="alert">
              <strong>Error!</strong> something went wrong, please try after some time.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div> ';
    }
  ?>
  <div class="card text-center my-4">
        <h5 class="card-header"><i class="bi bi-person-circle"></i> Upload Movie</h5>
          <div class="card-body text-start">
            <form action="/upload_movie.php" method="post">
              <div class="mb-3 ">
                <label for="movie-title" class="form-label">Movie Title</label>
                <input type="text" class="form-control" id="movie-title" placeholder="" name="movie-title" required>
              </div>
              <div class="mb-3">
                <label for="movie-category">Select Category</label>
                <select class="form-select" aria-label="Select Category" id="movie-category" name="movie-category" required>
                  <?php
                     require('./admin_components/_categories_array.php');
                     foreach ($categories_array as $category) {
                       echo '<option value="'.$category.'">'.$category.'</option>
                     ';
                     }
                    ?>
                </select>
              </div>
              <div class="mb-3">
                <label for="movie-category">Select Type</label>
                <select class="form-select" aria-label="Select Category" id="movie-category" name="movie-type" required>
                <?php
                  require('./admin_components/_movie_type_array.php');
                  foreach ($movie_type_array as $type) {
                    echo '<option value="'.$type.'">'.$type.'</option>';
                  }
                ?>
                </select>
              </div>
              <div class="mb-3">
                <label for="movie-poster-link" class="form-label">Movie Poster Link</label>
                <input type="Text" class="form-control" id="movie-poster-link" placeholder="" name="movie-poster-link" required>
              </div>
              
              <div class="mb-3">
                <label for="movie-download-link" class="form-label">Movie Download Link</label>
                <input type="Text" class="form-control" id="movie-download-link" placeholder="" name="movie-download-link" required>
              </div>
              
              <div class="mb-3">
                <label for="movie-overview" class="form-label">Movie Overview</label>
                <textarea class="form-control" id="movie-overview" rows="3" name="movie-overview" ></textarea>
              </div>
              
              <div class="mb-3">
                <label for="movie-cast" class="form-label">Movie Cast</label>
                <textarea class="form-control" id="movie-cast" rows="2" name="movie-cast" placeholder="seprated by comma ' , '"></textarea>
              </div>
              
            <div class="row">
  
              <div class="mb-3 col-md-4">
                <label for="movie-ratings" class="form-label">Movie Ratings</label>
                <input type="text" class="form-control" id="movie-ratings" placeholder="" name="movie-ratings" required>
              </div>

              <div class="mb-3 col-md-4">
                <label for="movie-watched" class="form-label">Movie Watched</label>
                <input type="number" class="form-control" id="movie-watched" placeholder="" name="movie-watched" required>
              </div>

              <div class="mb-3 col-md-4">
                <label for="movie-fans" class="form-label">Movie Fans</label>
                <input type="number" class="form-control" id="movie-fans" placeholder="" name="movie-fans" required>
              </div>
            </div>
            

            <div class="text-center">
              <button type="submit" class="btn btn-dark w-50">Upload</button>
            </div>  
          </form>
          
          
        </div>
      </div>
      
</div>
  <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
      <?php 
      require('./admin_components/_navbar.php');
      echo $navbar_close;
      ?>
  </body>
  </html>
