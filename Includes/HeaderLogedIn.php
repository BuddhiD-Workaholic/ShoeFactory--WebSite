<?php 
$num=$_SESSION["carItemC"];
?>
<style>
.BClass{
border-radius: 32px;
color: #fff!important;
background-color: #000!important;
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
.BClass:hover{
color: #0b9d8a;
transition: all ease 0.3s;	
}
</style>
<!--NavBar Starts-->
    <nav>
        <div class="navigationBar">
        <a href="#" class="Logoimg">
            <img src="Images/Logo.jpg" alt="Logo" width="48" height="54">
        </a>
        <ul class="meanu">
             <li><a href="index.php">Home</a></li>
            <li><a href="Contact Us.php">Contact Us</a></li>
            <li><a href="Privacy Policy.php">Privacy Policy</a></li>
            <li><a href="FAQ.php">FAQ</a></li>
        </ul>
        <div class="Right_M">
		<form action="index.php" method="post">
            <a href="UserAccount.php"><i class="fas fa-user"></i>My Account</a>&nbsp;&nbsp;&nbsp;&nbsp;
			<button class="BClass" id="Logout" name="Logout">Log Out</button>
            <a href="ShopingCart.php"><i class="fas fa-shopping-cart">
            <span class="numP_Cart"> <?php $r=$_SESSION["carItemC"]; echo $r;?></span></i>
            </a>
		</form>	
        </div>
        </div>
    </nav>
<!--NavBar Ends-->