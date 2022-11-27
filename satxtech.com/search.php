<?php require('./components/_dbconnect.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php require('./components/_links.php')?>
  <title>Satxtech.com | Download Movies & web series </title>
</head>
<body>
  <header>
    <?php require('./components/_navbar.php')?>
  </header>
  <main>
    <div class="container">
    <?php require('./components/_search_bar.php');?>
    <?php
  if ($_SERVER['REQUEST_METHOD']=="GET") {
    $query = htmlspecialchars(mysqli_real_escape_string($conn,$_GET['query']));
    $sql_query = "SELECT * FROM `movies_details` WHERE movie_title LIKE '%".$query."%'";
    $result = mysqli_query($conn,$sql_query);
    
    if (mysqli_num_rows($result) < 1 ) {
    echo '
    <div class="container">
              <div class="sub-heading-wraper">
                <h3 class="sub-heading">No Result Found</h3>
              </div><hr class="z-index-1 bg-light"/>
              <div class="d-flex flex-wrap justify-content-center mt-3">
    ';
    }else {
    echo '<div class="container">
          <div class="sub-heading-wraper">
            <h3 class="sub-heading">Search Resuts For "'.$query.'"</h3>
          </div><hr class="z-index-1 bg-light"/>
          <div class="d-flex flex-wrap justify-content-center mt-3">';
    }
    while($row = mysqli_fetch_assoc($result)){
      echo '
      <div class="movie-card my-2 w-100">
              <img class="movie-poster" src=" '.$row['movie_poster_link'].' " alt="Movie Name" />
              <div class="movie-details">
                <p class="movie-name mt-1 mb-0 text-truncate-2">'.$row['movie_title'].'</p>
                
                <div class="movie-download-btn-ratings-container">
                  <div class="movie-ratings">
                    <i class="bi bi-star-fill text-warning h5"></i>
                    <span class="h5 text-dark">'.$row['movie_rating'].'</span>
                  </div>
                  <a href="/movie_overview.php?movie-id='.$row['movie_id'].'" class="download-btn-link p-2 bg-danger">Download</a>
                </div>
              </div>
            </div>
      ';
    }
  }
  ?>
  </div>
  </main>
</body>
</html>