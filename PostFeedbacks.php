<?php
session_start();

if (isset($_SESSION['UserName'])) {
} else {
	header('Location:login.php');
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
	<link rel="stylesheet" type="text/css" href="CSS/">
	<link rel="shortcut icon" href="images/Icon.png">

	<!--FontAwsome CDN-->
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

	<!--Jquery CDN-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!--JavaScript-->
	<script language="JavaScript" type="text/javascript" src="JSFile.js"></script>
	<style>
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
			background: white;
			border-color: #40E0D0;
			width: 95%;
			max-width: 500px;
			height: 340px;
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

	<!--PurchaseHistory-->
	<br><br>
	<div class="card-wrapper">
		<center>
			<h3 style=" margin:0px 0px 20px 0px; font-size: 28px;">Post Feedbacks</h3>
		</center>
		<table width="1149" height="126" border="1" id="customersData">
			<tbody>
				<tr>
					<th width="54">Product Name</th>
					<th width="113">Brand Name</th>
					<th width="86">Price</th>
					<th width="86">Quantity</th>
					<th width="86">Size</th>
					<th width="86">Product Image</th>
					<th width="62">Post Product</th>
				</tr>
				<tr>
					<?php

					$Oid = 0;

					$pid = 0;
					$con = mysqli_connect("localhost", "root", "", "shoefactory");
					if (!$con) {
						die("Cannot connect to DB server");
					}

					$sql0 = "SELECT * FROM `ordertable` WHERE Cus_Email ='" . $_SESSION['UserName'] . "' AND  Order_ID in (select Order_ID from addedto Where FeedbackS = 0 );";
					$count = 1;
					$result0 = mysqli_query($con, $sql0);
					if (mysqli_num_rows($result0) > 0) {
						while ($re = mysqli_fetch_assoc($result0)) {
							$sql = "SELECT * FROM `addedto` WHERE FeedbackS = 0 AND Order_ID  = '" . $re['Order_ID'] . "';";
							echo "<tr><td><b>No:</b> " . $count . "</td><td><b>Order ID: </b>" .  $re['Order_ID'] . "</td><td><b>Total Payment: </b>Rs: " .  $re['PayAmount'] . ".00</td><td><b>Shipping Date: </b>" . $re['ShippingDate'] . "</td><td>&nbsp;</td></tr>";
							$count++;
							$result = mysqli_query($con, $sql);
							if (mysqli_num_rows($result) > 0) {
								while ($Fed = mysqli_fetch_assoc($result)) {
									$sql2 = "SELECT * FROM `product` WHERE Product_ID = '" . $Fed['Product_ID'] . "' ";
									$result2 = mysqli_query($con, $sql2);
									if (mysqli_num_rows($result2) > 0) {
										$ProdData = mysqli_fetch_assoc($result2);
										$Oid = $Fed['CarOrderID'];
										echo "<tr><td>"  . $ProdData["PName"] . "</td><td>" . $ProdData["BrandName"] . "</td><td>Rs: " . $ProdData["Price"] . ".00</td><td>" .  $Fed["Quantity"] . "</td><td>" . $Fed["Size"] . "</td><td> <center><img width='100px' height='120px' src='"  . $ProdData["MainImg"] . "'></center> </td><td>" . "<a class='paybtn' href='PostFeedbacks.php?Pid=" . $Fed['Product_ID'] . "'>Post Feedback &nbsp;<i class='fas fa-comment-medical'></i></a>" . "</td></tr>";
									}
								}
							}
						}
					} else {
						echo "<center><b>No Orders Yet!</b></center>";
					}
					mysqli_close($con);
					?>
				</tr>
			</tbody>
		</table>
	</div>
	<br><br>
	<?php

	if (isset($_GET['Pid'])) {
		$pidc = $_GET['Pid'];
		echo "<div class='popup' id='popup-1'>
		<div class='overlay'></div>
		<div class='content'>
			<div class='close-btn' onclick='togglePopup()'>×</div>
			<h1>Enter the Feedback</h1>
			<form action='PostFeedbacks.php' method='post'>
				<div class='form-outline mb-4' data-toggle='tooltip' title='Message'>
					<textarea rows='6' cols='70' class='form-control' id='txtMessage' name='txtMessage' rows='4' cols='20'></textarea>
					<input type='hidden' name='txtpid' value=" . $pidc . ">
				</div>
					<input type='submit' class='Aclass' name='submit' id='submit' value='Submit'> 
					<button type='reset' class='cancelbtn'>Cancel</button>
			</form>
		</div>
	</div>";

		echo "<script>
    function togglePopup() {
      document.getElementById('popup-1').classList.toggle('active');
    }
    togglePopup();
	</script>";
	}
	?>

	<?php
	if (isset($_POST["submit"])) {

		$Message = $_POST["txtMessage"];
		$pidG = $_POST["txtpid"];


		$con = mysqli_connect("localhost", "root", "", "shoefactory"); //Sql database connection

		if (!$con) //We are cheking whther the conection is sucessful
		{
			die("Sorry, we are facing a terminal error");
		}

		$sql = "INSERT INTO `feedback`(`FeedBackID`, `Discription`, `Cus_Email`, `Product_ID`) VALUES (NULL,'" . $Message . "','" . $_SESSION['UserName'] . "','" . $pidG . "')";

		if (mysqli_query($con, $sql) > 0) {

			$sql2 = "UPDATE `addedto` SET `FeedbackS` = '1' WHERE `addedto`.`CarOrderID` = '" . $Oid . "' ;";
			if (mysqli_query($con, $sql2) > 0) {
				echo "<meta http-equiv=\"refresh\" content=\"0;URL=PostFeedbacks.php\">";
			} else {
				echo "<center><br><br><h2><b>Error!</b></h2><br><br></center>";
			}
		} else {
			echo "<center><br><br><h2><b>Error!</b></h2><br><br></center>";
		}

		mysqli_close($con);
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

</body>

</html>