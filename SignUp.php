<?php 
session_start(); 

if (isset($_SESSION["AdminUM"])) {
	header('Location: BackEnd/Dashboard.php');
  }

?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Sign Up</title>

	<!--CSS File-->
	<link rel="stylesheet" type="text/css" href="CSS/SignUpCSS.css">
	<link rel="shortcut icon" href="images/Icon.png">

	<!--FontAwsome CDN-->
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

	<!--Jquery CDN-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!--JavaScript-->
	<script language="JavaScript" type="text/javascript" src="JSFile.js"></script>
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
			var pwd1 = document.getElementById("txtPassword").value;
			var pwdc = document.getElementById("txtCpassword").value;

			if ((pwd1 == pwdc) && (pwd1.length >= 8) && (pwd1.length <= 10)) {
				return true;
			} else {
				alert("Please enter the correct password with minimum of 8 charcters and Maximum of 10 Characters");
				return false;
			}
		}

		//Gender.
		function validateOPtions() {
			if ((document.getElementById("radio1").checked) || (document.getElementById("radio2").checked) || (document.getElementById("radio3").checked)) {
				return true;
			} else {
				alert("Please select one option in Gender");
				return false;
			}
		}

		function validateAll() {

			if (validateOPtions() && ValidatePassword() && ValidatePhoneNo() && ValidateDOB() && validateEmail()) {

				<?php
				$SesState = "True";  //The data will only be transfered to the database when the inputs are properly valid  
				?>

			} else {
				event.preventDefault();
				alert("Error! \n Please check the Input values again");
			}
		}
	</script>

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
	<table align="center" width="538" border="0">
		<form action="SignUp.php" method="post">
			<tbody>
				<tr>
					<td colspan="2">
						<p class="imgcontainer"><img src="Images/post-696x436-brands.jpg" alt="Avatar" width="50%" height="227" class="avatar" /></p><br>
					</td>
				</tr>
				<tr>
					<td width="184">Fist Name</td>
					<td width="344"><input type="text" name="txtFisrtName" id="txtFisrtName" required autofocus>
					</td>
				</tr>
				<tr>
					<td>Last Name</td>
					<td><input type="text" name="txtLastName" id="txtLastName" required>
					</td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type="email" name="txtEmail" id="txtEmail" required>
					</td>
				</tr>
				<tr>
					<td>Mobile Phone No</td>
					<td><input type="text" name="textMobileNo" id="textMobileNo" placeholder=" 07" required>
					</td>
				</tr>
				<tr>
					<td height="75">Address </td>
					<td><textarea name="textadress" id="textadress" required></textarea>
					</td>
				</tr>
				<tr>
					<td>Password </td>
					<td><input type="password" name="txtPassword" id="txtPassword" pattern="{10,20}" placeholder="Paswword length must be 8 - 10" autocomplete="off" required>
					</td>
				</tr>
				<tr>
					<td>Confirm Password</td>
					<td><input type="password" name="txtCpassword" id="txtCpassword" pattern="{10,20}" placeholder="Paswword length must be 8 - 10" required autocomplete="off">
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
					</td>
				</tr>
				<tr>
					<td>Date of Birth</td>
					<td><input type="date" name="txtDate" id="txtDate" max="2014-12-31" min="1950-12-31" required>
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><br>
						<p>
							<input type="checkbox" checked="checked" name="chkNewsUpdate" id="chkNewsUpdate"> Yes, I want to receive the latest ShoeFactory offers and product News.
						</p><br>
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><input type="submit" class="Aclass" name="submit" id="submit" value="Submit" onClick="validateAll()">
						<div class="container" style="background-color:#f1f1f1">
							<button type="reset" onclick="document.getElementById('id01').style.display='none'" class="Aclass cancelbtn">Cancel</button><span class="psw">T and C Apply!</span>
						</div>&nbsp;
					</td>
					</td>
				</tr>
			</tbody>
		</form>
	</table>
	<br>
	<?php
	if ((isset($_POST["submit"])) && (isset($SesState))) {
		$FirstName = $_POST["txtFisrtName"];
		$LastName = $_POST["txtLastName"];
		$Email = $_POST["txtEmail"];
		$Contact = $_POST["textMobileNo"];
		$Adress = $_POST["textadress"];
		$DOB = $_POST["txtDate"];
		$Password = $_POST["txtPassword"];
		$CPassword = $_POST["txtCpassword"];
		$Gender = $_POST["radio"];
		$val = 0; //Initially the cart total price will get equal to 0

		if (isset($_POST["chkNewsUpdate"])) {
			$Status = "1";
		} else {
			$Status = "0";
		}

		$con = mysqli_connect("localhost", "root", "", "shoefactory"); 

		if (!$con)
		{
			die("Sorry, we are facing a terminal error");
		}

		$sql = "INSERT INTO `customer`(`Cus_Email`, `MobileNumber`, `Address`, `First_Name`, `Second_Name`, `Gender`, `DOB`, `Password`, `Status`)VALUES('" . $Email . "','" . $Contact . "','" . $Adress . "','" . $FirstName . "','" . $LastName . "','" . $Gender . "','" . $DOB . "','" . $Password . "','" . $Status . "');";

		$results = mysqli_query($con, $sql); 

		if (mysqli_query($con, $sql) > 0) {
			echo "<meta http-equiv=\"refresh\" content=\"0;URL=SignUp.php\">";
		} else {
			echo "The Entered value is wrong Enter the Values again!";
		}

		mysqli_close($con);
	}
	?>
	<br>
</body>

</html>