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

    //if we want to send via SMTP
    $mail->Host = "smtp.gmail.com";
    //$mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Username = "senaidbacinovic@gmail.com";
    $mail->Password = "5C1bcnPkDI4Wd%#";
    $mail->SMTPSecure = "ssl"; //TLS
    $mail->Port = 465; //587

    $mail->addAddress('info@sbmozmedia.com');
    $mail->name = $name;
    $mail->setFrom($email, $name);
    $mail->Subject = $subject;
    $mail->isHTML(true);
    $mail->Body = $message;
    $mail->addAttachment($file);

    if ($mail->send())
        $msg = "Your email has been sent, thank you!";
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
    <style>
      @import url(https://fonts.googleapis.com/css?family=Lato:300,400|Muli:300,400|Nunito+Sans:400,600,700|Nunito:400,600|Paytone+One);@import url(https://fonts.googleapis.com/css?family=Raleway:300,400,600);body,html,li{font-size:1rem}li{display:block}body,html{font-family:Muli,sans-serif;line-height:1.6;color:#0b333c;margin:0 auto;position:relative;overflow-x:hidden;text-rendering:optimizeLegibility;-webkit-font-smoothing:antialiased}li{line-height:1.7em;font-weight:300}.navbar{padding:10px 0;z-index:999}.navbar-brand{font-family:'Paytone One',sans-serif;font-weight:400;color:#fff!important;font-size:2rem;padding-bottom:1rem}.navbar-toggler span{color:#85CB33;font-size:30px;margin-right:20px}.navbar-light .navbar-nav .nav-link{text-decoration:none}.header-banner{background-repeat:no-repeat}.navbar-brand .sb,.navbar-light .navbar-nav .active>.nav-link{color:#85CB33}.navbar-light .navbar-nav .nav-link{position:relative;display:block;font-size:1rem;font-weight:600;font-family:Muli,sans-serif;color:#fff;outline:0;margin:10px;border-bottom:1px solid transparent}.nav-item .contactos{font-family:'Nunito Sans',sans-serif!important}.nav-item .contactos{border-radius:20px;line-height:12px;margin-top:16px!important;color:#fff!important;background-color:#85cb33;font-weight:700!important}.nav-item i{margin:0 5px;color:#fff;font-weight:700!important}.titleTop h2{font-family:Raleway,sans-serif}.titleTop h2{margin-bottom:40px;font-weight:500;color:#0b333c;font-size:2rem}.topOther h1{margin:0 auto;max-width:50rem}.header-banner{background-image:url(../img/topheader.jpg);background-position:center center;-webkit-background-size:cover;background-size:cover;position:relative;top:0;bottom:0;width:100%;z-index:1;display:flex;height:500px;align-items:center}.topOther h1{color:#fff;font-size:3rem;font-weight:300;display:block}.topOther span{font-weight:900;color:#85CB33}.contactForm{padding:60px 0}@media (min-width:360px) and (max-width:767.98px){.nav-item{text-align:center}.navbar{background:#143a64;border-bottom:#0e2846}.navbar-brand{font-size:1.5rem;margin-left:20px}.contactForm{padding:40px 0}.header-banner{height:350px}.topOther h1{font-size:1.3rem}.titleTop h2{font-size:1.6rem}}@media (min-width:768px) and (max-width:1023.98px){.nav-item{text-align:center}.navbar{background:#143a64;border-bottom:#0e2846}.nav-item{font-size:1rem}.navbar-brand{font-size:2rem}.contactForm{padding:40px 0}}
    </style>
    <style>
      .fa,.fal{font-family:'Font Awesome 5 Pro';-moz-osx-font-smoothing:grayscale;-webkit-font-smoothing:antialiased;display:inline-block;font-style:normal;font-variant:normal;text-rendering:auto;line-height:1}.fa-bars:before{content:"\f0c9"}.fa-check:before{content:"\f00c"}.fa-envelope:before{content:"\f0e0"}.sr-only{border:0;clip:rect(0,0,0,0);height:1px;margin:-1px;overflow:hidden;padding:0;position:absolute;width:1px}@font-face{font-family:'Font Awesome 5 Pro';font-style:normal;font-weight:300;src:url(../webfonts/fa-light-300.eot);src:url(../webfonts/fa-light-300.eot?#iefix) format("embedded-opentype"),url(../webfonts/fa-light-300.woff2) format("woff2"),url(../webfonts/fa-light-300.woff) format("woff"),url(../webfonts/fa-light-300.ttf) format("truetype"),url(../webfonts/fa-light-300.svg#fontawesome) format("svg")}.fal{font-weight:300}@font-face{font-family:'Font Awesome 5 Pro';font-style:normal;font-weight:400;src:url(../webfonts/fa-regular-400.eot);src:url(../webfonts/fa-regular-400.eot?#iefix) format("embedded-opentype"),url(../webfonts/fa-regular-400.woff2) format("woff2"),url(../webfonts/fa-regular-400.woff) format("woff"),url(../webfonts/fa-regular-400.ttf) format("truetype"),url(../webfonts/fa-regular-400.svg#fontawesome) format("svg")}@font-face{font-family:'Font Awesome 5 Pro';font-style:normal;font-weight:900;src:url(../webfonts/fa-solid-900.eot);src:url(../webfonts/fa-solid-900.eot?#iefix) format("embedded-opentype"),url(../webfonts/fa-solid-900.woff2) format("woff2"),url(../webfonts/fa-solid-900.woff) format("woff"),url(../webfonts/fa-solid-900.ttf) format("truetype"),url(../webfonts/fa-solid-900.svg#fontawesome) format("svg")}.fa{font-weight:900}
    </style>
    <style>
      button,html{line-height:1.15}body,button{margin:0}html{-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}nav,section{display:block}h1{font-size:2em;margin:.67em 0}a{background-color:transparent;-webkit-text-decoration-skip:objects}img{border-style:none}button{font-family:sans-serif;font-size:100%;overflow:visible;text-transform:none}button,html [type=button]{-webkit-appearance:button}[type=button]::-moz-focus-inner,button::-moz-focus-inner{border-style:none;padding:0}[type=button]:-moz-focusring,button:-moz-focusring{outline:ButtonText dotted 1px}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}
    </style>
    <style>
      @font-face{font-family:Font Awesome\ 5 Pro;font-style:normal;font-weight:300;src:url(../webfonts/fa-light-300.eot);src:url(../webfonts/fa-light-300.eot?#iefix) format("embedded-opentype"),url(../webfonts/fa-light-300.woff2) format("woff2"),url(../webfonts/fa-light-300.woff) format("woff"),url(../webfonts/fa-light-300.ttf) format("truetype"),url(../webfonts/fa-light-300.svg#fontawesome) format("svg")}.fal{font-family:Font Awesome\ 5 Pro;font-weight:300}
    </style>
    <!--Google verification-->
    <meta name="google-site-verification" content="vAXOM-C5EUGGIwrxTNowJclsNz2vX4n1x9oochtq--s" />
    <title>SBmozmedia Web Development Agency - Make It Digital</title>
    <meta name="description" content="SBmozmedia is a Web Development Agency based in Mozambique. We make affordable websites. We provide custom designs, development, maintenance and more. Call +258 321 2622">
    <meta name="keywords" content="Web Development Mozambique, Digital Marketing Mozambique, Affordable Websites Mozambique, Virtual Shop Mozambique, Domain Registration Mozambique, IT Consulting Mozambique, Website Quotes Mozambique, Development Agency Mozambique">
    <link rel="canonical" href="https://www.sbmozmedia.com/">
    <meta property="og:title" content="Get in touch">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://sbmozmedia.com/sendemail.php">
    <meta property="og:site_name" content="SBmozmedia">
    <link rel="shortcut icon" type="image/png" href="img/sb-favicon.png"></head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=UA-122993878-1"></script>
      <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-122993878-1');
      </script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> 
  </head>
  <body>
    <!--Navigation menu-->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light" id="navScrollspy">
          <div class="container">
            <a class="navbar-brand h1 mb-0" href="index.html"><span class="sb">SB</span>mozmedia</a>
            <button class="navbar-toggler compressed" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="background:none; border:none">
              <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.html">About Us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="solutions.html">Solutions</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="portfolio.html">Portfólio</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="blog.html">Blog</a>
                </li> 
                <li class="nav-item active">
                  <a class="nav-link contactos" href="sendemail.php"><i class="fal fa-envelope"></i>Get in Touch</a>
                </li> 
              </ul>
            </div>
          </div>
      </nav>
       <!--header-->
      <section class="about header-banner">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="topOther text-center">
                <div>
                  <h1>Share your <span>Project idea</span> and <span>Let us Do</span> our Best to <span>Make it happen</span>!</h1>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--contact form-->
      <section class="contactForm">
        <div class="container titleTop">
          <div class="row justify-content-center">
            <div class="col-md-6 col-md-offset-3" align="center">
              <h2>Let's work together!</h2>

                      <?php if ($msg != "") echo "$msg<br><br>"; ?>

              <form method="post" action="sendemail.php" enctype="multipart/form-data">
                <input class="form-control" name="name" placeholder="Your Name..."><br>
                <input class="form-control" name="subject" placeholder="Subject..."><br>
                <input class="form-control" name="email" type="email" placeholder="Email..."><br>
                <textarea placeholder="Message..." class="form-control" name="message"></textarea><br>
                <input class="form-control" type="file" name="attachment"><br>
                <input class="btn btn-primary" name="submit" type="submit" value="Send Email">
              </form>
            </div>
          </div>
        </div>
      </section>
  <!--footer-->
      <section class="footer text-center">
        <div class="container">
          <div class="row">
            <div class="col-12 titleTop">
              <h2>Let's work Together!</h2>
              <h3>We provide complete solutions to our clients everywhere in the world.</h3>
              <a href="sendemail.php" class="btn">Request a meeting</a>
            </div>
          </div>
        </div>
      </section>
      <!--footer last-->
      <section class="footerLast text-center">
        <div class="container">
          <div class="row">
            <div class="col-12 titleTop">
              <h2>We are Social</h2>
              <p>Be the first to know what happens at SBmozmedia. Follow us on social networks!</p>
              <ul class="list-unstyled social">
                <a href="https://www.linkedin.com/company/sbmozmedia/" target="_black"><li><i class="fab fa-linkedin-in"></i></li></a>
                 <a href="https://www.instagram.com/sbmozmedia/" target="_black"><li><i class="fab fa-instagram"></i></li></a>
                 <a href="https://web.facebook.com/SBmozmedia-1213522845455533/" target="_black"><li><i class="fab fa-facebook-f"></i></li></a>
                 <a href="https://twitter.com/sbmozmedia" target="_black"><li><i class="fab fa-twitter"></i></li></a>
              </ul>
            </div>
          </div>
          <div class="row sbmozmedialast">
            <div class="col-md-6">
              <ul class="list-unstyled contactt">
                <li>&copy; sbmozmedia.com 2018 | Digital Agency</li> 
              </ul>
            </div>
            <div class="col-md-6">
              <ul class="list-unstyled contactt">
                <a href="mailto:info@sbmozmedia.com"><li><i class="fal fa-envelope"></i>info@sbmozmedia.com</li>
                <a href="tel:+258 84321 2622"><li><i class="fal fa-phone"></i> +258 84321 2622</li> 
              </ul>
            </div>
          </div>
        </div>
      </section>
       <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link href="css/fontawesome-all.min.css" rel="stylesheet"/>
    <link href="css/fa-light.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script> 
    <script type="text/javascript">
      function downloadJSAtOnload() {
      var element = document.createElement("script");
      element.src = "js/main.js";
      document.body.appendChild(element);
      }
      if (window.addEventListener)
      window.addEventListener("load", downloadJSAtOnload, false);
      else if (window.attachEvent)
      window.attachEvent("onload", downloadJSAtOnload);
      else window.onload = downloadJSAtOnload;
    </script>
</body>
</html>