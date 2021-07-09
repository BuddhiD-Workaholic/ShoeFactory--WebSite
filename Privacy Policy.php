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

  <style type="text/css">
    div.panel {
      display: none;
      text-align: justify;
      background: #555;
      color: #ffffff;
    }

    .flip {
      cursor: pointer;
      text-transform: capitalize;
      text-align: justify;
      color: #F8F8F8;
      background: #282828;
    }

    div.panel,
    p.flip {
      line-height: 30px;
      margin: auto;
      font-size: 16px;
      padding: 5px;
      border: solid 1px #666;
      border-radius: 3px;
      user-select: none;
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
  <br>
  <!--PrivacyPloicy Starts-->
  <div class="card-wrapper">
    <br>

    <p id="flip6" class="flip"> <b>&nbsp;&nbsp;01 &nbsp;&nbsp;</b> Security</p>
    <div id="panel6" class="panel" style="display: none;">
      <p>The Customer is solely responsible in all respects for all use of and for protecting the
        confidentiality of any e-mail verification or other information relating to the Customer's order that
        may be given. The Customer may not share such information or transfer such information to any
        third parties. The Customer must notify Event Protect immediately if he/she becomes aware of any
        breach of security regarding this website. </p>
    </div>
    <br>

    <p id="flip4" class="flip"> <b>&nbsp;&nbsp;02 &nbsp;&nbsp;</b> Terms of use </p>
    <div id="panel4" class="panel" style="display: none;">
      <p>2.1 The Customers registration and any and all benefits attached thereto is non-transferable within
        the scheme and Event Protect will not offer any refunds or replacements in the event of loss or
        theft </p>
      <p>2.2 The Customers entitlements will be activated at registration and will be valid for use at Venues
        and Retailers for the period of each offer and/or the specific contract entered into between Event
        Protect and the Customer. Event Protect may rescind membership of the scheme at any time
        providing any specific contracts between the customer and Event Protect for goods and/or services
        have been fulfilled. A day is deemed to end at midnight. Event Protect is not bound or required to
        give notice of expiry or to accept any renewal request. </p>
      <p>2.3 Registration entitles the Customer to membership of the scheme in order to avail themselves
        of those offers of goods/services provided by the retailer/partner from time to time</p>
      <p>2.4 When there are multiple tickets or goods/services are requested / purchased / delivered, these
        tickets, goods/services are subject to separate and individual contracts determined at the time of
        purchase. </p>
      <p>2.5 By registering the Customer agrees to accept these terms and conditions and will ensure that
        all other persons included when accepting an offer of a good/service adhere to these terms and
        conditions as though such other persons were a party to these terms and conditions.</p>
    </div>
    <br>

    <p id="flip2" class="flip"> <b>&nbsp;&nbsp;03 &nbsp;&nbsp;</b> Nature of this Website</p>
    <div id="panel2" class="panel" style="display: none;">
      <p>This website is a place for the Customer to obtain information about products and services that it
        provides. Event Protect also provides online facilities for purchasing those goods and services.
        Please note that this website is available only to individuals that can form legally binding contracts
      </p>
    </div>
    <br>

    <p id="flip5" class="flip"> <b>&nbsp;&nbsp;04 &nbsp;&nbsp;</b> Information provided by the Customer</p>
    <div id="panel5" class="panel" style="display: none;">
      <p>4.1 The following applies to any information provided by the Customer to Event Protect:-
        - The Customer authorises the use, storage or otherwise processing any personal information
        which relates to and identifies the Customer, including but not limited to the Customer's name and
        address, to the extent reasonably necessary to provide the services which are available through
        this website by Event Protect its partners, successors, associates, sub-contractors or other third
        parties (together the 'Partner Companies') and for marketing purposes of Event Protect always
        subject always to the Privacy Policy. <br>
        - If the Customer sends personal correspondence such as e-mails or letters to Event Protect then
        Event Protect may collect this information into a file specific to the Customer (together, the various
        purposes set out in this paragraph and in the Privacy Policy shall be known as 'the Purposes'). All
        such information collected by Event Protect shall be referred to in these terms and conditions as
        'Personal Information'. <br>
        - The Customer must ensure that the Personal Information provided is accurate and complete and
        that registration details (where applicable) contain the Customer's correct name, address and other
        requested details. For more information about how Event Protect deals with Customers' Personal
        Information please read the Privacy Policy</p>
      <p>4.2 The Customer warrants and undertakes that it will not use this website for any purpose that is
        illegal or prohibited by these terms and conditions, including without limitation the posting or
        transmitting of any libellous, defamatory, inflammatory or obscene material. If the Customer
        breaches these terms and conditions then permission to use this website terminates immediately without the necessity of any notice being given. Event Protect retains the right to deny access to
        any person who fails to comply with these terms and conditions.</p>
    </div>
    <br>

    <p id="flip3" class="flip"> <b>&nbsp;&nbsp;05 &nbsp;&nbsp;</b> Purchasing Goods and Services from this Website</p>
    <div id="panel3" class="panel" style="display: none;">
      <p>5.1 To register in order to purchase goods or services now or in the future the Customer will need
        to follow the registering procedures set out on the "Register Your Details" page. For goods and/or
        services details of prices are set out on this website and procedures for payment and delivery are
        set out below.</p>
      <p>5.2 The Customer must pay by credit or debit card at the time of the order. The price of the goods/
        service is the price in force at the date and time of the order. Event Protect tries to ensure that its
        prices displayed on this website are accurate but the price on the order will need to be validated by
        Event Protect or the seller (if not Event Protect) as part of the acceptance procedure. Event Protect
        will inform the Customer if the price of the goods/service is higher than that stated in the
        Customer's order and the Customer may cancel the order and decide whether or not to purchase
        the goods/service at the correct price. </p>
      <p>5.3 Event Protect is entitled to refuse any order placed by the Customer. If the order is accepted,
        Event Protect will confirm acceptance to the Customer by e-mail to the e-mail address that has
        been given by the Customer and the contract between the Customer and Event Protect is then
        formed. The goods/service will then be delivered to the postal address provided by the Customer
        or to an agreed collection point. For those goods/services offered by partners/retailers the contract
        shall be formed between the Customer and partner/retailer and Event Protect accepts no liability
        for loss associated with such a contract. </p>
    </div>
    <br>

    <p id="flip1" class="flip"> <b>&nbsp;&nbsp;06 &nbsp;&nbsp;</b> STANDARD TERMS AND CONDITIONS FOR USE OF THIS WEBSITE</p>
    <div id="panel1" class="panel" style="display: none;">
      <p>6. Introduction</p>
      Please read these terms and conditions carefully, they contain important information about the
      Customer's (Your) rights and obligations. These terms and conditions can be printed by clicking on
      the print icon on the browser.
      <p>6.1 Definitions:
        Event Protect means Event Protect Limited; registered in England under Company Number
        10090344. <br>

        "the Retailers/Partners" means the retailers/partners that participate in any offer made by Event
        Protect ; and
        “the Venues" means those venues that provide various attractions offered (including both free
        attractions as well as attractions normally requiring an admission fee). </p>
      <p>6.2 Please read these terms and conditions carefully before using the website. In particular, the
        Customer's attention is drawn to clauses 8 (Applicability of online materials) and 12 (Liability). By
        accessing and making use of the website ("this website") the Customer agrees to be legally bound
        by these terms and conditions as they may be modified and posted on this website from time to
        time. These terms and conditions take effect from the date when the Customer first accesses this
        website. </p>
      <p>6.3 If the Customer does not wish to be bound by these terms and conditions in full then he/she
        may not use this website </p>
    </div>
    <br>

    <p id="flip7" class="flip"> <b>&nbsp;&nbsp;07 &nbsp;&nbsp;</b> STANDARD TERMS AND CONDITIONS FOR USE OF Sessions</p>
    <div id="panel7" class="panel" style="display: none;">
      <p>7. Introduction</p>
      Please read these terms and conditions carefully, they contain important information about the
      Customer's (Your) rights and obligations. These terms and conditions can be printed by clicking on
      the print icon on the browser.
      <p>7.1 Definitions:
        Event Protect means Event Protect Limited; registered in England under Company Number
        10090344. <br>

        "the Retailers/Partners" means the retailers/partners that participate in any offer made by Event
        Protect ; and
        “the Venues" means those venues that provide various attractions offered (including both free
        attractions as well as attractions normally requiring an admission fee). </p>
      <p>7.2 Please read these terms and conditions carefully before using the website. In particular, the
        Customer's attention is drawn to clauses 8 (Applicability of online materials) and 12 (Liability). By
        accessing and making use of the website ("this website") the Customer agrees to be legally bound
        by these terms and conditions as they may be modified and posted on this website from time to
        time. These terms and conditions take effect from the date when the Customer first accesses this
        website. </p>
      <p>7.3 If the Customer does not wish to be bound by these terms and conditions in full then he/she
        may not use this website </p>
    </div>
    <br>

    <p id="flip8" class="flip"> <b>&nbsp;&nbsp;08 &nbsp;&nbsp;</b> STANDARD TERMS AND CONDITIONS FOR USE OF Cookies</p>
    <div id="panel8" class="panel" style="display: none;">
      <p>8. Introduction</p>
      Please read these terms and conditions carefully, they contain important information about the
      Customer's (Your) rights and obligations. These terms and conditions can be printed by clicking on
      the print icon on the browser.
      <p>8.1 Definitions:
        Event Protect means Event Protect Limited; registered in England under Company Number
        10090344. <br>

        "the Retailers/Partners" means the retailers/partners that participate in any offer made by Event
        Protect ; and
        “the Venues" means those venues that provide various attractions offered (including both free
        attractions as well as attractions normally requiring an admission fee). </p>
      <p>8.2 Please read these terms and conditions carefully before using the website. In particular, the
        Customer's attention is drawn to clauses 8 (Applicability of online materials) and 12 (Liability). By
        accessing and making use of the website ("this website") the Customer agrees to be legally bound
        by these terms and conditions as they may be modified and posted on this website from time to
        time. These terms and conditions take effect from the date when the Customer first accesses this
        website. </p>
      <p>8.3 If the Customer does not wish to be bound by these terms and conditions in full then he/she
        may not use this website </p>
    </div>
    <br>

  </div>
  <!--PrivacyPloicy Ends-->
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

</body>

</html>