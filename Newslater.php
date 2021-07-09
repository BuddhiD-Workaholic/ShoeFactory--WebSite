<?php

if (isset($_POST["Sub"])) {
	$Email = $_POST["emailSuB"];

	$con = mysqli_connect("localhost", "root", "", "shoefactory"); //Sql database connection

	if (!$con) //We are cheking whther the conection is sucessful
	{
		die("Sorry, we are facing a terminal error");
	}

	$sql = "INSERT INTO `wneewslater`(`Email`) VALUES ('" . $Email . "');";

	if (mysqli_query($con, $sql) > 0) {
		header('Location:index.php?Message=1');
	} else {
		header('Location:index.php?Message=0');
	}

	mysqli_close($con);
}
