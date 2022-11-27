
<?php
$navbar_open = '
      <header class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark d-flex justify-content-between">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Admin Panel</a>
            <div class=" d-flex justify-content-between">
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 me-4" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
            </div>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Posts</div>
                            

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#manage-post" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-wrench"></i></div>
                                Manage
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="manage-post" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="upload_movie.php">Upload Post</a>
                                    <a class="nav-link" href="manage.php">Manage Post</a>
                                </nav>
                            </div>
                            
                            <div class="sb-sidenav-menu-heading">Websites</div>
                            
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-globe"></i></div>
                                My website
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="/pages">Satxtech.com</a>
                                </nav>
                            </div>
                            
  
                            <div class="sb-sidenav-menu-heading">Inbox</div>
                          
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#inbox" aria-expanded="false" aria-controls="collapseLayouts">
                                    <div class="sb-nav-link-icon"><i class="fas fa-inbox"></i></div>
                                    Messages
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="inbox" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="messages.php">All Messages</a>
                                    </nav>
                                </div>
                                
                                <div class="collapse" id="inbox" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="messages.php?message_subject=movie-request">Movie Requests</a>
                                    </nav>
                                </div>
                                
                                <div class="collapse" id="inbox" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="messages.php?message_subject=report-broken-links">Reported broken links</a>
                                    </nav>
                                </div>
                                
                                <div class="collapse" id="inbox" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="messages.php?message_subject=feedback">Feedbacks</a>
                                    </nav>
                                </div>
                                
                                <div class="collapse" id="inbox" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="messages.php?message_subject=other">Other messages</a>
                                    </nav>
                                </div>
                                 
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        '.$_SESSION['username'].'
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>';
              $navbar_close ='
                  <!--Page content-->
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="assets/js/bs-scripts.js"></script>
    </header>';
