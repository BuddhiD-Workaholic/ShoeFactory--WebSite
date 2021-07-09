<?php session_start();

if (isset($_SESSION["AdminUM"])) {
  header('Location: BackEnd/Dashboard.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shoe Factory</title>

  <!--StyleSheet-->
  <link rel="stylesheet" type="text/css" href="CSS/style.css">
  <link rel="shortcut icon" href="images/Icon.png">

  <!--FontAwsome CDN-->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

  <!--Jquery CDN-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!--JavaScript-->
  <script language="JavaScript" type="text/javascript" src="JSFile.js"></script>

  <style>
    .popup .overlay {
      position: fixed;
      top: 0px;
      left: 0px;
      width: 100vw;
      height: 100vh;
      background: rgba(0, 0, 0, 0.7);
      z-index: 1;
      display: none;
    }

    .popup .content {
      position: absolute;
      top: 50%;
      left: 50%;
      color: white;
      transform: translate(-50%, -50%) scale(0);
      background: #202020;
      border-color: #40E0D0;
      width: 95%;
      max-width: 500px;
      height: 220px;
      z-index: 2;
      text-align: center;
      padding: 20px;
      box-sizing: border-box;
      font-family: "Open Sans", sans-serif;
    }

    .popup .content h1 {
      color: #0b9d8a;
      margin-top: 0px;
    }

    .popup .close-btn {
      cursor: pointer;
      position: absolute;
      right: 20px;
      top: 20px;
      width: 30px;
      height: 30px;
      background: red;
      font-size: 25px;
      font-weight: 600;
      line-height: 30px;
      text-align: center;
      border-radius: 50%;
    }

    .popup .close-btn:hover {
      color: #40E0D0;
    }

    .popup.active .overlay {
      display: block;
    }

    .popup.active .content {
      transition: all 300ms ease-in-out;
      transform: translate(-50%, -50%) scale(1);
    }
  </style>

</head>


<body>
  <!--NavigationBar Starts-->
  <?php
  if (isset($_SESSION['UserName'])) {
    require_once './Includes/HeaderLogedIn.php';
  } else {
    require_once './Includes/Header.php';
  }
  ?>
  <!--NavigationBar Ends-->

  <!--Searchbox Starts-->
  <div class="FontHeaderImg">
    <form action="DisplayProduts.php" method="get">
      <p align="center" class="searchB">Search your Shoes <br>
      <div align="center" class="search_wrap">
        <div class="search_box">
          <input type="text" class="input" id="Search" autofocus placeholder="search..." name="Search">
          <div class="btn btn_common">
            <button type="submit" class="btn" id="" onClick="SearchE()" name=""><i class="fas fa-search"></i></button>
          </div>
        </div>
      </div>
      </p>
    </form>
    <p align="left" class="PNameT">Fresh Foam <br> 1080v11</p>
    <a class="fontBtn" href="DisplayProduts.php?Search">Shop Now <i class="fas fa-external-link-alt"></i></a>
  </div>
  <!--Searchbox Ends-->

  <div class="card-wrapper">
    <!--NewArivals Starts-->
    <section class="section promotion">
      <div class="title">
        <h2>Shop Collections</h2>
        <span>Select from the Premium Product from every Collection</span>
      </div>

      <div class="promotion-layout container">
        <div class="promotion-item">
          <img src="./images/promo1.jpg" alt="Error" />
          <div class="promotion-content">
            <h3>FOR MEN</h3>
            <a href="DisplayProduts.php?Search">SHOP NOW</a>
          </div>
        </div>

        <div class="promotion-item">
          <img src="./images/ezgif.com-gif-maker.png" alt="Error" />
          <div class="promotion-content">
            <h3>CASUAL SHOES</h3>
            <a href="DisplayProduts.php?Search=Casual">SHOP NOW</a>
          </div>
        </div>

        <div class="promotion-item">
          <img src="./images/promo3.jpg" alt="Error" />
          <div class="promotion-content">
            <h3>FOR WOMEN</h3>
            <a href="DisplayProduts.php?Search=Women">SHOP NOW</a>
          </div>
        </div>

        <div class="promotion-item">
          <img src="./images/promo4.jpg" alt="Error" />
          <div class="promotion-content">
            <h3>ATHLETIC SHOES</h3>
            <a href="DisplayProduts.php?Search=Athletic">SHOP NOW</a>
          </div>
        </div>

        <div class="promotion-item">
          <img src="./images/promo5.png" alt="Error" />
          <div class="promotion-content">
            <h3>NEW ARRIVALS</h3>
            <a href="DisplayProduts.php?Search">SHOP NOW</a>
          </div>
        </div>

        <div class="promotion-item">
          <img src="./images/promo6.png" alt="Error" />
          <div class="promotion-content">
            <h3>TRENDING SHOES</h3>
            <a href="DisplayProduts.php?Search">SHOP NOW</a>
          </div>
        </div>
      </div>
    </section>
    <!--NewArivals Ends-->
    <br>

    <!--Trending Starts-->
    <section class="section advert">
      <div class="title">
        <h2>What our Customers Say...</h2>
        <span>Here are our top pics for you!</span>
      </div>
      <div class="promotion-layout container-BgGraey">
        <div class="promotion-item">
          <img src="./images/Person3.jpg" alt="Error" />
          <div class="MessageFCus">JEllo How are you Incididunt reprehenderit ipsum officia pariatur voluptate velit. Dolor non in amet dolore sunt. Do officia cillum occaecat do ex esse. Cillum commodo dolore laboris veniam dolor 
            laborum incididunt Lorem ex consectetur ea ad. Cillum consequat est mollit non laboris do officia aliquip.
          </div>
        </div>
        <div class="promotion-item">
          <img src="./images/Person1.jpg" alt="Error" />
          <div class="MessageFCus">JEllo How are you Incididunt reprehenderit ipsum officia pariatur voluptate velit. Dolor non in amet dolore sunt. Do officia cillum occaecat do ex esse. Cillum commodo dolore laboris veniam dolor 
            laborum incididunt Lorem ex consectetur ea ad. Cillum consequat est mollit non laboris do officia aliquip. 
          </div>
        </div>
        <div class="promotion-item">
          <img src="./images/Person2.jpg" alt="Error" />
          <div class="MessageFCus">JEllo How are you Incididunt reprehenderit ipsum officia pariatur voluptate velit. Dolor non in amet dolore sunt. Do officia cillum occaecat do ex esse. Cillum commodo dolore laboris veniam dolor 
            laborum incididunt Lorem ex consectetur ea ad. Cillum consequat est mollit non laboris do officia aliquip.
          </div>
        </div>
      </div>
    </section>
    <!--Trending Ends-->

    <br>
    <!--Offers and Sales Starts-->
    <section class="section advert">
      <div class="title">
        <h2>Latest categories</h2>
        <span>Browse through our latest Categories</span>
      </div>
      <div class="advert-layout container">
        <div class="item ">
          <img src="./images/promo7.png" alt="Error">
          <div class="content left">
            <span>Exclusive Sales</span>
            <h3>Spring Collections</h3>
            <a href="DisplayProduts.php?Search">View Collection</a>
          </div>
        </div>
        <div class="item">
          <img src="./Images/promo8.jpg" alt="Error">
          <div class="content  right">
            <span>New Trending</span>
            <h3>Designer Canvas</h3>
            <a href="DisplayProduts.php?Search">Shop Now </a>
          </div>
        </div>
      </div>
    </section>
    <!--Offers and sales Ends-->
    <br>

    <!--NewsModal Starts-->
    <?php

    if (isset($_GET['Message'])) {

      if ($_GET['Message'] == 0) {
        echo " <div class='popup' id='popup-1'>
    <div class='overlay'></div>
    <div class='content'>
      <div class='close-btn' onclick='togglePopup()'>×</div>
      <h1>Error!</h1>
      <p>There's been some internel issue please <a href='Contact Us.php'>contact Us</a></p>
      <p align='center'><button class='paybtn' onclick='togglePopup()'>&nbsp;&nbsp; Okay &nbsp;&nbsp;</button></p>
      </div>
  </div>";

        echo "<script>
    function togglePopup() {
      document.getElementById('popup-1').classList.toggle('active');
    }
    togglePopup();
    </script>";
      } else {
        echo " <div class='popup' id='popup-1'>
      <div class='overlay'></div>
      <div class='content'>
        <div class='close-btn' onclick='togglePopup()'>×</div>
        <h1>Congratulations!</h1>
        <p>You Will recive Weekly News on Shoe Factory deals, Latest Shoe Fashions and Many More!</a></p>
        <p align='center'><button class='paybtn' onclick='togglePopup()'>&nbsp;&nbsp; Okay &nbsp;&nbsp;</button></p>
        </div>
    </div>";

        echo "<script>
      function togglePopup() {
        document.getElementById('popup-1').classList.toggle('active');
      }
      togglePopup();
      </script>";
      }
    }
    ?>
    <!--NewsModal Ends-->
  </div>
  <br><br>
  <!--Footer Starts-->
  <footer>
    <div class="content">
      <div class="left box">
        <div class="upper">
          <div class="topic">About us</div>
          <p></p>
        </div>
        <div class="lower">
          <div class="topic">Contact us</div>
          <div class="phone">
            <a href="#"><i class="fas fa-phone-volume"></i>+94 11 3120 929</a>
          </div>
          <div class="email">
            <a href="#"><i class="fas fa-envelope"></i>ContactUS@ShoeFactory.com</a>
          </div>
        </div>
      </div>
      <div class="middle box">
        <div class="topic">LEGAL</div>
        <div><a target="_blank" href="./Images/Terms_And_Conditions.pdf">Terms and Conditions</a></div>
        <div><a href="#">Cookies</a></div>
        <div><a href="#">Press Content</a></div>
        <div><a href="Privacy Policy.php">Privacy and Data Protection</a></div>
      </div>
      <div class="middle box">
        <div class="topic">Company</div>
        <div><a href="index.php">Home</a></div>
        <div><a href="Contact Us.php">Contact Us</a></div>
        <div><a href="Privacy Policy.php">Privacy Policy</a></div>
        <div><a href="FAQ.php">FAQ</a></div>
      </div>
      <div class="right box">
        <div class="topic">Sign up for our Weekly Newsletter</div>
        <form action="Newslater.php" method="post">
          <input type="text" id="emailSuB" name="emailSuB" placeholder="Enter email address">
          <input type="submit" name="Sub" onClick="validateEmailSub()" value="Submit">
          <div class="media-icons">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
            <a href="#"><i class="fab fa-linkedin-in"></i></a>
          </div>
        </form>
      </div>
    </div>
    <div class="bottom">
      <p>Copyright © 2021 by ShoeFactory.com<br>
        All rights reserved.</p>
    </div>
  </footer>
  <!--Footer Ends-->

  <!--Logout PHP-->
  <?php
  if (isset($_POST["Logout"])) {
    session_destroy();
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";
  }
  ?>

  <!--Footer Ends-->
</body>

</html>