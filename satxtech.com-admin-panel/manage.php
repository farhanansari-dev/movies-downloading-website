<?php require('./admin_components/check_login.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require('./admin_components/_links.php');?>
  <title>Manage Movies</title>
</head>
<body >
<?php 
require('./admin_components/_navbar.php');
echo $navbar_open;
?>
<div class="container">
  <div class="my-2">
  <h4>Manage Movie</h4><hr>
  </div>
</div>
<div class="container my-3 d-flex justify-content-center flex-wrap">
      <div class="container-fluid my-3">
        <form class="d-flex" action="manage.php" method="get">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search-movie">
          <button class="btn btn-primary" type="submit">Search</button>
         </form>
      </div>
<?php 
require('./admin_components/_dbconnect.php');

if ($_SERVER['REQUEST_METHOD'] == "GET") {
  $search_movie = htmlspecialchars(mysqli_real_escape_string($conn,$_GET['search-movie']));
  $search_sql = "SELECT * FROM movies_details WHERE movie_title LIKE '%".$search_movie."%'";
  $search_result = mysqli_query($conn, $search_sql);
  while($row = mysqli_fetch_assoc($search_result)){
    echo '<div class="card m-2 " style="max-width: 540px;">
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="'.$row['movie_poster_link'].'" class="img-fluid rounded-start h-100" alt="'.$row['movie_title'].'">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">'.$row['movie_title'].'</h5>
                    <p class="card-text text-transform-capitalize mb-1">Category : '.$row['movie_category'].'</p>
                    <p class="card-text text-transform-capitalize mb-1">Movie Type : '.$row['movie_type'].'</p>
                    <p class="card-text"><small class="text-muted">Last updated '.date_format(date_create($row['movie_upload_time']),'g:ia \o\n l jS F Y').'</small></p>
                    <a href="update.php?movie_id='.$row['movie_id'].' " class="d-block btn btn-primary mb-1" >Update</a>
                    <button type="button" class="btn btn-danger d-block w-100 mb-1" data-bs-toggle="modal" data-bs-target="#deleteModal-'.$row['movie_id'].'">
                      Delete
                    </button>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="modal fade" id="deleteModal-'.$row['movie_id'].'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirm</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                  <h5>Are you sure? you wan\'t to delete this movie<br>
                  <b class="text-danger">'.$row['movie_title'].'</b><h5>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="delete.php?movie_id='.$row['movie_id'].'" class="btn btn-danger">Delete</a>
                  </div>
                </div>
              </div>
            </div>';
  }
}else {
  $sql_query = 'SELECT * FROM movies_details';
  $result = mysqli_query($conn,$sql_query);
  while($row = mysqli_fetch_assoc($result)){
    echo '
          <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="'.$row['movie_poster_link'].'" class="img-fluid rounded-start h-100" alt="'.$row['movie_title'].'">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">'.$row['movie_title'].'</h5>
                  <p class="card-text text-transform-capitalize mb-1">Category : '.$row['movie_category'].'</p>
                  <p class="card-text text-transform-capitalize mb-1">Movie Type : '.$row['movie_type'].'  ID-'.$row['movie_id'].'</p>
                  <p class="card-text"><small class="text-muted">Last updated '.$row['movie_upload_time'].'</small></p>
                  <a href="update.php?movie_id='.$row['movie_id'].' " class="d-block btn btn-primary mb-1" >Update</a>
                  <a href="delete.php?movie_id='.$row['movie_id'].'" class="d-block btn btn-danger mb-1" >Delete</a>
                </div>
              </div>
            </div>
          </div>';
  }
}
?>

</div>
<?php 
require('./admin_components/_navbar.php');
echo $navbar_close;
?>
</body>
</html>