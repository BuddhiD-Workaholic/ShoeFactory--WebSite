<?php
session_start();

if (isset($_SESSION['UserName'])) {
} else {
	header('Location:login.php');
}

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
		/*Modal*/
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
			transform: translate(-50%, -50%) scale(0);
			background: #202020;
			width: 95%;
			max-width: 500px;
			height: 220px;
			z-index: 2;
			text-align: center;
			padding: 20px;
		}

		.popup .content h1 {
			color: white !important;
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
	<!--NavigationBar Starts-->
	<?php
	if (isset($_SESSION['UserName'])) {
		require_once './Includes/HeaderLogedIn.php';
	} else {
		require_once './Includes/Header.php';
	}
	?>
	<!--NavigationBar Ends-->

	<!--Trending Starts-->

	<div class="card-wrapper">
		<center>
			<?php
			echo "<form action='PayInvoive.php' method='post'>";
			$con = mysqli_connect("localhost", "root", "", "shoefactory");
			if (!$con) {
				die("Cannot connect to DB server");
			}
			$sq0 = "SELECT * FROM `searchandbuy` WHERE Cus_Email = '" . $_SESSION['UserName'] . "';";
			$re = mysqli_query($con, $sq0);
			if (mysqli_num_rows($re) > 0) {

				echo "<br><br>";
			} else {
				echo "<br><br>";
				echo "<h2><b>No items in your Shopping Cart!<br>Start adding items today...</b></h2>";
				echo "<br><br>";
			}
			mysqli_close($con);
			?>
			<table width="1000px" class="Invoice-Cart">
				<tbody>
					<tr>
						<th width="48">No</th>
						<th width="233">Name</th>
						<th width="214">&nbsp;</th>
						<th width="64">Size</th>
						<th width="124">Quantity</th>
						<th width="161">Price</th>
						<th width="124">&nbsp;</th>
					</tr>

					<tr>
						<td colspan="7">&nbsp;</td>
					</tr>

					<tr>
						<?php
						echo "<form action='PayInvoive.php' method='post'>";
						$con = mysqli_connect("localhost", "root", "", "shoefactory");
						if (!$con) {
							die("Cannot connect to DB server");
						}

						$sql = "SELECT * FROM `searchandbuy` WHERE Cus_Email = '" . $_SESSION['UserName'] . "';";
						$result = mysqli_query($con, $sql);
						$Tot = 0;

						if (mysqli_num_rows($result) > 0) {
							$No = 1;
							while ($Fed = mysqli_fetch_assoc($result)) {
								$sql2 = "SELECT * FROM `product` WHERE Product_ID = '" . $Fed['Product_ID'] . "' ";
								$result2 = mysqli_query($con, $sql2);

								if (mysqli_num_rows($result2) > 0) {
									$ProdData = mysqli_fetch_assoc($result2);

									$sql3 = "SELECT * FROM `searchandbuy` WHERE Product_ID='" . $ProdData['Product_ID'] . "' ";
									$result3 = mysqli_query($con, $sql3);
									if (mysqli_num_rows($result3) > 0) {
										$DC = mysqli_fetch_assoc($result3);
										
										$Multi=  $DC['Qty']*$ProdData['Price'];
										$Tot = $Tot + $Multi;
										echo "<input type='hidden' name='Pid[]' value='" . $ProdData['Product_ID'] . "'>";
										echo "<input type='hidden' name='Price[]' value='" . $ProdData['Price'] . "'>";
										echo "<tr><td>" . $No . "</td><td>" . $ProdData["PName"] . " | " . $ProdData["BrandName"] . "</td><td> <img width='120px' height='140px' src='" . $ProdData["MainImg"]  . "'</td><td>" . " <div class='purchase-info'> <input type='number' required name='size[]' value='" . $DC['Size'] . "'></div>" . "</td><td>"	. "<div class='purchase-info'> <input type='number' required name='Qty[]' value='" . $DC['Qty'] . "'> </div>" . "</td><td> RS: " .  $Multi . ".00</td><td>" . "<a href='PayInvoive.php?de=" . $ProdData['Product_ID'] . "' class='btnde'> Delete <i class='far fa-trash-alt'></i></a>" . "</td></tr>";
										$No++;
										echo "<tr><td colspan='7'>&nbsp;</td></tr>";
									}
								}
							}
							mysqli_close($con);
						}
						?>
					</tr>
				<tfoot>
					<tr>
						<td colspan="3"></td>
							<td colspan="2">Discount Amt <i class="fas fa-tags"></i></td>
							<td>
								<center align="right">Rs: 0.00</center>
							</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td colspan="3"></td>
							<td colspan="2">Shipping Fees <i class="fas fa-shipping-fast"></i></td>
							<td>
								<center align="right" style="color:lime;"> Free Shipping</center>
							</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td colspan="3"></td>
							<td colspan="2">Total Price</td>
							<td>
								<input type='hidden' name='Tot' value="<?php echo $Tot; ?>">
								<center align="right">Rs: <?php echo $Tot; ?>.00</center>
							</td>
						<td>&nbsp;</td>
					</tr>
				</tfoot>
				</tbody>
			</table>
		</center>
		<br><br>
		<!--Trending Ends-->

		<!--Modal-->
		<div class="popup" id="popup-1">
			<div class="overlay"></div>
			<div class="content">
				<h1>Do you Wish to Continue With the Payment Process..</h1>
				<p><button type="submit" name="submit" onclick="togglePopup()" class="paybtn">&nbsp;&nbsp; Yes &nbsp;&nbsp;</button>
					<button type="reset" onclick="togglePopup()" class="btnde">&nbsp;&nbsp; No &nbsp;&nbsp;</button>
				</p>
				</form>

			</div>
		</div>
		<p align="right"><button class="paybtn" onclick="togglePopup()">Pay <i class="fas fa-dollar-sign"></i></button></p>
	</div>

	<?php

if (isset($_GET['Message'])) {

  if ($_GET['Message'] == 0) {
	echo " <div class='popup' id='popup-2'>
  <div class='overlay'></div>
  <div class='content'>
	<div class='close-btn' onclick='togglePopup1()'>×</div>
	<h1>Congratulations!</h1>
	<p style='color:white; font-size:24px;'>Your Order is Placed &nbsp;<i class='fa fa-check' aria-hidden='true'></i></p>
	<p align='center'><button class='paybtn' onclick='togglePopup1()'>&nbsp;&nbsp; Okay &nbsp;&nbsp;</button></p>
	</div>
</div>";

	echo "<script>
  function togglePopup1() {
	document.getElementById('popup-2').classList.toggle('active');
  }
  togglePopup1();
  </script>";
  }
}
?>

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

	<script>
		function togglePopup() {
			document.getElementById('popup-1').classList.toggle('active');
		}
	</script>
</body>

</html>