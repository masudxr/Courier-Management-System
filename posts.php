<?php include 'config/config.php'; ?>
<?php include 'libs/database.php'; ?>
<?php include 'libs/format.php'; ?>

<!DOCTYPE html>
<html>
<head>
  <title>Courier Service</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="js/cufon-yui.js"></script>
    <script type="text/javascript" src="js/droid_sans_400-droid_sans_700.font.js"></script>
    <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/coin-slider.min.js"></script>
</head>
<body>
    <div class="header templete clear">
        <div class="logo">
          <a href="#"><img src="img/lgo.png" alt="Logo"></a>
          <a class="navbar-brand" href="index.php">Emergency Courier Service</a>
          <p>Our only purpose is human service</p>
        </div>
        <div class="social">
          <a href="http://www.facebook.com"><img src="img/fb3.png" alt="facebook"></a>
          <a href="http://www.twitter.com"><img src="img/tw2.png" alt="twiter"></a>
          <a href="http://www.linkedin.com"><img src="img/in2.png" alt="linkedin"></a>
          <a href="http://www.google.com"><img src="img/g.png" alt="googleplus"></a>
          <a href="http://www.instragram.com"><img src="img/inst.png" alt="googleplus"></a>
        </div>
    </div>

      <div class="navigation templete clear">
         <ul>
           <li><a id="active" href="index.php">Home</a></li>
           <li><a href="login.php">Login</a></li>
           <li><a href="about.php">About Us</a></li>
           <li><a href="pack.php">Packing Info</a></li>
           <li><a href="#">Track Courier</a></li>
           <li><a href="contact.php">Contact Us</a></li>
           <li><a href="feedback.php">Feedback</a></li>
        </ul>
      </div>

    <div class="slider templete clear">
        <div id="coin-slider">
          <a href="#"><img src="img/mr.jpg" width="99%" height="300" alt="" title="amar sonar bangla" /> </a>
          <a href="#"><img src="img/co.jpg" width="99%" height="300" alt="" title="" /> </a>
          <a href="#"><img src="img/ab.jpg" width="99%" height="300" alt="" title="" /> </a>
          <a href="#"><img src="img/b3.jpg" width="99%" height="300" alt="" title="" /> </a>
          <a href="#"><img src="img/b2.jpg" width="99%" height="300" alt="" title="" /> </a>
          <a href="#"><img src="img/b1.jpg" width="99%" height="300" alt="" title="" /> </a>
        </div>
   </div>

<?php
    $db = new database();
    $fm = new format();
?>

<?php 
  if (!isset($_GET['category']) || $_GET['category'] == NULL) {
    header("location: 404.php");
  } else{
    $id = $_GET['category'];
  }
?>
<div class="content_area clear">
<div class="maincontent clear">

  <?php
        $query = "select * from tbl_post where catg=$id";
        $post = $db->select($query);
        if ($post) {
          while ($result = $post->fetch_assoc()) {
          
    ?>

<div class="samepost clear">
  <h2><a href="post.php?id=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a></h2>
<h4><?php echo $fm->formatDate 
($result['date']); ?>, By <a href="#"><?php echo $result['author']; ?></a></h4>
  <a href="#"><img src="img/<?php echo $result['image']; ?>" alt="post image"/></a>

<?php echo $fm->textShorten($result['body']); ?>

  <div class="readmore clear">
    <a href="post.php?id=<?php echo $result['id']; ?>">Read More...</a>
  </div>
</div>
<?php } } else { header("location:404.php");} ?>

<?php include 'sidebar.php'; ?>
<?php include 'footer.php'; ?>