<?php require('./admin_components/check_login.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php 
  require('./admin_components/_links.php')
  ?>
  <title>Document</title>
</head>
<body>
 <?php 
  require('./admin_components/_navbar.php');
  echo $navbar_open;
  ?>
  <div class="container my-4 d-flex flex-wrap justify-content-center">
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['message_subject'])) {
      require('./admin_components/_dbconnect.php');
      $message_subject = htmlspecialchars(mysqli_real_escape_string($conn,$_GET['message_subject']));
      $sql_query = 'SELECT * FROM user_messages WHERE message_subject = "'.$message_subject.'"';
      $result = mysqli_query($conn,$sql_query);
      while($row = mysqli_fetch_assoc($result)){
        echo '
        <div class="card w-50 m-3">
          <div class="card-header text-capitalize">
            '.str_replace("-"," ",$row['message_subject']).'
          </div>
          <div class="card-body">
            <h5 class="card-title">Name : <em> '.$row['first_name'].' '.$row['last_name'].' </em></h5>
            <h6 class="card-title">Email : <em> '.$row['email_address'].' </em></h6>
            <p class="card-text"> Message : '.$row['user_message'].' </p>
            <button type="button" class="btn btn-danger d-block w-100 mb-1" data-bs-toggle="modal" data-bs-target="#deleteModal-'.$row['message_id'].'">
              Delete
            </button>
          </div>
          <div class="card-footer text-muted">
            Posted on : <em>'.date_format(date_create($row['message_time']),'g:ia \o\n l jS F Y').'</em>
          </div>
        </div>
        <div class="modal fade" id="deleteModal-'.$row['message_id'].'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Confirm</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          <h5>Are you sure? you wan\'t to delete this message<br>
                          <b class="text-danger">'.$row['user_message'].'</b><h5>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <a href="delete_message.php?message_id='.$row['message_id'].'&message_subject='.$row['message_subject'].'" class="btn btn-danger">Delete</a>
                          </div>
                        </div>
                      </div>
                    </div>
        
        ';
        
      }
    }else{
      
       require('./admin_components/_dbconnect.php');
            $sql_query = 'SELECT * FROM user_messages';
            $result = mysqli_query($conn,$sql_query);
            while($row = mysqli_fetch_assoc($result)){
              echo '
              <div class="card w-70 m-3">
                <div class="card-header text-capitalize">
                '.str_replace("-"," ",$row['message_subject']).'
                </div>
                <div class="card-body">
                  <h5 class="card-title">Name : <em> '.$row['first_name'].' '.$row['last_name'].' </em></h5>
                  <h6 class="card-title">Email : <em> '.$row['email_address'].' </em></h6>
                  <p class="card-text"> Message : '.$row['user_message'].' </p>
                  <button type="button" class="btn btn-danger d-block w-100 mb-1" data-bs-toggle="modal" data-bs-target="#deleteModal-'.$row['message_id'].'">
                    Delete
                  </button>
                </div>
                <div class="card-footer text-muted">
                  Posted on : <em>'.date_format(date_create($row['message_time']),'g:ia \o\n l jS F Y').'</em>
                </div>
              </div>
              <div class="modal fade" id="deleteModal-'.$row['message_id'].'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Confirm</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <h5>Are you sure? you wan\'t to delete this message<br>
                                <b class="text-danger">'.$row['user_message'].'</b><h5>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <a href="delete_message.php?message_id='.$row['message_id'].'&message_subject='.$row['message_subject'].'" class="btn btn-danger">Delete</a>
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