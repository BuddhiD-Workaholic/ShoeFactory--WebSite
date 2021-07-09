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
                alert("Wrong input in Contact Number! \n Contact number Should contain 10 Digits");
                return false;
            }
        }

        //UName
        function UsernameValidate() {

            var uName = document.getElementById('txtUserName').value;

            var DN = uName.substring(0, 3);
            var x = uName.substring(4, 7);

            if ((DN == "Adm") && (uName.charAt(3) == '/') && (isNaN(x) == false) && (uName.charAt(7) == '@')) {
                return true;
            } else {
                alert("User ID must match the following parameteres: \n Should Start with 'Adm'\n Follwed with a '/' \n and Three Numbers Ex:'123' \n Follwed with '@' \n At Last the Admin Name Ex:'Taylor' \n Example: 'Adm/123@Taylors'");
                return false;
            }

        }

        //Password
        function ValidatePassword() {
            var pwdcp = document.getElementById("txtCurrentP").value;

            if ((pwdcp.length >= 8) && (pwdcp.length <= 20)) {
                return true;
            } else {
                alert("Please enter the correct password with minimum of 8 charcters and Maximum of 10 Characters");
                return false;
            }
        }

        function validateAll() {

            if (ValidatePassword() && ValidatePhoneNo() && UsernameValidate()) {
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
        <table width="771" border="0" align="center">
            <form action="InsertAdmin.php" method="post" enctype="multipart/form-data">
                <tbody>
                    <tr>
                        <td>Name</td>
                        <td><input type="text" name="txtLastName" id="txtLastName">
                        </td>
                    </tr>
                    <tr>
                        <td>Mobile Phone No</td>
                        <td><input type="text" name="textMobileNo" id="textMobileNo" placeholder=" 07">
                        </td>
                    </tr>
                    <tr>
                        <td height="75">Address </td>
                        <td><textarea rows="6" cols="50" name="textadress" id="textadress"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>UserName</td>
                        <td><input type="text" name="txtUserName" id="txtUserName" placeholder=" Adm/123@Name">
                        </td>
                    </tr>
                    <tr>
                        <td>Password </td>
                        <td><input type="password" name="txtCurrentP" id="txtCurrentP" pattern="{10,20}" pattern="Must contain 10 to 20 Characters">
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
        if (isset($_POST["submit"])) {

            $Password =  $_POST['txtCurrentP'];
            $Name = $_POST["txtLastName"];
            $Contact = $_POST["textMobileNo"];
            $Adress = $_POST["textadress"];
            $UName = $_POST["txtUserName"];

            $con = mysqli_connect("localhost", "root", "", "shoefactory");

            if (!$con) {
                die("Sorry, we are facing a terminal error");
            }

            $sql1 = "INSERT INTO `webmaster`(`WebMID`, `Name`, `PhoneNumber`, `Address`, `UserName`, `Password`) VALUES (NULL,'" . $Name . "','" . $Contact . "','" . $Adress . "','" . $UName . "','" . $Password . "')";
            $Wid = mysqli_insert_id($con);

            if (mysqli_query($con, $sql1) > 0) {
                echo " <div class='popup' id='popup-1'>
                <div class='overlay'></div>
                <div class='content'>
                  <div class='close-btn' onclick='togglePopup()'>×</div>
                  <h1>Congratulations</h1>
                  <p>One Account is created, WebMID is: $Wid</p>
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
                        <h1>Error</h1>
                        <p>Check the Data you uploaded and Try again!</p>
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