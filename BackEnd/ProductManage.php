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
		<br>
		<h3>Insert Prodcucts <a class="addbtn" href="../BackEndPODataInsert.php">Click Here <i class="fas fa-plus"></i></a></h3>
		<h1 align="center">Product Details</h1>
	</div>
	<table align="center" border="1" id="customersData">
		<tbody>
			<tr>
				<td width="34">No </td>
				<th width="66">Product ID</th>
				<th width="159">Product Name</th>
				<th width="20">Quantity</th>
				<th width="96">Brand Name</th>
				<th width="100">Price</th>
				<th width="82">Feedbacks</th>
				<th width="89">Items Soled</th>
				<th width="1000">Details</th>
				<th width="30">Update</th>
				<th width="30">Delete</th>
			</tr>
			<tr>
				<?php
				$con = mysqli_connect("localhost", "root", "", "shoefactory");

				if (!$con) {
					die("Sorry, we are facing a terminal error");
				}

				$sql = "SELECT * FROM `product`";

				$results = mysqli_query($con, $sql);
				if (mysqli_num_rows($results) > 0) {
					$count = 0;
					while ($row = mysqli_fetch_assoc($results)) {
						$count++;
						echo "<form action='ProductManage.php' method='post'>";
						echo "<tr><td>" . $count . "</td><td><input type='text' readonly name='PID' value='" . $row["Product_ID"] . "'</td><td>" . $row["PName"] . "</td><td>" . $row["Quantity"] . "</td><td>" . $row["BrandName"] . "</td><td> Rs:" . $row["Price"] . ".00</td><td>" . "<a href='DisplayFeedBack.php?Pid=" . $row["Product_ID"] . "' class='opbtn'> Open <i class='fas fa-external-link-alt'></i></a>"  . "</td><td>" . "Items Soled" . "</td><td><textarea rows='4' cols='120'>" . $row["Details"] . "</textarea></td><td>" . "<a href='../BackEndPODataUpdate.php?Pid=" . $row["Product_ID"] . "' class='paybtn'> Update <i class='fas fa-external-link-alt'></a>" . "</td><td>" . "<button name='de' class='btnde'> Delete  <i class='fas fa-trash-alt'></i></button>" . "</td></tr>";
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

		$OID = $_POST['PID'];

		$con = mysqli_connect("localhost", "root", "", "shoefactory");

		if (!$con) {
			die("Sorry, we are facing a terminal error");
		}
		$sql = "DELETE FROM `product` WHERE Product_ID = '" . $OID . "'";
		if (mysqli_query($con, $sql) > 0) {
			echo "<meta http-equiv=\"refresh\" content=\"0;URL=/IT20768676/ShoeFactory-WebSite/BackEnd/ProductManage.php\">";
		} else {
			echo "<br><center><b> Error! <br> Try again Later!</b></center><br>";
		}
		mysqli_close($con);
	}
	?>
	<br>
	<br>
</body>

</html>