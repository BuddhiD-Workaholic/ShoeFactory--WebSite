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
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<link rel="stylesheet" type="text/css" href="CSS/DS.css" />
	<link rel="stylesheet" type="text/css" href="CSS/SignUpCSS.css" />
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

		.card-wrapp {
			max-width: 1150px;
			margin: 0 auto;
		}

		.product-img {
			height: 500px;
			width: 600px;
			margin: 0px 0px 0px 0px;
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
	<div class="card-wrapp">
		<br>
		<?php
		if (isset($_GET['Pid'])) {

			$con = mysqli_connect("localhost", "root", "", "shoefactory");
			if (!$con) {
				die("Sorry, we are facing a terminal error");
			}

			$sql = "SELECT * FROM `product` WHERE Product_ID = '" . $_GET['Pid'] . "'";

			$MImage = '';
			$Img1 = '';
			$Img2 = '';
			$Img3 = '';
			$i1 = '';
			$i2 = '';
			$i3 = '';
			$PID = $_GET['Pid'];

			$results = mysqli_query($con, $sql);
			if (mysqli_num_rows($results) > 0) {
				$row = mysqli_fetch_assoc($results);

				$sql1 = "SELECT * FROM `productimg` WHERE Product_ID = '" . $_GET['Pid'] . "'";
				$results1 = mysqli_query($con, $sql1);
				if (mysqli_num_rows($results) > 0) {
					$MImage = $row['MainImg'];
					$count = 1;
					while ($img = mysqli_fetch_assoc($results1)) {
						switch ($count) {
							case 1:
								$Img1 = $img['ImgData'];
								$i1 = $img['ImgData'];
								break;
							case 2:
								$Img2 = $img['ImgData'];
								$i2 = $img['ImgData'];
								break;
							case 3:
								$Img3 = $img['ImgData'];
								$i3 = $img['ImgData'];
								break;
							default:
								echo "";
						}
						$count++;
					}
				}
			}
			$dql = "SELECT * FROM `category` WHERE Product_ID ='" . $_GET['Pid'] . "'";
			$lts = mysqli_query($con, $dql);

			mysqli_close($con);
		}
		?>
		<table align="right" width="538" border="0">
			<form action="BackEndPODataUpdate.php?Pid=<?php echo $PID; ?>" method="post" enctype="multipart/form-data">
				<tbody>
					<tr>
						<td width="134">Product Name</td>
						<td width="444"><input type="text" name="txtName" id="txtName" value="<?php echo $row['PName']; ?>" required autofocus>
						</td>
					</tr>
					<tr>
						<td>Quantity</td>
						<td><input type="text" name="Quantity" id="Quantity" value="<?php echo $row['Quantity']; ?>" required>
						</td>
					</tr>
					<tr>
						<td>Brand Name</td>
						<td><input type="text" name="BrandName" id="BrandName" value="<?php echo $row['BrandName']; ?>" required>
						</td>
					</tr>
					<tr>
						<td>Deatils</td>
						<td><textarea rows="12" type="text" name="textDeta" id="textDeta" required><?php echo $row['Details']; ?></textarea>
							<b>In order to add Line breaks use: &nbsp; &lt;br&gt;</b>
						</td>
					</tr>
					<tr>
						<td height="75">Price </td>
						<td><input type="text" name="textPrice" placeholder="RS: " value="<?php echo $row['Price']; ?>" required>
						</td>
					</tr>
					<tr>
						<td>Main Image</td>
						<td><input type="file" name="txtMImage" id="txtMImage">
						</td>
					</tr>
					<tr>
						<td>Image 01</td>
						<td><input type="file" name="txtI1" id="txtI1">
						</td>
					</tr>
					<tr>
						<td>Image 02</td>
						<td><input type="file" name="txtI2" id="txtI2">
						</td>
					</tr>
					<tr>
						<td>Image 03</td>
						<td><input type="file" name="txtI3" id="txtI3">
						</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;
						</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><input type="submit" class="Aclass" name="submit" id="submit" value="Submit">
							<div class="container" style="background-color:#f1f1f1">
								<center> <button type="reset" class="Aclass cancelbtn">Cancel</button></center>
							</div>&nbsp;
						</td>
						</td>
					</tr>
				</tbody>
			</form>
		</table>

		<?php
		if (isset($_POST['submit'])) {

			$Name = $_POST['txtName'];
			$Quan = $_POST['Quantity'];
			$BrandN = $_POST['BrandName'];
			$Data = $_POST['textDeta'];
			$Price = $_POST['textPrice'];

			$con = mysqli_connect("localhost", "root", "", "shoefactory");
			if (!$con) {
				die("Sorry, we are facing a terminal error");
			}

			if (is_uploaded_file($_FILES['txtMImage']['tmp_name'])) {
				$MImage = "Uploads/" . basename($_FILES["txtMImage"]["name"]);
				move_uploaded_file($_FILES["txtMImage"]["tmp_name"], $MImage);
			}

			if (is_uploaded_file($_FILES['txtI1']['tmp_name'])) {
				$Img1 = "Uploads/" . basename($_FILES["txtI1"]["name"]);
				move_uploaded_file($_FILES["txtI1"]["tmp_name"], $Img1);
			}

			if (is_uploaded_file($_FILES['txtI2']['tmp_name'])) {
				$Img2 = "Uploads/" . basename($_FILES["txtI2"]["name"]);
				move_uploaded_file($_FILES["txtI2"]["tmp_name"], $Img2);
			}

			if (is_uploaded_file($_FILES['txtI3']['tmp_name'])) {
				$Img3 = "Uploads/" . basename($_FILES["txtI3"]["name"]);
				move_uploaded_file($_FILES["txtI3"]["tmp_name"], $Img3);
			}

			$sql = "UPDATE `product` SET `PName` = '" . $Name . "', `Quantity` = '" . $Quan . "', `BrandName` = '" . $BrandN . "', `Details` = '" . $Data . "', `Price` = '" . $Price . "', `MainImg` = '" . $MImage . "' WHERE `product`.`Product_ID` = '" . $PID . "'";
			if (mysqli_query($con, $sql) > 0) {
				$sql1 = "UPDATE `productimg` SET `ImgData` = '" . $Img1 . "' WHERE `productimg`.`ImgData` = '" . $i1 . "' AND `productimg`.`Product_ID` = '" . $PID . "';";
				if (mysqli_query($con, $sql1) > 0) {
					$sql2 = "UPDATE `productimg` SET `ImgData` = '" . $Img2 . "' WHERE `productimg`.`ImgData` = '" . $i2 . "' AND `productimg`.`Product_ID` = '" . $PID . "';";
					if (mysqli_query($con, $sql2) > 0) {
						$sql3 = "UPDATE `productimg` SET `ImgData` = '" . $Img3 . "' WHERE `productimg`.`ImgData` = '" . $i3 . "' AND `productimg`.`Product_ID` = '" . $PID . "';";
						if (mysqli_query($con, $sql3) > 0) {
							echo " <div class='popup' id='popup-1'>
      <div class='overlay'></div>
      <div class='content'>
        <div class='close-btn' onclick='togglePopup()'>×</div>
        <h1>Congratulations</h1>
        <p>Product is Updated!</p>
        </div>
    </div>";
						} else {
							$EData = mysqli_error($con);
							echo " <div class='popup' id='popup-1'>
        <div class='overlay'></div>
        <div class='content'>
          <div class='close-btn' onclick='togglePopup()'>×</div>
          <h1>Error</h1>
          <p>Check the Image Data $EData and Try again!</p>
          </div>
      </div>";
						}
					}
				}
			} else {
				$EData = mysqli_error($con);
				echo " <div class='popup' id='popup-1'>
        <div class='overlay'></div>
        <div class='content'>
          <div class='close-btn' onclick='togglePopup()'>×</div>
          <h1>Error</h1>
          <p>Check the Product Dat/ $EData and Try again!</p>
          </div>
      </div>";
			}
		}
		?>
		<div class="product-img">
			<div class="img-display">
				<div class="img-showcase">
					<img class="imgP" src="<?php echo $MImage; ?>" alt="Error">
					<?php
					echo "<img class='imgP' src='" . $Img1 . "' alt='Error'>";
					echo "<img class='imgP' src='" . $Img2 . "' alt='Error'>";
					echo "<img class='imgP' src='" . $Img3 . "' alt='Error'>";
					?>
				</div>
			</div>
			<div class="img-select">
				<?php
				echo "<div class='img-item'>
           <a href='#' data-id='1'>
             <img class='imgP' src='" . $MImage . "' alt='Error'>
           </a>
         </div>";
				echo "<div class='img-item'>
                <a href='#' data-id='2'>
                  <img class='imgP' src='" . $Img1 . "'alt='Error'>
                </a>
              </div>";
				echo "<div class='img-item'>
			  <a href='#' data-id='3'>
				<img class='imgP' src='" . $Img2 . "'alt='Error'>
			  </a>
			</div>";
				echo "<div class='img-item'>
			<a href='#' data-id='4'>
			  <img class='imgP' src='" . $Img3 . "'alt='Error'>
			</a>
		  </div>";
				?>
			</div>
			<br>
			<h3 align="center">Add Categories: <button class="addbtn" onclick="togglePopup1()"><i class="fas fa-plus"></i></button></h3>
			<br>
			<div class='popup' id='popup-2'>
				<div class='overlay'></div>
				<div class='content'>
					<div class='close-btn' onclick='togglePopup1()'>×</div>
					<form action="BackEndPODataUpdate.php?Pid=<?php echo $PID; ?>" method="post">
						<p style='color:white; margin-top:0px; font-size:24px;'>Add Categories Here: <input type="text" required autocomplete="off" name="Catgorey"></p>
						<button type="submit" class="paybtn" name="subCat">Add</button>
					</form>
				</div>
			</div>
			<?php
			if (isset($_POST['subCat'])) {

				$catego = $_POST['Catgorey'];

				$con = mysqli_connect("localhost", "root", "", "shoefactory");
				if (!$con) {
					die("Sorry, we are facing a terminal error");
				}

				$sql = "INSERT INTO `category`(`Product_ID`, `Category`) VALUES ('" . $PID . "','" . $catego . "')";
				if (mysqli_query($con, $sql) > 0) {
					echo "<meta http-equiv=\"refresh\" content=\"0;URL=BackEndPODataUpdate.php?Pid=$PID\">";
				} else {
					$EData = mysqli_error($con);
					echo "Error! Please try again Later!:" . $EData;
				}
				mysqli_close($con);
			}
			?>

			<?php
			if (mysqli_num_rows($lts) > 0) {
				$CNo = 1;
				echo "<b>Added Categories: </b><br>";
				while ($Cat = mysqli_fetch_assoc($lts)) {
					echo $CNo . ").  " . $Cat['Category'] . " | &nbsp;&nbsp;&nbsp;&nbsp;";
					$CNo++;
				}
			} else {
				echo "<b>No Categories are Added!</b>";
			}
			?>

			<br><br>
		</div>
	</div>

	<script>
		const imgs = document.querySelectorAll('.img-select a');
		const imgBtns = [...imgs];
		let imgId = 1;

		imgBtns.forEach((imgItem) => {
			imgItem.addEventListener('click', (event) => {
				event.preventDefault();
				imgId = imgItem.dataset.id;
				slideImage();
			});
		});

		function slideImage() {
			const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;

			document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
		}

		window.addEventListener('resize', slideImage);


		function togglePopup() {
			document.getElementById('popup-1').classList.toggle('active');
		}
		togglePopup();

		function togglePopup1() {
			document.getElementById('popup-2').classList.toggle('active');
		}
	</script>
</body>

</html>