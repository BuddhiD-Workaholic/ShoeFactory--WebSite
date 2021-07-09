<?php
session_start();

if (isset($_SESSION["UserName"])) {
    header("Location: /IT20768676/ShoeFactory-WebSite/index.php");
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoe Factory</title>

    <!--StyleSheet-->
    <link rel="stylesheet" type="text/css" href="../CSS/style.css">
    <link rel="stylesheet" type="text/css" href="../CSS/DS.css" />
    <link rel="stylesheet" type="text/css" href="../CSS/SignUpCSS.css" />
    <link rel="shortcut icon" href="../Images/AdminIcon.png">

    <!--FontAwsome CDN-->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <!--Jquery CDN-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!--JavaScript-->
    <script language="JavaScript" type="text/javascript" src="JSFile.js"></script>

    <style>
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
            height: 150px;
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
    <!--Heander Starts-->
    <nav>
        <div class="navigationBar">
            <ul class="meanu">
                <li><a href="Dashboard.php">Dashboard</a></li>
                <li><a href="BackEnd/CustomerManage.php">User Manage</a></li>
                <li><a href="AdminMange.php">webmaster Manage</a></li>
                <li><a href="ProductManage.php">Product Manage</a></li>
                <li><a href="OrderManage.php">Order Manage</a></li>
                <li><a href="FAQManage.php">FAQ Manage</a></li>
                <li><a href="NewsLater.php">NewsLater</a></li>
            </ul>
            <div class="Right_M">
                <form action="Dashboard.php" method="post">
                    <a href="UserAccount.php"><i class="fas fa-user"></i>My Account</a>
                    <button class="BClass" type="submit" name="Logout">Log Out</button>
                </form>
            </div>
        </div>
    </nav>
    <!--Heander Ends-->
    <div class="card-wrapper">
        <br><br>
        <table align="center" border="0">
            <form action="InsertFAQ.php" method="post" enctype="multipart/form-data">
                <tbody>
                    <tr>
                        <td width="134">Question</td>
                        <td width="544"><textarea rows="8" cols="70" type="text" name="txtName" id="txtName" required autofocus></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Answer</td>
                        <td><textarea rows="8" cols="70" type="text" name="Quantity" id="Quantity" required></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><input type="submit" class="Aclass" name="submit" id="submit" value="Submit">
                            <div class="container" style="background-color:#f1f1f1">
                                <center> <button type="reset" class="Aclass cancelbtn">Cancel</button></center>
                            </div>&nbsp;
                    </tr>
                </tbody>
            </form>
        </table>

        <?php
        if (isset($_POST['submit'])) {
            $Name = $_POST['txtName'];
            $Quan = $_POST['Quantity'];

            $con = mysqli_connect("localhost", "root", "", "shoefactory");
            if (!$con) {
                die("Sorry, we are facing a terminal error");
            }

            $sql = "INSERT INTO `faq`(`ID`, `FAQ`, `Answer`) VALUES (NULL,'".$Name."','".$Quan."')";

            if (mysqli_query($con, $sql) > 0) {
                echo " <div class='popup' id='popup-1'>
      <div class='overlay'></div>
      <div class='content'>
        <div class='close-btn' onclick='togglePopup()'>×</div>
        <h1>Congratulations</h1>
        <p>One FAQ is Inserted!</p>
        </div>
    </div>";
                echo "<script>
      function togglePopup() {
        document.getElementById('popup-1').classList.toggle('active');
      }
      togglePopup();
      </script>";
            } else {
                $EData=mysqli_error($con);
                echo " <div class='popup' id='popup-1'>
        <div class='overlay'></div>
        <div class='content'>
          <div class='close-btn' onclick='togglePopup()'>×</div>
          <h1>Error</h1>
          <p>Check the Data you uploaded/".$EData."and Try again!</p>
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

    </div>
</body>

</html>