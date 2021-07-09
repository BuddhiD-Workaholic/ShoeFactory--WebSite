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
        h1,
        h2,
        h3,
        h4,
        h5 {
            font-family: "Open Sans", sans-serif
        }

        #customersData {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
        }

        #customersData td,
        #customersData th {
            border: 1px solid #ddd;
            padding: 6px;
        }

        #customersData tr:hover {
            background-color: #ddd;
        }

        #customersData th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #003;
            color: white;
            align-content: center;
        }

        a .btn {
            border-radius: 32px;
            color: #fff !important;
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
    <div class="card-wrapper">
        <br>
        <h3>Create a new WebMaster<a class="addbtn" href="../BackEnd/InsertAdmin.php"> Click Here <i class="fas fa-plus"></i></a></h3>
        <h1 align="center">WEB Master Details</h1>
    </div>    
        <table width="1300" align="center" border="1" id="customersData">
            <tbody>
                <tr>
                    <td width="30">No </td>
                    <th width="30">WEBMaster ID</th>
                    <th width="155">Name</th>
                    <th width="82">Mobile No</th>
                    <th width="151">Addrres</th>
                    <th width="81">User Name</th>
                    <th width="30">Delete</th>
                </tr>
                <tr>
                    <?php
                    $con = mysqli_connect("localhost", "root", "", "shoefactory");

                    if (!$con) {
                        die("Sorry, we are facing a terminal error");
                    }
                    $sql = "SELECT * FROM `webmaster`;";
                    $ID = 0;
                    $results = mysqli_query($con, $sql);
                    if (mysqli_num_rows($results) > 0) {
                        $count = 0;
                        while ($row = mysqli_fetch_assoc($results)) {
                            $count++;
                            echo "<form action='AdminMange.php' method='post'>";
                            echo "<tr><td>" . $count . "</td><td><input width='' type='text' readonly name='ID' class='form-control' value=" . $row["WebMID"] . "></td><td>" . $row["Name"] . "</td><td>" . $row["PhoneNumber"] . "</td><td>" . $row["Address"] . "</td><td>" . $row["UserName"] . "</td><td>" . "<button class='btnde' name='de'> Delete <i class='fas fa-trash-alt'></i></button>" . "</td></tr>";
                            echo "</form>";
                        }
                        echo "</table>";
                    } else {
                        echo "0 results";
                    }
                    mysqli_close($con);
                    ?>
                </tr>
            </tbody>
        </table>

        <?php
        if (isset($_POST['de'])) {

            $ID = $_POST['ID'];

            $con = mysqli_connect("localhost", "root", "", "shoefactory");

            if (!$con) {
                die("Sorry, we are facing a terminal error");
            }
            $sql = "DELETE FROM `webmaster` WHERE WebMID = '" . $ID . "' ";

            if (mysqli_query($con, $sql) > 0) {
                echo "<meta http-equiv=\"refresh\" content=\"0;URL=/IT20768676/ShoeFactory-WebSite/BackEnd/AdminMange.php\">";
            } else {
                echo "<br><center><b> Error! <br> Try again Later!</b></center><br>";
            }
            mysqli_close($con);
        }
        ?>
<br><br>
</body>

</html>