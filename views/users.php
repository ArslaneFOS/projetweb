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

</body>
</html>