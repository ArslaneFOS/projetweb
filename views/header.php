<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <img class="logo" src="/views/assets/img/neo-neo-logo_1.svg">
      </div>

      <nav id="navbar" class="navbar navbar-light">
        <ul>
          <li><a class="nav-link scrollto" href="home">Home</a></li>
          <li><a class="nav-link scrollto" href="offers">Offers</a></li>
          <li><a class="nav-link scrollto" href="companies">Companies</a></li>
          <li><a class="nav-link scrollto" href="users">Interns</a></li>
          <li><a class="nav-link scrollto">|</a></li>
          <?php
          if (isset($_SESSION['id_user'])) {
          ?>
            <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Account
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><span class="dropdown-item"><?=$_SESSION['name']?></span></li>
            <li><span class="dropdown-item"><a style="color: black;" href="applications">Application</a></span></li>
            <li><span class="dropdown-item" href="#"><a style="color: black;" href="wishlist">Wishlist</a></span></li>
            <li><hr class="dropdown-divider"></li>
            <li><span class="dropdown-item" href="#"><a style="color: black;" href="logout">Log Out</a></span></li>
          </ul>
        </li>
            <?php
                  } else {
                    ?>
            <li><a class="nav-link scrollto" href="login">Log In</a></li>
        </ul>
      <?php
                  } ?>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->