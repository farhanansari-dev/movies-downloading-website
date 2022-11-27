
<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    require('./admin_components/_dbconnect.php');
    $username = htmlspecialchars(mysqli_real_escape_string($conn,$_POST["admin-id"]));
    $password = htmlspecialchars(mysqli_real_escape_string($conn,$_POST["admin-pass"]));
    $sql = "SElECT * FROM admin_accounts WHERE admin_id='$username' ";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        while($row=mysqli_fetch_assoc($result)){
            if (password_verify($password, $row['admin_pass'])){
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                header("location: index.php");
            } 
            else{
                $showError = "Invalid Credentials";
            }
        }
        
    } 
    else{
        $showError = "Invalid Credentials";
    }
}
?>
<!doctype html>
<html lang="en">
  <head>

    <?php require('./admin_components/_links.php'); ?>
    <title>ADMIN LOGIN</title>
  </head>
  <body class="bg-primary">
      <div class="container alert-container my-4">
       <?php
          if($login){
          echo ' <div class="alert alert-success alert-dismissible fade show " role="alert">
              <strong>Success!</strong> You are logged in ' .$_SESSION['username'] .'
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
          }
          if($showError){
          echo ' <div class="alert alert-danger alert-dismissible fade show " role="alert">
              <strong>Error!</strong> '. $showError.'
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div> ';
          }
          ?>
      </div>  
    <div class="container admin-login-card-container ">
    <div class="card admin-login-card text-center">
      <h5 class="card-header"><i class="bi bi-person-circle"></i> ADMIN LOGIN</h5>
      
        <div class="card-body text-start">
          <form action="/login.php" method="post">
            
            <div class="mb-3">
              <label for="admin-id" class="form-label">ADMIN ID</label>
              <input type="text" class="form-control" id="admin-id" placeholder="ADMIN ID" name="admin-id">
            </div>
            
            <div class="mb-3">
              <label for="admin-pass" class="form-label">PASSWORD</label>
              <input type="password" class="form-control" id="admin-pass" placeholder="PASSWORD" name="admin-pass">
            </div>
            
            <div class="text-center">
              <button type="submit" class="btn btn-dark w-50">Login</button>
            </div>
        </form>
      </div>
    </div>
    </div>
  </body>
</html>