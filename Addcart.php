<?php

session_start();

if (isset($_POST["sub"])) {

	if (isset($_SESSION["UserName"])) {

		$PID = $_POST["Pid"];
		$Size = $_POST["si"];
		$Qty = $_POST["qty"];

		$con = mysqli_connect("localhost", "root", "", "shoefactory");
		if (!$con) {
			die("Sorry, we are facing a terminal error");
		}

		$sq = "INSERT INTO `searchandbuy`(`Cus_Email`, `Product_ID`, `Size`, `Qty`) VALUES ('" . $_SESSION['UserName'] . "','" . $PID . "','" . $Size . "','" . $Qty . "');";
		if (mysqli_query($con, $sq) > 0) {
			$sq2 = "SELECT count(Product_ID) FROM `searchandbuy` WHERE Cus_Email='" . $_SESSION['UserName'] . "';";

			$cartCount = mysqli_query($con, $sq2);
			mysqli_close($con);

			if (mysqli_num_rows($cartCount) > 0) {
				$CartNo = mysqli_fetch_assoc($cartCount);
				$_SESSION["carItemC"] = $CartNo['count(Product_ID)'];

				header('Location: ProdcutData.php?Message=0&Pid='.$PID);

			} else {
				echo "<script> alert('The Entered values are wrong Enter the Values again!'); location.href = 'ProdcutData.php?Pid='".$PID."'';</script>";
			}
		} else {
			echo "<script> alert('This Following item is alredy in your Cart!'); location.href = 'ProdcutData.php?Pid= '".$PID."'' </script>";
		}
	} else {	
		echo '<script type="text/javascript">
		alert("Please Login or Signup!"); 
		<!--
			location.href = "login.php";
		//-->
		</script>';

	}
}
