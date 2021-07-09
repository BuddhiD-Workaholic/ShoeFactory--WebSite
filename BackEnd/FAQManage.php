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
		<br><h3>Insert Prodcucts <a class="addbtn" href="InsertFAQ.php">Click Here <i class="fas fa-plus"></i></a></h3>
		<h1 align="center">FAQ Manage</h1>
		<table width="1149" border="1" id="customersData">
			<tbody>
				<tr>
					<td width="22">No </td>
					<th width="22">ID </th>
					<th width="318">Question</th>
					<th width="318">Answer</th>
					<th width="20">Update</th>
					<th width="20">Delete</th>
				</tr>
				<tr>
					<?php
					$con = mysqli_connect("localhost", "root", "", "shoefactory");

					if (!$con) {
						die("Sorry, we are facing a terminal error");
					}
					$sql = "SELECT * FROM `faq`";

					$results = mysqli_query($con, $sql);
					if (mysqli_num_rows($results) > 0) {
						$count = 0;
						while ($row = mysqli_fetch_assoc($results)) {
							$count++;
							echo "<form action='FAQManage.php' method='post'>";
							echo "<tr><td>" . $count . "</td><td> <input type='text' readonly name='ID' class='form-control' value=" . $row["ID"] . "></td><td>  <textarea rows='6' cols='70' class='form-control' name='txtQ'>" . $row["FAQ"] . "</textarea></td><td> <textarea rows='6' cols='70' class='form-control' name='txtA'>" . $row["Answer"] . "</textarea></td><td>" . "<button name='sub' class='paybtn'> Update <i class='fas fa-edit'></button>" . "</td><td>" . "<button name='de' class='btnde' style='background-color:Tomato;'> Delete  <i class='fas fa-trash-alt'></i></button>" . "</td></tr>";
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
		if (isset($_POST['sub'])) {

			$ID = $_POST['ID'];
			$Q = $_POST['txtQ'];
			$A = $_POST['txtA'];

			$con = mysqli_connect("localhost", "root", "", "shoefactory");

			if (!$con) {
				die("Sorry, we are facing a terminal error");
			}
			$sql = "UPDATE `faq` SET `FAQ` = '" . $Q . "', `Answer` = '" . $A . "' WHERE `faq`.`ID` = '" . $ID . "';";

			if (mysqli_query($con, $sql) > 0) {
				echo "<meta http-equiv=\"refresh\" content=\"0;URL=/IT20768676/ShoeFactory-WebSite/BackEnd/FAQManage.php\">";
			} else {
				echo "<br><center><b> Error! <br> Try again Later!</b></center><br>";
			}
			mysqli_close($con);
		}
		?>

		<?php
		if (isset($_POST['de'])) {

			$ID = $_POST['ID'];

			$con = mysqli_connect("localhost", "root", "", "shoefactory");

			if (!$con) {
				die("Sorry, we are facing a terminal error");
			}
			$sql = "DELETE FROM `faq` WHERE ID = '" . $ID . "' ";
			if (mysqli_query($con, $sql) > 0) {
				echo "<meta http-equiv=\"refresh\" content=\"0;URL=/IT20768676/ShoeFactory-WebSite/BackEnd/FAQManage.php\">";
			} else {
				echo "<br><center><b> Error! <br> Try again Later!</b></center><br>";
			}
			mysqli_close($con);
		}
		?>
<br><br>
	</div>
</body>

</html>