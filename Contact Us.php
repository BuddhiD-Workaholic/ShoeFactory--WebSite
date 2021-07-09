<?php
session_start();

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
    ul {
      margin: 1rem 0;
      font-size: 15px;
      padding: 6px;
    }

    ul,
    li {
      margin: 0;
      list-style: none;
      background-size: 18px;
      font-weight: 600;
      padding: 6px;
    }

    .OnC {
      background-color: #000;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 50%;
    }

    .OnC:hover {
      opacity: 0.8;
    }

    .OnCC {
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 50%;
      background-color: #f44336;
    }

    input[type=text],
    input[type=password],
    input[type=file],
    textarea {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }

    label {
      font-size: 20px;
    }

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
      height: 250px;
      z-index: 2;
      text-align: center;
      padding: 20px;
      box-sizing: border-box;
      font-family: "Open Sans", sans-serif;
    }

    .popup .content h1 {
      color: #0b9d8a;
    }

    .popup .close-btn {
      cursor: pointer;
      position: absolute;
      right: 20px;
      top: 20px;
      width: 30px;
      height: 30px;
      background: #222;
      color: #40E0D0;
      font-size: 25px;
      font-weight: 600;
      line-height: 30px;
      text-align: center;
      border-radius: 50%;
    }
    .popup .close-btn:hover {
      background: red;
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

  <!--Section Form Strats-->
  <div class="card-wrapper">
    <!--Section 01 Starts-->
    <div class="product-detail">
      <h2>Contact Us</h2>
    </div>
    <!--Section 01 Ends-->
    <table width="1161" border="0">
      <tbody>
        <form method="post" action="Contact Us.php">
          <tr>
            <td><label class="form-label" for="txtFName">First name</label></td>
            <td>
              <div class="form-outline" data-toggle="tooltip" data-placement="top" title="Fisrt Name!">
                <input type="text" id="txtFName" name="txtFName" autofocus class="form-control" />

              </div>
            </td>
          </tr>
          <tr>
            <td><label class="form-label" for="txtLName">Last name</label></td>
            <td>
              <div class="form-outline" data-toggle="tooltip" title="Last Name">
                <input type="text" id="txtLName" Name="txtLName" class="form-control" />

              </div>
            </td>
          </tr>
          <tr>
            <td><label class="form-label" for="txtEmail">Email</label></td>
            <td>
              <div class="form-outline mb-4" data-toggle="tooltip" title="Email">
                <input type="text" id="txtEmail" name="txtEmail" class="form-control" />

              </div>
            </td>
          </tr>
          <tr>
            <td><label class="form-label" for="txtSubject">Subject</label></td>
            <td>
              <div class="form-outline mb-4" data-toggle="tooltip" title="Subject">
                <input type="text" id="txtSubject" name="txtSubject" class="form-control" />

              </div>
            </td>
          </tr>
          <tr>
            <td><label class="form-label" for="txtMessage">Your Message</label></td>
            <td>
              <div class="form-outline mb-4" data-toggle="tooltip" title="Message">
                <textarea class="form-control" id="txtMessage" name="txtMessage" rows="4" cols="20"></textarea>

              </div>
            </td>
          </tr>
          <tr>
            <td></td>
            <td>
              <center><div class="form-outline mb-4" data-toggle="tooltip" title="Submit">
                <div class="container" style="background-color:#f1f1f1">
                  <input type="submit" class="OnC" name="submit" id="submit" value="Submit" onClick="validateEmailContact()">
                </div>
              </div>
              <div class="container" style="background-color:#f1f1f1">
                <div class="form-outline mb-4" data-toggle="tooltip" title="Cancel">
                  <button type="reset" onclick="document.getElementById('id01').style.display='none'" class="OnC OnCC">Cancel</button>
                </div></center>
              </div>
            </td>
          </tr>
      </tbody>
    </table>
    </form>
    <?php

    if (isset($_POST["submit"])) {
      $FirstName = $_POST["txtFName"];
      $LastName = $_POST["txtLName"];
      $Email = $_POST["txtEmail"];
      $sub = $_POST["txtSubject"];
      $Message = $_POST["txtMessage"];

      $con = mysqli_connect("localhost", "root", "", "shoefactory"); //Sql database connection

      if (!$con) //We are cheking whther the conection is sucessful
      {
        die("Sorry, we are facing a terminal error");
      }

      $sql = "INSERT INTO `contact`(`Id`, `FisrtName`, `SecondName`, `Email`, `subject`, `Message`) VALUES (NULL,'" . $FirstName . "','" . $LastName . "','" . $Email . "','" . $sub . "','" . $Message . "');";

      if (mysqli_query($con, $sql) > 0) {
        echo " <div class='popup' id='popup-1'>
        <div class='overlay'></div>
        <div class='content'>
          <div class='close-btn' onclick='togglePopup()'>×</div>
          <h1>Congratulations!</h1>
          <p>Your Message is sent, You will recive a Email in quite while! <br> Thank you for contacting us!.</a></p>
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
          <h1>Error!</h1>
          <p>There's been some internel issue.. <br> please try again Later!</p>
          </div>
      </div>";

        echo "<script>
        function togglePopup() {
          document.getElementById('popup-1').classList.toggle('active');
        }
        togglePopup();
        </script>";
      }

      mysqli_close($con);
    }
    ?>

    <!--Buttons ends-->
    <br><br>
    <!--Section 02 Starts-->
    <div class="product-detail">
      <h2>Visit Us</h2>
    </div>
    <!--Section 02 Ends-->
    <!--Location Starts-->
    <table width="1161" border="0">
      <tbody>
        <tr>
          <td width="903">
            <div data-toggle="tooltip" title="Open in Google-Map">
              <a href="https://goo.gl/maps/JS3VDrj4mNeBdv137" target="_blank"><img src="Images/Map.png" alt="Map" width="903" height="371" class="img-fluid"></a>
            </div>
          </td>
          <td width="248">
            <center>
              <ul class="list-unstyled mb-0">
                <li><i class="fas fa-map-marker-alt fa-2x"></i>
                  <p>Head Office<br>
                    No 05, Ward Place, Colombo 07.</p>
                </li>
                <li><i class="fas fa-phone mt-4 fa-2x"></i>
                  <p>+ 01 234 567 89</p>
                </li>
                <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                  <p>Contact@ShoeFactory.com</p>
                </li>
              </ul>
            </center>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <!--Location Ends-->
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