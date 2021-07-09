<?php session_start();

if (isset($_SESSION["AdminUM"])) {
	header('Location: BackEnd/Dashboard.php');
}

?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Login</title>

	<!--CSS Files-->
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<link rel="shortcut icon" href="images/Icon.png">

	<style>
		input[type=text],
		input[type=password],
		input[type=file] {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			box-sizing: border-box;
		}
	</style>

	<!--FontAwsome CDN-->
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

	<!--JavaScript-->
	<script language="JavaScript" type="text/javascript" src="JSFile.js"></script>

	<!--Jquery CDN-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
		function valdateLogin() {
			var uName = document.getElementById('txtuname').value;

			var DN = uName.substring(0, 3);
			var x = uName.substring(4, 7);
			alert(DN);
			if ((DN == "Adm") && (uName.charAt(3) == '/') && (isNaN(x) == false) && (uName.charAt(7) == '@')) {
				<?php
				$User = "Adm";
				?>
			} else {
				<?php
				$User = "Cus";
				?>
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
	<form action="login.php" method="post">
		<table width="324" height="268" border="0" align="center">
			<tr>
				<td width="294">
					<p class="imgcontainer"><img src="Images/post-696x436-brands.jpg" alt="Avatar" width="73%" height="214" class="avatar" /></p>
					<div class="container">
						<p class="SignLink" align="center">Not a member <a class="LinkBut" href="SignUp.php">SignUp! <i class="fas fa-user-plus"></i></a></p>
						<p>
							<label for="uname"><b>Username</b></label>
							<input type="text" placeholder="Enter Username" name="txtuname" id="txtuname" required>

							<label for="psw"><b>Password</b></label>
							<input type="password" placeholder="Enter Password" name="txtpassword" required autocomplete="off">
						</p>
						<p>
							<?php
							if (($User = "Cus")) {
								if ((isset($_POST["btnsubmit"])) && ($User = "Cus")) {
									$Username = $_POST["txtuname"];
									$password = $_POST["txtpassword"];

									$con = mysqli_connect("localhost", "root", "", "shoefactory");
									if (!$con) {
										die("Sorry, we are facing a terminal error");
									}

									$sql = "SELECT * FROM customer WHERE Cus_Email='" . $Username . "' and Password='" . $password . "';";

									$results = mysqli_query($con, $sql);

									if (mysqli_num_rows($results) > 0) {
										$sql2 = "SELECT count(Product_ID) FROM `searchandbuy` WHERE Cus_Email='" . $Username . "';";
										$cartCount = mysqli_query($con, $sql2);

										mysqli_close($con);

										if (mysqli_num_rows($cartCount) > 0) {
											$CartNo = mysqli_fetch_assoc($cartCount);
											$_SESSION["carItemC"] = $CartNo['count(Product_ID)'];
											$_SESSION["UserName"] = $Username;
											$User = "";
											header('Location:index.php');
										} else {
											echo "<br><center><b>The Entered values are wrong <br> Enter the Values again!</b></center><br>";
										}
									} else {
										echo "<br><center><b>The Entered values are wrong <br> Enter the Values again!</b></center><br>";
									}
								}
							}
							?>

							<?php
							if ($User = "Adm") {
								if ((isset($_POST["btnsubmit"])) && ($User = "Adm")) {
									$Username = $_POST["txtuname"];
									$password = $_POST["txtpassword"];

									$con = mysqli_connect("localhost", "root", "", "shoefactory");
									if (!$con) {
										die("Sorry, we are facing a terminal error");
									}

									$sql = "SELECT * FROM `webmaster` WHERE UserName='" . $Username . "' and Password='" . $password . "';";

									$results = mysqli_query($con, $sql);

									if (mysqli_num_rows($results) > 0) {
										$_SESSION["AdminUM"] = $Username;
										$User = "";
										header('Location: BackEnd/Dashboard.php');
									} else {
										echo "<br><center><b>The Entered values are wrong <br> Enter the Values again!</b></center><br>";
									}
								}
							}
							?>
						</p>

						<button type="submit" class="Aclass" name="btnsubmit" onClick="">Login</button> <label>
							<input type="checkbox" checked="checked" name="cnkremember"> Remember me</label>
					</div>
					<div class="container" style="background-color:#f1f1f1">
						<button type="reset" onclick="document.getElementById('id01').style.display='none'" class="Aclass cancelbtn">Cancel</button>
						<span class="psw">Forgot <a href="#">password?</a></span>
					</div>&nbsp;
				</td>
			</tr>
		</table>
		</td>
		</tr>
		</tbody>
		</table>
	</form>
</body>

</html>