<?php
session_start();

if (isset($_SESSION["AdminUM"])) {
  header('Location: BackEnd/Dashboard.php');
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

  <!--SearchBox Starts-->
  <br>
  <form action="DisplayProduts.php" method="get">
    <div align="center" class="search_wrap">
      <div class="search_box">
        <input type="text" class="input" id="Search" autofocus placeholder="search..." name="Search">
        <div class="btn btn_common">
          <button type="submit" class="btn" id="" onClick="SearchE()" name=""><i class="fas fa-search"></i></button>
        </div>
      </div>
    </div>
  </form>
  <br>
  <!--SearchBox Ends-->
  <?php
  if (isset($_GET['Pid'])) {

    $con = mysqli_connect("localhost", "root", "", "shoefactory");
    if (!$con) {
      die("Cannot connect to DB server");
    }

    $sql = "SELECT * FROM `product` WHERE Product_ID = '" . $_GET['Pid'] . "'";

    $result1 = mysqli_query($con, $sql);
    $result2 = 0;

    if (mysqli_num_rows($result1) > 0) {
      $row = mysqli_fetch_assoc($result1);

      $sql2 = "SELECT ImgData FROM `productimg` WHERE Product_ID = '" . $_GET['Pid'] . "'";
      $result2 = mysqli_query($con, $sql2);
      if (mysqli_num_rows($result2) > 0) {
      }

      $sql3 = "SELECT * FROM `feedback` WHERE Product_ID = '" . $_GET['Pid'] . "' AND Discription != 'Empty'";
      $result3 = mysqli_query($con, $sql3);
      if (mysqli_num_rows($result3) > 0) {
      }

      $sql4 = "SELECT ImgData FROM `productimg` WHERE Product_ID = '" . $_GET['Pid'] . "'";
      $result4 = mysqli_query($con, $sql4);
      if (mysqli_num_rows($result4) > 0) {
      }

      mysqli_close($con);
    }
  } else {
    header('Location:index.php');
  }
  ?>
  <!--Data Starts-->

  <div class="card-wrapper">
    <div class="card">
      <!-- card left -->
      <div class="product-imgs">
        <div class="img-display">
          <div class="img-showcase">
            <img class="imgP" src="<?php echo $row['MainImg']; ?>" alt="Error">
            <?php
            while ($Img2 = mysqli_fetch_assoc($result2)) {
              echo "<img class='imgP' src='" . $Img2['ImgData'] . "' alt='Error'>";
            }
            ?>
          </div>
        </div>
        <div class="img-select">
          <?php
          echo "<div class='img-item'>
           <a href='#' data-id='1'>
             <img class='imgP' src='" . $row['MainImg'] . "' alt='Error'>
           </a>
         </div>";
          $ac = 2;
          while ($Img3 = mysqli_fetch_assoc($result4)) {
            echo "<div class='img-item'>
                <a href='#' data-id='$ac'>
                  <img class='imgP' src='" . $Img3['ImgData'] . "'alt='Error'>
                </a>
              </div>";
            $ac++;
          }
          ?>
        </div>
      </div>
      <!-- card right -->
      <div class="product-content">
        <h2 class="product-title"><?php echo $row['PName']; ?> | <?php echo $row['BrandName']; ?> </h2>
        <div class="product-price">
          <p class="new-price">Price: <span>Rs: <?php echo $row['Price']; ?>.00</span></p>
        </div>

        <div class="product-detail">
          <h2>about this item: </h2>
          <p><?php echo $row['Details'] ?></p>
          <ul>
            <li>Quantity Available: <span><?php echo $row['Quantity']; ?></span></li>
            <li>Brand Name: <span><?php echo $row['BrandName']; ?></span></li>
            <li>Shipping Area: <span>Only inside Sri Lanka.</span></li>
            <li>Shipping Fee: <span>Free</span></li>
          </ul>
        </div>

        <div class="purchase-info">
          <form action="Addcart.php" method="post">
            <input type="hidden" id="Pid" name="Pid" value="<?php echo $_GET['Pid']; ?>">
            &nbsp; Qty: <input name="qty" id="qty" type="number" min="0" value="1"> &nbsp;
            US Size: <input name="si" id="si" type="number" min="5" max="14" value="6">
            <br>
            <button name="sub" type="submit" class="btn AddBasket">Add to Cart <i class="fas fa-shopping-cart"></i></button>
            <button name="sub" type="submit" class="btn AddBasket">Buy Now</button>
          </form>
        </div>
      </div>
    </div>

    <?php

if (isset($_GET['Message'])) {

  if ($_GET['Message'] == 0) {
	echo " <div class='popup' id='popup-2'>
  <div class='overlay'></div>
  <div class='content'>
	<div class='close-btn' onclick='togglePopup1()'>×</div>
	<p style='color:white; font-size:24px;'>This product is Added to the Cart! <br> <a style='color:red' href='ShopingCart.php'> Visit Basket </a></i></p>
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

    <div class="product-detail">
      <h2>Cutomer Feedbacks</h2>
      <?php
      if (mysqli_num_rows($result3) > 0) {
      } else {
        writeMsg();
      }
      function writeMsg()
      {
        echo "<center><h3><b>No Feedbacks found!</b></h3></center>";
      }
      $f = 1;
      while ($Fed = mysqli_fetch_assoc($result3)) {
        echo "<p><b> $f </b>)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $Fed['Discription'] . "</p> <hr>";
        if ($f == 8) {
          break;
        }
        $f++;
      }
      ?>
    </div>
  </div>
  </div>
  <!--Data Ends-->
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
  </script>

</body>

</html>