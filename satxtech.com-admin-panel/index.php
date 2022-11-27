<?php
require('./admin_components/check_login.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require('./admin_components/_links.php');?>



<script src="/chart.js"></script>
  <title>Admin Dashboard</title>
</head>
<body>
<?php 
require('./admin_components/_navbar.php');
echo $navbar_open;
?>

                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            
                            <?php 
                            require('./admin_components/_dbconnect.php');
                            $movie_sql = 'Select * from movies_details';
                            $movie_result = mysqli_query($conn,$movie_sql);
                            $total_movies = mysqli_num_rows($movie_result);
                            ?>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body"><h4><?php echo $total_movies?></h4>Total Posts</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="manage.php">Manage posts</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            
                            <?php
                            $message_sql = 'Select * from user_messages';
                            $message_result = mysqli_query($conn,$message_sql);
                            $total_messages = mysqli_num_rows($message_result);
                            ?>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                  <div class="card-body"><h4><?php echo $total_messages?></h4>Messages</div>
                                  <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="messages.php">View Messages</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            
                            <?php
                            $movie_request_sql = 'Select * from user_messages Where message_subject = "movie-request"';
                            $movie_request_result = mysqli_query($conn,$movie_request_sql);
                            $total_movie_request = mysqli_num_rows($movie_request_result);
                            ?>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                  <div class="card-body"><h4><?php echo $total_movie_request?></h4>Movie Requests</div>
                                  <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="messages.php?movie-type=movie-request">View Movie Requests</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            
                            <?php
                            $report_sql = 'Select * from user_messages Where message_subject = "report-broken-links"';
                            $report_result = mysqli_query($conn,$report_sql);
                            $total_report = mysqli_num_rows($report_result);
                            ?>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                  <div class="card-body"><h4><?php echo $total_report?></h4>Reported Broken Links</div>
                                  <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="messages.php?movie-type=report-broken-links">View Reports</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            
                            <?php
                            $feedback_sql = 'Select * from user_messages Where message_subject = "feedback"';
                            $feedback_result = mysqli_query($conn,$feedback_sql);
                            $total_feedback = mysqli_num_rows($feedback_result);
                            ?>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-info text-white mb-4">
                                  <div class="card-body"><h4><?php echo $total_feedback?></h4>Feedback</div>
                                  <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="messages.php?movie-type=feedback">View Feedback</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            
                            <?php
                            $other_sql = 'Select * from user_messages Where message_subject = "other"';
                            $other_result = mysqli_query($conn,$other_sql);
                            $total_other = mysqli_num_rows($other_result);
                            ?>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-secondary text-white mb-4">
                                  <div class="card-body"><h4><?php echo $total_other?></h4>Other Messages</div>
                                  <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="messages.php?movie-type=other">View Messages</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                        <div class="row">
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
                                   
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-pie me-1"></i>
                                        Message Summary
                                    </div>
                                    <div class="card-body"><canvas id="myPieChart" width="100%" height="40"></canvas></div>
                                    
                                   <script>
                                   var ctx = document.getElementById("myPieChart");
                                   var myPieChart = new Chart(ctx, {
                                     type: 'doughnut',
                                     data: {
                                       labels: ["All Messages","Movie Requests", "Reported Links","Feedbacks","Other Messages"],
                                       datasets: [{
                                       data: [<?php echo $total_messages?>,<?php echo $total_movie_request?>,<?php echo $total_report?>,<?php echo $total_feedback?>,<?php echo $total_other?>],
                                       backgroundColor: ['#28a745', '#ffc107', '#dc3545','#0dcaf0','#6c757d'],
                                       }],
                                     },
                                   });
                                    
                                   </script> 
                                   
                                </div>
                            
                        </div>
                    </div>
                </main>

<?php 
  require('./admin_components/_navbar.php');
  echo $navbar_close;
  ?>
</body>
</html>