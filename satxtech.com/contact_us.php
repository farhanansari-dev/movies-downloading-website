<?php
$showAlert = false;
$showError = false;

  require('./components/_dbconnect.php');
if ($_SERVER['REQUEST_METHOD'] =='POST') {
  $fname = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['fname']));
  $lname = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['lname']));
  $email = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['email']));
  $message = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['message']));
  $message_subject = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['message_subject']));
  $message_query = "INSERT INTO `user_messages` ( `first_name`, `last_name`, `email_address`, `user_message`, `message_subject`, `message_time`) VALUES ( '".$fname."', '".$lname."', '".$email."', '".$message."', '$message_subject', CURRENT_TIMESTAMP);";
  $result = mysqli_query($conn,$message_query);
  if ($result) {
    $showAlert = true;
}else {
  $showError = true;
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php require('./components/_links.php') ?>
  <title>Satxtech.com | Contact us</title>
</head>
<body>
  <header>
  <?php require('./components/_navbar.php') ?>
  </header>
  <main>
    <div class="container">
       <?php
          if($showAlert){
          echo ' <div class="alert alert-success alert-dismissible fade show " role="alert">
              <strong>Success!</strong> Your response is saved, we will get back to you as soon as possible.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
          }
          if($showError){
          echo ' <div class="alert alert-danger alert-dismissible fade show " role="alert">
              <strong>Error!</strong> something went wrong, please try after some time.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div> ';
          }
        ?>
      
      <h1 class="text-white">Contact Us</h1><hr class="bg-white"/>
      <p class="text-white lh-lg">
        You can request Movie, Report Broken Links And you can share your Feedback or other message using this form.
      </p>
      <div class="contact-us-form-container">
        <form action="contact_us.php" class="row g-3 text-white " method="post">
            <div class="col-md-6">
              <label for="inputEmail4" class="form-label">First Name</label>
              <input type="text" class="form-control bg-transparent border-2 rounded-pill text-white" id="inputEmail4" name="fname" required>
            </div>
            <div class="col-md-6">
              <label for="inputPassword4" class="form-label">Last Name (optional)</label>
              <input type="text" class="form-control bg-transparent border-2 rounded-pill text-white" id="inputPassword4" name="lname">
            </div>
            <div class="col-12">
              <label for="inputAddress" class="form-label"> Email Address</label>
              <input type="email" class="form-control bg-transparent border-2 rounded-pill text-white" id="inputAddress" placeholder="" name="email" required>
            </div>
            <div class="col-12">
              <label for="inputAddress2" class="form-label">Message</label>
              <input type="text" class="form-control bg-transparent border-2 rounded-pill text-white" id="inputAddress2" placeholder="" name="message" required>
            </div>
            <div class="col-12">
              <label for="inputState" class="form-label">Select Subject</label>
              <select id="inputState" class="form-select bg-transparent border-2 rounded-pill text-white" name="message_subject" required>
                <option value="movie-request" selected>Request Movie</option>
                <option value="report-broken-links">Report Broken links</option>
                <option value="feedback">Feedback</option>
                <option value="other">Other</option>
              </select>
            </div>
            <div class="col-12 text-center">
              <button type="submit" class="btn btn-transparent w-50 border-2 border-white rounded-pill text-white">Submit</button>
            </div>
        </form>
      </div>
      
    </div>
    </main>
    <script>
      if ( window.history.replaceState ) {
          window.history.replaceState( null, null, window.location.href );
        }
    </script>
</body>
</html>

