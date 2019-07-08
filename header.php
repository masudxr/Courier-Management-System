<?php include 'config/config.php'; ?>
<?php include 'libs/database.php'; ?>
<?php include 'libs/format.php'; ?>

<?php
    $db = new database();
    $fm = new format();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Courier Service</title>
	<link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
    
</head>
<body>
    <div class="header templete clear">
        <div class="logo">
          <a href="#"><img src="img/lgo.png" alt="Logo"></a>
          <a class="navbar-brand" href="index.php">
               Emergency Courier Service
          </a>
          <p>Our only purpose is human service</p>
        </div>
         <div class="social">
          <a href="http://www.facebook.com"><img src="img/fb3.png" alt="facebook"></a>
          <a href="http://www.twitter.com"><img src="img/tw2.png" alt="twiter"></a>
          <a href="http://www.linkedin.com"><img src="img/in2.png" alt="linkedin"></a>
          <a href="http://www.google.com"><img src="img/gp.png" alt="googleplus"></a>
          <a href="http://www.instragram.com"><img src="img/inst.png" alt="googleplus"></a>
        </div>

    </div>
      <div class="navigation templete clear">
         <ul>
           <li><a href="index.php">Home</a></li>
           <li><a href="login.php">Login</a></li>
           <li><a href="about.php">About Us</a></li>
           <li><a href="pack.php">Packing Info</a></li>
           <li><a href="#">Track Courier</a></li>
           <li><a href="contact.php">Contact Us</a></li>
           <li><a href="feedback.php">Feedback</a></li>
           
        </ul>
      </div>