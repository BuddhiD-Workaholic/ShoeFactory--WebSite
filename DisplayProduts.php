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
    /*Display Product*/
    .dashbord {
      width: 22%;
      height: 310px;
      display: inline-block;
      background-color: #272D40;
      border-radius: 1.4rem;
      margin-top: 10px;
      padding: 30px 8px 30px 8px;
      margin-right: 30px;
      margin-bottom: 16px;
      overflow: hidden;
      text-overflow: ellipsis; 
    }

    a {
      text-decoration: none;
      color: #fff;
      cursor: pointer;
    }

    .dashbord:hover {
      transform: scale(1.2);
      transition: all 400ms ease-in-out;;
    }

    .icon-section i {
      font-size: 30px;
      padding: 10px;
      border: 1px solid #fff;
      border-radius: 50%;
      margin-top: -25px;
      margin-bottom: 6px;
      background-color: #34495E;
    }

    .icon-section p {
      margin: 0px;
      font-size:  1.3rem;
      font-weight: 400;
      color: #F2A20C;
    }

    .icon-section .Price {
      font-size: 22px;
      padding-top: 2px;
      font-weight: 300;
      color: #fff;
      font-family: Arial, Helvetica, sans-serif;
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

  <!--SearchBox Starts-->
  <br>
  <form action="DisplayProduts.php" method="get">
    <div align="center" class="search_wrap">
      <div class="search_box">
        <input type="text" class="input" id="Search" value="<?php echo $_GET['Search']; ?>" autofocus placeholder="search..." name="Search">
        <div class="btn btn_common">
          <button type="submit" class="btn" id="" onClick="SearchE()" name=""><i class="fas fa-search"></i></button>
        </div>
      </div>
    </div>
  </form>
  <br>
  <!--SearchBox Ends-->

  <!--Product Starts-->
  <div class="card-wrapper">
    <?php
    if (isset($_GET['Search'])) {

      $con = mysqli_connect("localhost", "root", "", "shoefactory");
      if (!$con) {
        die("Cannot connect to DB server");
      }

      $sql = "SELECT * FROM `product` WHERE PName like '%" . $_GET['Search'] . "%' or BrandName = '" . $_GET['Search'] . "'";

      $result = mysqli_query($con, $sql);
$co=1;
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
    ?>
          <div class="dashbord">
            <a href="ProdcutData.php?Pid=<?php echo $row['Product_ID'] ?>">
              <div class="icon-section">
                <center><img src="<?php echo $row['MainImg']; ?>"="" width="170" height="160" /> </center>
                <p align="center" class="topic"> <?php echo $row['PName'] ?> | <?php echo $row['BrandName'] ?></p>
                <p align="center" class="Price"> Rs: <?php echo $row['Price'] ?> .00</p>
              </div>
            </a>
          </div>
    <?php
    $co++;
        }
      } else {
        echo "<center><h2><b>No Result found!</b></h2></center>";
      }
      mysqli_close($con);
    } else {
      header('Location:index.php');
    }
    ?>
 <center><div class="results"></div></center>
  </div>
  <!--Product Ends-->
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

</body>

</html>