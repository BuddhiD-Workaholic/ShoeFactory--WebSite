<?php session_start(); ?>

<?php
if (isset($_GET['de'])) {

    $con = mysqli_connect("localhost", "root", "", "shoefactory");

    if (!$con) {
        die("Sorry, we are facing a terminal error");
    }

    $sql = "DELETE FROM `searchandbuy` WHERE Product_ID='" . $_GET['de'] . "' AND Cus_Email = '" . $_SESSION['UserName'] . "'";
    if (mysqli_query($con, $sql) > 0) {

        $sql2 = "SELECT count(Product_ID) FROM `searchandbuy` WHERE Cus_Email='" . $_SESSION['UserName'] . "';";
        $cartCount = mysqli_query($con, $sql2);
        if (mysqli_num_rows($cartCount) > 0) {
            $CartNo = mysqli_fetch_assoc($cartCount);
            $_SESSION["carItemC"] = $CartNo['count(Product_ID)'];

            echo "<meta http-equiv=\"refresh\" content=\"0;URL=/IT20768676/ShoeFactory-WebSite/ShopingCart.php\">";
        }
    } else {
        echo "<br><center><b> Error! <br> Try again Later!</b></center><br>";
        echo "<br><center> Click Here to go back to <a href='index.php' class=''> Home Page </a></center><br>";
    }
    mysqli_close($con);
}
?>

<?php
if (isset($_POST['submit'])) {

    $Tot = $_POST['Tot'];

    $date = date_create(date("Y/m/d"));
    $ODate = date_format($date, "Y-m-d");
    date_add($date, date_interval_create_from_date_string("14 days"));
    $SDate = date_format($date, "Y-m-d");

    $con = mysqli_connect("localhost", "root", "", "shoefactory");

    if (!$con) {
        die("Sorry, we are facing a terminal error");
    }

    $sql = "INSERT INTO `ordertable`(`Order_ID`, `Cus_Email`, `PayAmount`, `PaymentStatus`, `OrdertrackingStatus`, `OrderDate`, `ShippingDate`) VALUES (NULL,'" . $_SESSION['UserName'] . "','" . $Tot . "','1','Not Delivered','" . $ODate . "','" . $SDate . "');";
    if (mysqli_query($con, $sql) > 0) {
        $OID = mysqli_insert_id($con);

        $no = count($_REQUEST['Pid']);
        for ($i = 0; $i < $no; $i++) {

            $PID = $_REQUEST['Pid'][$i];
            $Size = $_REQUEST['size'][$i];
            $Price = $_REQUEST['Price'][$i];
            $Qty = $_REQUEST['Qty'][$i];

            $sql2 = "INSERT INTO `addedto`(`CarOrderID`, `Order_ID`, `Product_ID`, `Quantity`, `Size`, `TotPrice`, `FeedbackS`) VALUES (NULL,'" . $OID . "','" . $PID . "','" . $Qty . "','" . $Size . "','" . $Price . "','0')";
            if (mysqli_query($con, $sql2) > 0) {

                $sql3 = "DELETE FROM `searchandbuy` WHERE Product_ID='" . $PID . "' AND Cus_Email = '" . $_SESSION['UserName'] . "'";
                if (mysqli_query($con, $sql3) > 0) {

                    $sql4 = "INSERT INTO `feedback`(`FeedBackID`, `Discription`, `Cus_Email`, `Product_ID`) VALUES (NULL,'Empty','" . $_SESSION['UserName'] . "','" . $PID . "')";
                    if (mysqli_query($con, $sql4) > 0) {

                        $sql5 = "SELECT count(Product_ID) FROM `searchandbuy` WHERE Cus_Email='" . $_SESSION['UserName'] . "';";
                        $cartCount = mysqli_query($con, $sql5);
                        if (mysqli_num_rows($cartCount) > 0) {
                            $CartNo = mysqli_fetch_assoc($cartCount);
                            $_SESSION["carItemC"] = $CartNo['count(Product_ID)'];

                            echo "<meta http-equiv=\"refresh\" content=\"0;URL=/IT20768676/ShoeFactory-WebSite/ShopingCart.php?Message=0\">";
                        }
                    } else {
                        echo "<br><center><b> Error! <br> Try again Later!</b></center><br>";
                        echo "<br><center> Click Here to go back to <a href='index.php' class=''> Home Page </a></center><br>";
                    }
                } else {
                    echo "<br><center><b> Error! <br> Try again Later!</b></center><br>";
                    echo "<br><center> Click Here to go back to <a href='index.php' class=''> Home Page </a></center><br>";
                }
            } else {
                echo "<br><center><b> Error! <br> Try again Later!</b></center><br>";
                echo "<br><center> Click Here to go back to <a href='index.php' class=''> Home Page </a></center><br>";
            }
        }
    } else {
        echo "<br><center><b> Error! <br> Try again Later!</b></center><br>";
        echo "<br><center> Click Here to go back to <a href='index.php' class=''> Home Page </a></center><br>";
    }
    mysqli_close($con);
}
?>


