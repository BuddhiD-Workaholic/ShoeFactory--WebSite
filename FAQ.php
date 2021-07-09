<?php 
session_start(); 

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
    <link rel="shortcut icon" href="images/Icon.png">

    <!--FontAwsome CDN-->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <!--Jquery CDN-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!--JavaScript-->
    <script language="JavaScript" type="text/javascript" src="JSFile.js"></script>

    <style>
        div.pa {
            display: none;
            text-align: justify;
            color: #ffffff;
        }

        .fl {
            cursor: pointer;
            text-transform: capitalize;
            text-align: justify;
            color: #F8F8F8;
        }

        div.pa,
        p.fl {
            line-height: 30px;
            margin: auto;
            font-size: 16px;
            padding: 5px;
            border: solid 1px #666;
            border-radius: 3px;
            user-select: none;
        }

        p{
          font-size: 19px;
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
    <br>
    <!--FAQ Starts-->
    <div class="card-wrapper">
        <br>
        <?php
        $con = mysqli_connect("localhost", "root", "", "shoefactory");
        if (!$con) {
            die("Cannot connect to DB server");
        }

        $sql = "SELECT * FROM `faq`";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {
            $f = 1;
            while ($Fed = mysqli_fetch_assoc($result)) {
                echo "<p><b> 0$f. &nbsp;&nbsp;&nbsp;</b>". $Fed['FAQ']."</p> 
                <p><b>&nbsp;&nbsp;&nbsp;&nbsp;Answer: &nbsp;&nbsp;&nbsp;".$Fed['Answer']."</b></p><hr><br>";
                $f++;
            }
        }
        ?>
    </div>
    <!--FAQ Ends-->
    <br>
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