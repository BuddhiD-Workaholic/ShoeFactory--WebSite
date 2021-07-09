<?php
session_start();

if (isset($_SESSION['UserName'])) {
} else {
	header('Location:login.php');
}

if (isset($_SESSION["AdminUM"])) {
  header('Location: BackEnd/Dashboard.php');
}

?>
<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shoe Factory</title>

  <!--StyleSheet-->
  <link rel="stylesheet" type="text/css" href="CSS/style.css">
  <link rel="stylesheet" type="text/css" href="CSS/dashBoardStyle.css"/>
  <link rel="shortcut icon" href="images/Icon.png">

  <!--FontAwsome CDN-->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

  <!--Jquery CDN-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!--JavaScript-->
  <script language="JavaScript" type="text/javascript" src="JSFile.js"></script>

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

  <!--UserAccounts Starts-->
  <div class="card-wrapper">  
  <table width="908" height="225" align="center">
    <tbody>
      <tr>
        <td colspan="2">
          <div class="main-section">
            <div class="dashbord">
              <div class="icon-section"> <br />
                <img src="images/userprof.png" alt="" width="87" height="90" />
                <p>&nbsp;</p>
              </div>
              <div class="detail-section"> <a href="EditProfile.php">My Profile</a></div>
            </div>
            <div class="dashbord dashbord-green">
              <div class="icon-section"> <br />
                <img src="images/shopping-bag-flat.png"="" width="87" height="90" />
                <p>&nbsp;</p>
              </div>
              <div class="detail-section"> <a href="PurchaseHistory.php">Purchase History</a></div>
            </div>
            <div class="dashbord dashbord-blue">
              <div class="icon-section"> <br />
                <img src="images/b3.png" alt="" width="87" height="90" />
                <p>&nbsp;</p>
              </div>
              <div class="detail-section"> <a href="OrderTracking.php">Order Tracking</a></div>
            </div>
            <div class="dashbord dashbord-skyblue">
              <div class="icon-section"> <br />
                <img src="images/p.png" alt="" width="87" height="90" />
                <p>&nbsp;</p>
              </div>
              <div class="detail-section"> <a href="PostFeedbacks.php">Post Feedbacks</a></div>
            </div>
          </div>
        </td>
      </tr>
    </tbody>
  </table>
</div> 
  <!--UserAccounts Ends-->

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

</body>

</html>