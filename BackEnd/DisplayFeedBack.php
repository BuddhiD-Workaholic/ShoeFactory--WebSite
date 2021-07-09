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
    <link rel="shortcut icon" href="../Images/AdminIcon.png">

    <!--FontAwsome CDN-->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <!--Jquery CDN-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!--JavaScript-->
    <script language="JavaScript" type="text/javascript" src="JSFile.js"></script>

    <style>
        html,
        body,
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

        #customersData tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customersData tr:hover {
            background-color: #ddd;
        }

        #customersData th {
            text-align: left;
            background-color: #003;
            color: white;
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

     <!--Product_ID Feedbacks-->
    <?php
        if (isset($_GET['Pid'])) {
            echo " <center><br><h1>Feedbacks</h1><br></center>";
            $con = mysqli_connect("localhost", "root", "", "shoefactory");
            if (!$con) {
                die("Cannot connect to DB server");
            }

            $sql3 = "SELECT * FROM `feedback` WHERE Product_ID = '" . $_GET['Pid'] . "'  AND Discription != 'Empty' ";
            $result3 = mysqli_query($con, $sql3);
            mysqli_close($con);

            if (mysqli_num_rows($result3) > 0) {
                $f=1;
                while ($Fed = mysqli_fetch_assoc($result3)) {
                    echo "<p><b> $f </b>)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $Fed['Discription'] . "</p> <hr>";
                    $f++;
                }
            } else {
                echo "<center><h2><b>No Feedbacks Yet!</b></h2></center>";
            }
        }
        ?>

        <!--Order_ID Feedbacks-->
        <?php
        if (isset($_GET['Oid'])) {
            echo " <center><br><h1>Order feedbacks</h1><br></center>";
            $con = mysqli_connect("localhost", "root", "", "shoefactory");
            if (!$con) {
                die("Cannot connect to DB server");
            }

            $sql3 = "SELECT * FROM `feedback` WHERE Product_ID in (SELECT Product_ID FROM `addedto` WHERE Order_ID = '" . $_GET['Oid'] . "') AND Discription != 'Empty';";
            $result3 = mysqli_query($con, $sql3);
            mysqli_close($con);

            if (mysqli_num_rows($result3) > 0) {
                $f=1;
                while ($Fed = mysqli_fetch_assoc($result3)) {
                    echo "<p><b> $f </b>)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $Fed['Discription'] . "</p> <hr>";
                    $f++;
                }
            } else {
                echo "<center><h2><b>No Feedbacks yet!</b></h2></center>";
            }
        }
        ?>
    </div>
</body>

</html>