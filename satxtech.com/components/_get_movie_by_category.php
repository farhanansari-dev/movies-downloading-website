<?php
  function get_movie_by_category($category){
    require('./components/_dbconnect.php');
    $sql_query = "SELECT * FROM `movies_details` WHERE `movie_category` = '$category' LIMIT 15";
    $result = mysqli_query($conn,$sql_query);
    if (mysqli_num_rows($result) > 0) {
    echo '
    <div class="sub-heading-wraper">
      <h3 class="sub-heading">'.$category.'</h3>
      <a href="/category.php?category='.$category.'" class="see-more href-links">see more &gt;</a>
    </div>
    <div class="horizontal-scroll-card-container">
  ';
    while($row = mysqli_fetch_assoc($result)){
      echo '
      <div class="movie-card">
        <img class="movie-poster" src=" '.$row['movie_poster_link'].' " alt="'.$row['movie_title'].'" />
        <div class="movie-details">
          <p class="movie-name mt-1 mb-0 text-truncate-2">'.$row['movie_title'].' </p>
          <div class="movie-download-btn-ratings-container ">
            <div class="movie-ratings ">
              <i class="bi bi-star-fill h5 text-warning"></i>
              <span class=" p-1 text-dark h5">'.$row['movie_rating'].'</span>
            </div>
            <a href="/movie_overview.php?movie-id='.$row['movie_id'].'" class="download-btn-link p-2 bg-danger">Download</a>
          </div>
        </div>
      </div>';
    }
    echo '</div>';
    }
  }
?>