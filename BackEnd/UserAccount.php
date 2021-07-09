<?php 
session_start();

if (isset($_SESSION["UserName"])) {
  header("Location: /IT20768676/ShoeFactory-WebSite/index.php");
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

    <script>
        //Contact Number.
        function ValidatePhoneNo() {
            var CPno = document.getElementById("textMobileNo").value;
            if ((CPno.length == 10) && (isNaN(CPno) == false)) {
                return true;
            } else {
                alert("Wrong input in Contact Number!");
                return false;
            }
        }

        //Password
        function ValidatePassword() {
            var pwdcp = document.getElementById("txtCurrentP").value;
            var pwd1 = document.getElementById("txtPassword").value;
            var pwdc = document.getElementById("txtCpassword").value;

            if (((pwdcp == '') || (pwdcp == null)) && ((pwd1 == '') || (pwd1 == null)) && ((pwdc == '') || (pwdc == null))) {
                return true;
            }

            if ((pwd1.length >= 8) && (pwd1.length <= 10)) {
                return true;
            } else {
                alert("Please enter the correct password with minimum of 8 charcters and Maximum of 10 Characters");
                return false;
            }
        }

        function validateAll() {

            if (ValidatePassword() && ValidatePhoneNo()) {
                <?php
                $SesState = "True";  //The data will only be transfered to the database when the inputs are properly valid  
                ?>

            } else {
                event.preventDefault();
                alert("Error! \n Please check the Input values again");
            }
        }
    </script>

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
    <!--UserAccounts Starts-->
    <div class="card-wrapper">
        <br><br>
        <?php
        $con = mysqli_connect("localhost", "root", "", "shoefactory");
        if (!$con) {
            die("Sorry, we are facing a terminal error");
        }

        $sql = "SELECT * FROM `webmaster` WHERE UserName  = '" . $_SESSION['AdminUM'] . "'";

        $currentPassword = '';
        $password = '';

        $results = mysqli_query($con, $sql);
        if (mysqli_num_rows($results) > 0) {
            $row = mysqli_fetch_assoc($results);

            $currentPassword = $row['Password'];
            $password = $row['Password'];
        ?>

            <table width="771" height="496" border="0" align="center">
                <form action="UserAccount.php" method="post" enctype="multipart/form-data">
                    <tbody>
                        <tr>
                            <td width="184">WebMID</td>
                            <td width="344"><input type="text" readonly name="txtFisrtName" id="txtFisrtName" value="<?php echo $row['WebMID']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td><input type="text" name="txtLastName" id="txtLastName" value="<?php echo $row['Name']; ?>" autofocus>
                            </td>
                        </tr>
                        <tr>
                            <td>Mobile Phone No</td>
                            <td><input type="text" name="textMobileNo" id="textMobileNo" placeholder=" 07" value="<?php echo $row['PhoneNumber']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td height="75">Address </td>
                            <td><textarea name="textadress" id="textadress"><?php echo $row['Address']; ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>UserName</td>
                            <td><input type="text" readonly name="txtUserName" id="txtUserName" value="<?php echo $row['UserName']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Current Password </td>
                            <td><input type="password" name="txtCurrentP" id="txtCurrentP" pattern="{10,20}" autocomplete="off">
                            </td>
                        </tr>
                        <tr>
                            <td>New Password </td>
                            <td><input type="password" name="txtPassword" id="txtPassword" pattern="{10,20}" placeholder="New Paswword length must be 8 - 10" autocomplete="off">
                            </td>
                        </tr>
                        <tr>
                            <td>Confirm Password </td>
                            <td><input type="password" name="txtCpassword" id="txtCpassword" pattern="{10,20}" placeholder="New Paswword length must be 8 - 10" autocomplete="off">
                            </td>
                            <td>&nbsp;</td>
                            <td><br>
                                <p></p>
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td><input type="submit" class="Aclass" name="submit" id="submit" value="Update" onClick="validateAll()">
                                <div class="container" style="background-color:#f1f1f1">
                                    <center><input type="reset" class="cancelbtn" name="reset" id="reset" value="Reset"></center>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </form>
            </table>
            <br>

        <?php
        }

        if ((isset($_POST["submit"])) && (isset($SesState))) {

            if ((isset($_POST['txtCurrentP'])) && ($_POST['txtCurrentP'] != '')) {
                if ($currentPassword != $_POST['txtCurrentP']) {
                    echo "<center> <b>Password miss match!</b><br> Try again adding a new Password!<center>";
                }
            } else {
                $Password = $currentPassword;
            }

            $WebMID = $_POST["txtFisrtName"];
            $Name = $_POST["txtLastName"];
            $Contact = $_POST["textMobileNo"];
            $Adress = $_POST["textadress"];
            $UName = $_POST["txtUserName"];

            if ((isset($_POST["txtPassword"])) && (($_POST["txtPassword"]) != null)) {
                $Password = $_POST["txtPassword"];
            } else {
                $Password = $currentPassword;
            }

            $con = mysqli_connect("localhost", "root", "", "shoefactory");

            if (!$con) {
                die("Sorry, we are facing a terminal error");
            }

            $sql1 = "UPDATE `webmaster` SET `WebMID` = '" . $WebMID . "', `Name` = '" . $Name . "', `PhoneNumber` = '" . $Contact . "', `Address` = '" . $Adress . "', `UserName` = '" . $UName . "', `Password` = '" . $Password . "' WHERE `webmaster`.`WebMID` = '" . $_SESSION['AdminUM'] . "';";

            if (mysqli_query($con, $sql1) > 0) {
                echo " <div class='popup' id='popup-1'>
                <div class='overlay'></div>
                <div class='content'>
                  <div class='close-btn' onclick='togglePopup()'>×</div>
                  <h1>Congratulations</h1>
                  <p>Your Account is Updated!</p>
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
                        <p>Check the Data you uploaded and Try again! / ".$EData."</p>
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
    </div>
    <!--UserAccount Ends-->
</body>

</html>