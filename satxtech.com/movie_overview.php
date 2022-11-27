<?php require('./components/_dbconnect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php require('./components/_links.php'); ?>
  <title>Satxtech.com | Movie Overview</title>
</head>
<body>
  <header>
    <?php require('./components/_navbar.php'); ?>
  </header>
  <main>
    <div class="container">
      <?php 
      if ($_SERVER['REQUEST_METHOD']== 'GET') {
        $movie_id = htmlspecialchars(mysqli_real_escape_string($conn,$_GET['movie-id']));
        $sql_query = "SELECT * FROM movies_details WHERE movie_id = $movie_id ";
        $result = mysqli_query($conn,$sql_query);
        if (!$result) {
              require('404.php');
        }
        elseif (mysqli_num_rows($result) > 0 ) {
          while($row = mysqli_fetch_assoc($result)){
            
            $cast_list = explode(',',$row['movie_cast']);
              foreach ($cast_list as $cast){
             $cast_li = $cast_li."<li class='text-capitalize'>$cast</li>"; 
            
            }
            
            echo '
            <div class="movie-overview-container">
                     <div class="sub-heading-wraper">
                        <h3 class="sub-heading">'.$row['movie_title'].'</h3>
                      </div><hr class="bg-white"/>
                      
                        <img class="overview-movie-poster" src="'.$row['movie_poster_link'].'" alt="'.$row['movie_title'].'" />
                        
                        <div class="overview-description">
                            <h5 class="overview-heading">Overview</h5>
                            <p class="overview-text">'.$row['movie_overview'].'</p>
                          </div>
                          
                          <div class="overview-cast">
                            <h5 class="cast-heading">Casts</h5>
                            <ul class="cast-list">
                            
                                '.$cast_li.'
                                <a href="https://www.google.com/search?q='.$row['movie_title'].' Cast" class="see-more href-links mx-2" target="_blank">see more &gt;</a>
                            </ul>
                          </div>
                          <div class="overview-review">
                            <p class="review-ratings">Ratings : '.$row['movie_rating'].'/10</p>
                            <p class="review-watched">Watched : '.$row['movie_watched'].'%</p>
                            <p class="review-Fans">Fans : '.$row['movie_fans'].'%</p>
                          </div>
                          <div class="  ">
                          <a class="text-white d-block text-decoration-none download-btn btn btn-transparent border border-white rounded-pill" href="'.$row['movie_download_link'].'">Download</a>
                          </div>
                      </div>
                  </div>';
          }
      }
      else {
             require('404.php');
           }
      }
    ?>
    </div>
  </main>
</body>
</html>