<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/views/assets/css/users.css" rel="stylesheet">
    <link href="/views/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/views/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/views/assets/vendor/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="/views/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link href="/views/assets/css/home.css" rel="stylesheet">
    <title>Interns</title>
</head>
<body>
<header id="header" class="d-flex align-items-center">
            <div class="container d-flex align-items-center justify-content-between">
        
              <div class="logo">
                <img class="logo" src="/views/assets/img/neo-neo-logo_1.svg">
              </div>
        
              <nav id="navbar" class="navbar">
                <ul>
                  <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                  <li><a class="nav-link scrollto" href="/views/offers.php">Offers</a></li>
                  <li><a class="nav-link scrollto" href="/views/companies.php">Companies</a></li>
                  <li><a class="nav-link scrollto" href="/views/users.php">Interns</a></li>
                  <li><a class="nav-link scrollto" href="#portfolio">|</a></li>
                  <!--<li><a class="nav-link scrollto" href="#team">Login</a></li>
                  <li class="dropdown"><a href="#"><span>Random DropDown</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                      <li><a href="#">Drop Down 1</a></li>
                      <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                        <ul>
                          <li><a href="#">Deep Drop Down 1</a></li>
                          <li><a href="#">Deep Drop Down 2</a></li>
                          <li><a href="#">Deep Drop Down 3</a></li>
                          <li><a href="#">Deep Drop Down 4</a></li>
                          <li><a href="#">Deep Drop Down 5</a></li>
                        </ul>
                      </li>
                      <li><a href="#">Drop Down 2</a></li>
                      <li><a href="#">Drop Down 3</a></li>
                      <li><a href="#">Drop Down 4</a></li>
                    </ul>
                  </li>
                  <li><a class="nav-link scrollto" href="#contact">Contact</a></li> -->
                  <li><a class="nav-link scrollto" href="/views/login.php">Login</a></li>
                </ul>
                
              </nav><!-- .navbar -->
        
            </div>
          </header><!-- End Header -->

<main>
    <div class="hero">
        <div class="search">
            <input placeholder="firstname" class="component-2 search-for-an-offer valign-text-middle" id="firstname" type="text" oninput="document.getElementById('users-cards').innerHTML = '';searchUsers(document.getElementById('firstname').value, document.getElementById('lastname').value ,1)">
            <div>&nbsp;</div>
            <input placeholder="lastname" class="component-2 search-for-an-offer valign-text-middle" id="lastname" type="text" oninput="document.getElementById('users-cards').innerHTML = '';searchUsers(document.getElementById('firstname').value, document.getElementById('lastname').value ,1)">
        </div>
    </div>

  <div id="users-cards">

  </div>
    <h1>Users</h1>

    <script src="/views/assets/scripts/functions.js"></script>
    <script>
    document.body.onload = () => {
      searchUsers('', '', 1);
      
    }
    // testfgsdgfds
  </script>
</main>
<footer>
    
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-xs-12">
                    <div class="first">
                        <h4>My Skills</h4>
                        <p> Analytical Skills</p>
                        <p> Problem-solving skills</p>
                        <p> Critical-thinking skills</p>
                        <p> Detail-oriented</p>
                        <p> Multitasking</p>
                        <p> Self-motivated</p>
                    </div>
                </div>

                <div class="col-md-4 col-xs-12">
                    <div class="second">
                        <h4> Navigate</h4>
                        <ul>
                            <li><a href="/views/home.php">Home</a></li>
                            <li><a href="/views/offers.php">Offers</a></li>
                            <li><a href="/views/companies.php">Companies</a></li>
                            <li><a href="/views/users.php">Interns</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4 col-xs-12">
                    <div class="third">
                        <h4> Contact</h4>
                        <ul>
                            <li>Steve Cook </li>
                            <li></li>


                          <li><i class="far fa-envelope"></i> steve.cook@stoffers.com</li>
                            <li><i class="far fa-envelope"></i> contact@stoffers.com</li>


                          <li><i class="fas fa-map-marker-alt"></i> Tixeraine </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="line"></div>
                    <div class="second2">
                        <a href="#" target="_blank"> <i class="fab fa-codepen fa-2x margin"></i></a>
                        <a href="#" target="_blank"> <i class="fab fa-github fa-2x margin"></i></a>
                        <a href="#" target="_blank"> <i class="fab fa-linkedin fa-2x margin"></i></a>
                        <a href="#" target="_blank"><i class="fab fa-youtube fa-2x margin" ></i></a>

                    </div>

                </div>
            </div>
            </div>
    </div>
</footer>
</body>
</html>