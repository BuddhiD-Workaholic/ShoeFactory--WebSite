<?php 
session_start();

if (isset($_SESSION["UserName"])) {
  header("Location: /IT20768676/ShoeFactory-WebSite/index.php");
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
    <link rel="stylesheet" type="text/css" href="../CSS/style.css">
    <link rel="stylesheet" type="text/css" href="../CSS/SignUpCSS.css" />
    <link rel="shortcut icon" href="../Images/AdminIcon.png">

    <!--FontAwsome CDN-->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <!--Jquery CDN-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!--JavaScript-->
    <script language="JavaScript" type="text/javascript" src="JSFile.js"></script>

    <style>
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
        h1,
		h2,
		h3,
		h4,
		h5 {
			font-family: "Open Sans", sans-serif;
           margin-top:0px;
           margin-bottom:0px;
		}
        .BClass {
      border-radius: 32px;
      color: #fff !important;
      background-color: #000 !important;
      border: none;
      display: inline-block;
      padding: 8px 16px;
      vertical-align: middle;
      overflow: hidden;
      text-decoration: none;
      text-align: center;
      cursor: pointer;
      white-space: nowrap
    }
    </style>

</head>

<body>
      <!--Heander Starts-->
  <nav>
    <div class="navigationBar">
      <ul class="meanu">
      <li><a href="Dashboard.php">Dashboard</a></li>
        <li><a href="CustomerManage.php">User Manage</a></li>
        <li><a href="AdminMange.php">webmaster Manage</a></li>
        <li><a href="ProductManage.php">Product Manage</a></li>
        <li><a href="OrderManage.php">Order Manage</a></li>
        <li><a href="FAQManage.php">FAQ Manage</a></li>
        <li><a href="NewsLater.php">NewsLater</a></li>
      </ul>
      <div class="Right_M">
        <form action="../BackEnd/Dashboard.php" method="post">
          <a href="UserAccount.php"><i class="fas fa-user"></i>My Account</a>
          <button class="BClass" type="submit" name="Logout">Log Out</button>
        </form>
      </div>
    </div>
  </nav>
  <!--Heander Ends-->
    <!--Section Form Strats-->
    <div class="card-wrapper">
        <!--Section 01 Starts-->
        <div class="product-detail">
            <center>
                <br>
                <h1>News Later</h1>
                <h3>Date: <?php echo  date("Y/m/d");?> </h3>
                <br>
            </center>
        </div>
        <!--Section 01 Ends-->
        <table width="900" align="center" border="0">
            <tbody>
                <form method="post" action="NewsLater.php">
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
                                <textarea clos="100" rows="12" class="form-control" id="txtMessage" name="txtMessage" rows="4" cols="20"></textarea>

                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <div class="form-outline mb-4" data-toggle="tooltip" title="Submit">
                                <div class="container" style="background-color:#f1f1f1">
                                    <input type="submit" class="OnC" name="submit" id="submit" value="Submit" onClick="validateEmailContact()">
                                </div>
                            </div>
                            <div class="container" style="background-color:#f1f1f1">
                                <div class="form-outline mb-4" data-toggle="tooltip" title="Cancel">
                                    <button type="reset" class="OnC OnCC">Cancel</button>
                                </div>
                            </div>
                        </td>
                    </tr>
            </tbody>
        </table>
        </form>
        <?php

        if (isset($_POST["submit"])) {
            $Email = 0;
            $sub = $_POST["txtSubject"];
            $Message = $_POST["txtMessage"];

            $con = mysqli_connect("localhost", "root", "", "shoefactory"); //Sql database connection

            if (!$con) //We are cheking whther the conection is sucessful
            {
                die("Sorry, we are facing a terminal error");
            }

            $sql = "";

            if (mysqli_query($con, $sql) > 0) {
                echo "This weeks news later is Sent!";
            } else {
                $EData=mysqli_error($con);
                echo "Error when sending the Messages! / ".$EData;
            }
            mysqli_close($con);
        }
        ?>

        <!--Buttons ends-->
    </div>
    <br><br>
</body>

</html>