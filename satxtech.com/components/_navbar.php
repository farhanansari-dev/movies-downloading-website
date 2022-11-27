<nav>
  <div class="navbar">
      <div class="menu-btn" id="menu-btn" onclick="toggleMenu()"><i class="bi bi-list"></i></div>
      <div class="nav-menu" id="nav-menu">
        <div class="menu-header">MENU</div>
        <hr/>
        <ul class="menu-links">
          <li class="nav-item "><a class="nav-link text-capitalize" href="/">home</a></li>
          <li class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Categories
              </a>
              <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                <?php 
                require('./components/_categories_array.php');
                foreach($categories_array as $category){
                  echo '<li class="nav-item"><a class="nav-link text-capitalize" href="/category.php?category='.$category.'">'.$category.'</a></li>';
                }
                ?>
              </ul>
            </li>
          </li>
          <li class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Movies
              </a>
              <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
              <?php 
              require('./components/_movie_type_array.php');
                    foreach ($movie_type_array as $type) {
                echo '<li class="nav-item"><a class="nav-link text-capitalize" href="/movie_type.php?type='.$type.'">'.$type.'</a></li>';
                    }
              ?>
              </ul>
            </li>
          </li>
          <li class="nav-item"><a class="nav-link text-capitalize" href="/contact_us.php">Contact Us</a></li>
          <li class="nav-item"><a class="nav-link text-capitalize" href="/about_us.php">About Us</a></li>
        </ul>
      </div>
    <div class="site-logo"><a class="text-decoration-none text-white" href="/"><img src="../public/images/logo.png" width="70px"/></a></div>
  </div>
</nav>
