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
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
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
			text-align: left;
			background-color: #003;
			color: white;
		}
	</style>
</head>

<body>

 <!--Heander Starts-->
 <nav>
    <div class="navigationBar">
      <ul class="meanu">
        <li><a href="BackEnd/Dashboard.php">Dashboard</a></li>
        <li><a href="BackEnd/CustomerManage.php">User Manage</a></li>
        <li><a href="BackEnd/AdminMange.php">webmaster Manage</a></li>
        <li><a href="BackEnd/ProductManage.php">Product Manage</a></li>
        <li><a href="BackEnd/OrderManage.php">Order Manage</a></li>
        <li><a href="BackEnd/FAQManage.php">FAQ Manage</a></li>
        <li><a href="BackEnd/NewsLater.php">NewsLater</a></li>
      </ul>
      <div class="Right_M">
        <form action="BackEnd/Dashboard.php" method="post">
          <a href="UserAccount.php"><i class="fas fa-user"></i>My Account</a>
          <button class="BClass" type="submit" name="Logout">Log Out</button>
        </form>
      </div>
    </div>
  </nav>
  <!--Heander Ends-->

	<!--PurchaseHistory-->
	<br>
	<div class="card-wrapper">
		<center>
			<h3 style=" margin:0px 0px 20px 0px; font-size: 28px;">Order Data</h3>
		</center>
		<table width="1149" border="1" id="customersData">
			<tbody>
				<tr>
					<th width="54">Product Name</th>
					<th width="113">Brand Name</th>
					<th width="86">Price</th>
					<th width="86">Quantity</th>
					<th width="86">Size</th>
					<th width="86">Product Image</th>
				</tr>
				<tr>
					<?php
					$con = mysqli_connect("localhost", "root", "", "shoefactory");
					if (!$con) {
						die("Cannot connect to DB server");
					}

					$sql0 = "SELECT * FROM `ordertable` WHERE Order_ID ='" . $_GET["Oid"] . "';";

					$result0 = mysqli_query($con, $sql0);
					if (mysqli_num_rows($result0) > 0) {
						while ($re = mysqli_fetch_assoc($result0)) {
							$sql = "SELECT * FROM `addedto` WHERE Order_ID  = '" . $re['Order_ID'] . "';";
							$result = mysqli_query($con, $sql);
							echo "<tr><b><td><b>Order ID: </b>" .  $re['Order_ID'] . "</td><td><b>Total Payment: </b>Rs: " .  $re['PayAmount'] . ".00</td><td><b>Order Date: </b>" . $re['OrderDate'] . "</td><td><b>Shipping Date: </b>" . $re['ShippingDate'] . "</td></tr>";
							if (mysqli_num_rows($result) > 0) {
								while ($Fed = mysqli_fetch_assoc($result)) {
									$sql2 = "SELECT * FROM `product` WHERE Product_ID = '" . $Fed['Product_ID'] . "' ";

									$result2 = mysqli_query($con, $sql2);
									if (mysqli_num_rows($result2) > 0) {
										$ProdData = mysqli_fetch_assoc($result2);
										echo "<tr><td>" . $ProdData["PName"] . "</td><td>" . $ProdData["BrandName"] . "</td><td>Rs: " . $ProdData["Price"] . ".00</td><td>" . $Fed["Quantity"] . "</td><td>" . $Fed["Size"] . "</td><td> <center> <img width='100px' height='120px' src='" . $ProdData["MainImg"] . "'</center></td></tr>";
									}
								}
							}
						}
					}
					mysqli_close($con);
					?>
				</tr>
			</tbody>
		</table>
	</div>
	<br><br>
</body>

</html>