<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="/views/assets/css/offers.css" rel="stylesheet">
  <link href="/views/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/views/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/views/assets/vendor/fontawesome/css/fontawesome.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="/views/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script src="/views/assets/scripts/functions.js"></script>
  <link rel="stylesheet" href="/views/assets/css/overlay-offer.css">


  <style>
    #overlay {
      position: fixed;
      /* Sit on top of the page content */
      display: none;
      /* Hidden by default */
      width: 100%;
      /* Full width (cover the whole page) */
      height: 100%;
      /* Full height (cover the whole page) */
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: rgba(0, 0, 0, 0.5);
      /* Black background with opacity */
      z-index: 1000;
      /* Specify a stack order in case you're using a different order for other elements */
      cursor: pointer;
      /* Add a pointer on hover */
    }

    /*.offer-card {
      position: absolute;
      top: 50%;
      left: 50%;
      font-size: 50px;
      /*color: white;
      transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);

    }*/

    #stat-card {
      margin: 100px 25%;
      width: 50%;
      background-color: white;
      border-radius: 18.5px;
      padding: 20px;
    }

    @media screen and (max-width: 800px) {
      #stat-card {
        width: 90%;
        margin: 0 5%;
        height: max-content;
      }
    }
  </style>
</head>

<body>
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <img class="logo" src="/views/assets/img/neo-neo-logo_1.svg">
      </div>

      <nav id="navbar" class="navbar">
        <ul>
                  <li><a class="nav-link scrollto active" href="views/home.php">Home</a></li>
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
          <li><a class="nav-link scrollto" href="./login.html">Login</a></li>
        </ul>

      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->


  <!--<div class="searchbar">
        
    </div>
 </div>
  </header> End Header -->

  <!--
  <div class="searchbar">

    <div class="container">
      <div class="row height d-flex  align-items-center">
        <div class="col-md-6">
          <div class="form-outline">
            <input type="search" id="form1" class="form-control" placeholder="Type query" aria-label="Search" />
          </div>
        </div>
      </div>
    </div>
    <div class="search-select">
      <div class="container">
        <div class="row height d-flex justify-content-center align-items-center">
          <div class="col-md-3">
            <select class="form-select" aria-label="Default select example">

              <option selected>Select a Location</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
          </div>
        </div>
      </div>
    </div>

  </div>-->
  <!--
    <div class="searchbar2">
        <div class="container">
            <div class="row">
                <div class="col">

                </div>
            </div>
        </div>
    </div>-->

  <div class="hero">
    <div class="search">

      <input placeholder="Search for an offer" class="component-2 search-for-an-offer valign-text-middle" id="search" type="text" oninput="searchCompanies(document.getElementById('search').value ,1)">

    </div>
  </div>

  <div id="offers-cards">

  </div>
  <div id="overlay">

  </div>
  <footer>
    
    <div class="footer">
        <div class="container">
            <div class="row">
                

                <div class="col-md-6 col-xs-12">
                    <div class="second">
                        <h4> Navigate</h4>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#offerz">Offers</a></li>
                            <li><a href="#companiz">Companies</a></li>
                            <li><a href="#internz">Interns</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-6 col-xs-12">
                    <div class="third">
                        <h4> Contact</h4>
                        <ul>
                            <li>CESI Exia </li>
                            


                          <li><i class="far fa-envelope"></i> Random Adress</li>
                            <li><i class="far fa-envelope"></i> email@yahoo.com</li>


                          <li><i class="fas fa-map-marker-alt"></i> Algiers, Algeria </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-8">
                        <p class="copyright">
                          Copyright © 2022 All rights reserved |Cesi EXIA </a>
                        </p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="line"></div>
                    <div class="second2">
                

                    </div>

                </div>
            </div>
            </div>
    </div>
</footer>
  <script>
    document.body.onload = () => {
      searchOffers('', 1);
      document.getElementById('search').oninput = () => {
        document.getElementById('offers-cards').innerHTML = '';
        searchOffers(document.getElementById('search').value, 1);
      }
    }
    // testfgsdgfds
  </script>
</body>