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
  <link rel="shortcut icon" href="../Images/AdminIcon.png">

  <!--FontAwsome CDN-->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

  <!--Jquery CDN-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!--JavaScript-->
  <script language="JavaScript" type="text/javascript" src="JSFile.js"></script>

</head>

<body>
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
  </style>
  <!--Heander Starts-->
  <nav>
    <div class="navigationBar">
      <ul class="meanu">
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




    <table width="908" height="225" align="center">
      <tbody>
        <tr>
          <td colspan="2">
            <div class="main-section">
              <div class="dashbord dashbord-orange">
                <div class="icon-section"> <br />
                  <img src="../images/userprof.png" alt="" width="87" height="90" />
                  <p>&nbsp;</p>
                </div>
                <div class="detail-section"> <a href="CustomerManage.php">User Manage</a></div>
              </div>
              <div class="dashbord dashbord-red">
                <div class="icon-section"> <br />
                  <img src="../images/Adminprof.png" alt="" width="87" height="90" />
                  <p>&nbsp;</p>
                </div>
                <div class="detail-section"> <a href="AdminMange.php">WEBMaster Manage</a></div>
              </div>
              <div class="dashbord dashbord-green">
                <div class="icon-section"> <br />
                  <img src="../images/shopping-bag-flat.png"="" width="87" height="90" />
                  <p>&nbsp;</p>
                </div>
                <div class="detail-section"> <a href="ProductManage.php">Product Manage</a></div>
              </div>
              <div class="dashbord dashbord-blue">
                <div class="icon-section"> <br />
                  <img src="../images/b3.png" alt="" width="87" height="90" />
                  <p>&nbsp;</p>
                </div>
                <div class="detail-section"> <a href="OrderManage.php">Order Manage</a></div>
              </div>
              <div class="dashbord dashbord-skyblue">
                <div class="icon-section"> <br />
                  <img src="../images/p.png" alt="" width="87" height="90" />
                  <p>&nbsp;</p>
                </div>
                <div class="detail-section"> <a href="FAQManage.php">FAQ Manage</a></div>
              </div>
              <div class="dashbord dashbord-skyblue">
                <div class="icon-section"> <br />
                  <img src="../images/email-newsletter.png" alt="" width="87" height="90" />
                  <p>&nbsp;</p>
                </div>
                <div class="detail-section"> <a href="NewsLater.php">Weekly News Later</a></div>
              </div>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <!--UserAccounts Ends-->

  <?php
  if (isset($_POST["Logout"])) {
    session_destroy();
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=/IT20768676/ShoeFactory-WebSite/index.php\">";
  }
  ?>

</body>

</html>