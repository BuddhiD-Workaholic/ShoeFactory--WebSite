<?php
session_start();

if (isset($_SESSION['UserName'])) {
} else {
	header('Location:login.php');
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
	<link rel="stylesheet" type="text/css" href="CSS/SignUpCSS.css">
	<link rel="shortcut icon" href="images/Icon.png">

	<!--FontAwsome CDN-->
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

	<!--Jquery CDN-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!--JavaScript-->
	<script language="JavaScript" type="text/javascript" src="JSFile.js"></script>
</head>

<script>
	//Email Address.	
	function validateEmail() {
		var email = document.getElementById("txtEmail").value;
		var at = email.indexOf("@");
		var dt = email.lastIndexOf(".");
		var lengthEmial = email.length;

		if ((at < 2) || (dt - at < 2) || (lengthEmial - dt < 2)) {
			alert("Please enter a valid email address");
			return false;
		} else {
			return true;
		}
	}

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

	//DOB.
	function ValidateDOB() {
		var cureentY = (new Date()).getFullYear();
		var DOBY = (new Date(Date.parse(document.getElementById("txtDate").value))).getFullYear();
		var Age = cureentY - DOBY;

		if (Age >= 16) {
			return true;
		} else {
			alert("Your not eligible to crete a account your Age is: " + Age);
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

		if (ValidatePassword() && ValidatePhoneNo() && ValidateDOB() && validateEmail()) {

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
		height: 200px;
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
	<!--NavigationBar Starts-->
	<?php
	if (isset($_SESSION['UserName'])) {
		require_once './Includes/HeaderLogedIn.php';
	} else {
		require_once './Includes/Header.php';
	}
	?>
	<!--NavigationBar Ends-->
	<br><br>
	<?php
	$con = mysqli_connect("localhost", "root", "", "shoefactory");
	if (!$con) {
		die("Sorry, we are facing a terminal error");
	}

	$sql = "SELECT * FROM `customer` WHERE Cus_Email ='" . $_SESSION['UserName'] . "'";

	$image = '';
	$currentPassword = '';
	$Gender = '';
	$password = '';

	$results = mysqli_query($con, $sql);
	if (mysqli_num_rows($results) > 0) {
		$row = mysqli_fetch_assoc($results);
		$image = $row['ProfilePicture'];
		$currentPassword = $row['Password'];
		$Gender = $row['Gender'];
		$password = $row['Password'];
	?>

		<table width="771" height="496" border="0" align="center">
			<form action="EditProfile.php" method="post" enctype="multipart/form-data">
				<tbody>
					<tr>
						<td>Profile Picture</td>
						<td>
							<p class="imgcontainer"><img style="border: 2px solid black" src="<?php echo $row['ProfilePicture']; ?>" alt="Profile Picture" width="300" height="300" /></p>
						</td>
					</tr>
					<tr>
						<td width="184">Fist Name</td>
						<td width="344"><input type="text" name="txtFisrtName" id="txtFisrtName" value="<?php echo $row['First_Name']; ?>" autofocus>
						</td>
					</tr>
					<tr>
						<td>Last Name</td>
						<td><input type="text" name="txtLastName" id="txtLastName" value="<?php echo $row['Second_Name']; ?>">
						</td>
					</tr>
					<tr>
						<td>Email</td>
						<td><input type="email" readonly name="txtEmail" id="txtEmail" value="<?php echo $row['Cus_Email']; ?>">
						</td>
					</tr>
					<tr>
						<td>Mobile Phone No</td>
						<td><input type="text" name="textMobileNo" id="textMobileNo" placeholder=" 07" value="<?php echo $row['MobileNumber']; ?>">
						</td>
					</tr>
					<tr>
						<td height="75">Address </td>
						<td><textarea name="textadress" id="textadress"><?php echo $row['Address']; ?></textarea>
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
					</tr>
					<tr>
						<td>Gender </td>
						<td><input type="radio" name="radio" id="radio1" value="Male">
							<label for="radio">Male
								<input type="radio" name="radio" id="radio2" value="Female">
								Female
								<input type="radio" name="radio" id="radio3" value="Other">
								Other </label>
							<p><b><?php echo $row['Gender']; ?> is selected!</b></p>
						</td>
					</tr>
					<tr>
						<td>Date of Birth</td>
						<td><input type="date" name="txtDate" id="txtDate" max="2014-12-31" min="1950-12-31" value="<?php echo $row['DOB']; ?>">
						</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>
							<p></p>
						</td>
					</tr>
					<tr>
						<td>Add a new profile picture</td>
						<td> <input type="file" name="fileImage" id="fileImage" />
							<p>Your current profile picture will get deleted once you added a new picture!</p>
						</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><br>
							<p></p>
						</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><input type="submit" class="Aclass" name="submit" id="submit" value="Update" onClick="validateAll()">
							<div class="container" style="background-color:#f1f1f1">
								<input type="reset" class="cancelbtn" name="reset" id="reset" value="Reset"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Terms And Conditions Apply.
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

		$FirstName = $_POST["txtFisrtName"];
		$LastName = $_POST["txtLastName"];
		$Email = $_POST["txtEmail"];
		$Contact = $_POST["textMobileNo"];
		$Adress = $_POST["textadress"];
		$DOB = $_POST["txtDate"];

		if (is_uploaded_file($_FILES['fileImage']['tmp_name'])) {
			$image = "Uploads/" . basename($_FILES["fileImage"]["name"]);
			move_uploaded_file($_FILES["fileImage"]["tmp_name"], $image);
		}

		if ((isset($_POST["txtPassword"])) && (($_POST["txtPassword"]) != null)) {
			$Password = $_POST["txtPassword"];
		} else {
			$Password = $currentPassword;
		}
		if (isset($_POST["radio"])) {
			$Gender = $_POST["radio"];
		}

		$con = mysqli_connect("localhost", "root", "", "shoefactory");

		if (!$con) {
			die("Sorry, we are facing a terminal error");
		}

		$sql1 = "UPDATE `customer` SET `Cus_Email` = '" . $Email . "', `MobileNumber` = '" . $Contact . "', `First_Name` = '" . $FirstName . "', `Second_Name` = '" . $LastName . "', `ProfilePicture` = '" . $image . "', `Gender` = '" . $Gender . "', `DOB` = '" . $DOB . "', `Password` = '" . $Password . "' WHERE `customer`.`Cus_Email` = '" . $_SESSION['UserName'] . "';";

		if (mysqli_query($con, $sql1) > 0) {
			echo " <div class='popup' id='popup-1'>
      <div class='overlay'></div>
      <div class='content'>
        <div class='close-btn' onclick='togglePopup()'>×</div>
        <h1>Congratulations</h1>
        <p>Your Account is Updated!</p>
		<p align='center'><button class='paybtn' onclick='togglePopup()'>&nbsp;&nbsp; Okay &nbsp;&nbsp;</button></p>
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
			  <p align='center'><button class='paybtn' onclick='togglePopup()'>&nbsp;&nbsp; Okay &nbsp;&nbsp;</button></p>
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