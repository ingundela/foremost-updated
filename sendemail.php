<?php
    $msg = "";
  use PHPMailer\PHPMailer\PHPMailer;
  include_once "PHPMailer/PHPMailer.php";
  include_once "PHPMailer/Exception.php";
  include_once "PHPMailer/SMTP.php";

  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    if (isset($_FILES['attachment']['name']) && $_FILES['attachment']['name'] != "") {
      $file = "attachment/" . basename($_FILES['attachment']['name']);
      move_uploaded_file($_FILES['attachment']['tmp_name'], $file);
    } else
      $file = "";

    $mail = new PHPMailer();

    $mail->addAddress('info@foremost.co.mz');
    $mail->name = $name;
    $mail->setFrom($email, $name);
    $mail->Subject = $subject;
    $mail->isHTML(true);
    $mail->Body = $message;
    $mail->addAttachment($file);

    if ($mail->send())
        $msg = "Thank you for submiting your Email!";
    else
        $msg = "Please try again!";

    unlink($file);
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--Google verification-->
    <meta name="google-site-verification" content="vAXOM-C5EUGGIwrxTNowJclsNz2vX4n1x9oochtq--s" />
    <title>Foremost - One Source</title>
    <meta name="description" content="SBmozmedia is a Web Development Agency based in Mozambique. We make affordable websites. We provide custom designs, development, maintenance and more. Call +258 321 2622">
    <meta name="keywords" content="Web Development Mozambique, Digital Marketing Mozambique, Affordable Websites Mozambique, Virtual Shop Mozambique, Domain Registration Mozambique, IT Consulting Mozambique, Website Quotes Mozambique, Development Agency Mozambique">
    <link rel="canonical" href="https://www.sbmozmedia.com/">
    <meta property="og:title" content="Get in touch">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://sbmozmedia.com/sendemail.php">
    <meta property="og:site_name" content="SBmozmedia">
    <link rel="shortcut icon" type="image/png" href="img/sb-favicon.png"></head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
      
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> 
  </head>
  <body>
     <!--top header-->
        <header">
          <!--most top info -->
          <div class="top-menu">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-8">
                  <ul class="left list-unstyled">
                     <li><i class="far fa-phone"></i> Tel: +258 84 241 4202</li>
                     <li><i class="far fa-envelope-open"></i> Email: info@foremost.co.mz</li>
                    
                  </ul>
                </div>
                <div class="col-md-4">
                  <ul class="right list-unstyled">
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                    <li><a href="sendemail.php" class="getQuote">get a quote</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
            <!-- End most top info -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-light" data-toggle="sticky-onscroll" id="navScrollspy">
          <div class="container-fluid">
            <a class="navbar-brand h1 mb-0" href="index.html"><img src="img/Foremost-logolast.png"></a>
            <button class="navbar-toggler compressed" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="background:none; border:none">
              <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                </li> 
                 <li class="nav-item">
                  <a class="nav-link" href="index.html">About Us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="index.html">Services</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="index.html">Industries</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="index.html">Brands</a>
                </li> 
                <li class="nav-item">
                  <a class="nav-link" href="sendemail.php">contact</a>
                </li> 
              </ul>
            </div>
          </div>
      </nav>
    </header>
       <!--Hero image-->
      <section class="contactForm hero-image">
        <div class="overlay"></div>
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="hero-captionContact">
                <div>
                  <h1 class="bold-title contact-title text-center">contact us</h1>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--contact form-->
      <section class="contactForm">
        <div class="container-fluid text-center">
          <div class="row">
              <div class="col-md-12">
                <h2>FEEL THAT TINGLING IN YOUR FINGERTIPS?</h2>
                <p>That’s the magnetic urge to contact us today!</p>
              </div>

            <div class="col-md-12" align="center">
              

                      <?php if ($msg != "") echo "$msg<br><br>"; ?>

              <form method="post" action="sendemail.php" enctype="multipart/form-data">
                <input class="form-control" name="name" placeholder="Your Name..."><br>
                <input class="form-control" name="subject" placeholder="Subject..."><br>
                <input class="form-control" name="email" type="email" placeholder="Email..."><br>
                <textarea placeholder="Message..." class="form-control" name="message"></textarea><br>
                <input class="btn btn-primary" name="submit" type="submit" value="Send your request">
              </form>
            </div>
          </div>
        </div>
      </section>
  <!--footer-->
  <section class="footer">
    <div class="footer-foremost">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4"> 
            <div class="footer_box1">
              <img src="img/fore-logo.png"><br>
              <p>We are experts in sourcing and supplying products and consumbles and we assist customers in handling multiple RFPs and performance specification requirements for their supply chain needs. </p>
            </div>
        </div>
        <div class="col-md-4 forecontact">
          <div class="footer__box">
            <h3>Contact<i class="fal fa-minus footer-one"></i></h3><br>
            <ul class="list-unstyled">
              <li><i class="far fa-phone"></i> +258 84 241 4202</li>
              <li><i class="far fa-envelope-open"></i> info@foremost.co.mz</li>
              <li><i class="fal fa-map-marker-alt"></i> Av. 24 de Julho N° 370 <br>Maputo, Mozambique </li>

          </ul>
        </div>
        </div>

        <div class="col-md-4">
          <div class="footer__box">
          <h3>Follow Us<i class="fal fa-minus footer-one"></i></h3><br>
          <ul class="list-unstyled social">
            <li><i class="fab fa-facebook-f"></i></li>
           <li><i class="fab fa-linkedin-in"></i></li>
              <li><i class="fab fa-instagram"></i></li>
              <li><i class="fab fa-youtube"></i></li>
          </ul>
        </div>
        </div>

      </div>
    </div>
    </div>
  </section>
  <section class="footer-last">
    <p class="text-center last">&copy; 2018 Foremost | All Rights Reserved | Developed by <a href="https://sbmozmedia.com/">SBmozmedia Agency</a></p>
  </section> 
       <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link href="css/fontawesome-all.min.css" rel="stylesheet"/>
    <link href="css/fa-light.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/fore.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script> 
</body>
</html>
