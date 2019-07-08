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
          <a href="index.php"><img src="img/lgo.png" alt="Logo"></a>
          <a class="navbar-brand" href="index.php">Emergency Courier Service</a>
          <p>Our Only Purpose Is Human Service</p>
        </div>

        <div class="social">
          <a href="http://www.facebook.com"><img src="img/fb.png" alt="facebook"></a>
          <a href="http://www.twitter.com"><img src="img/tw2.png" alt="twiter"></a>
          <a href="http://www.linkedin.com"><img src="img/in2.png" alt="linkedin"></a>
          <a href="http://www.google.com"><img src="img/gp.png" alt="googleplus"></a>
          <a href="http://www.instragram.com"><img src="img/inst.png" alt="googleplus"></a>
        </div>

         
       
</div>
      <div class="navigation templete clear">
         <ul>
           <li><a id="active" href="index.php">Home</a></li>
           <li><a href="about.php">About Us</a></li>
           <li><a href="pack.php">Packing Info</a></li>
           <li><a href="#">Track Courier</a></li>
           <li><a href="contact.php">Contact Us</a></li>
           <li><a href="feedback.php">Feedback</a></li>

           <!--search bar-->
           <div class="searchbar clear">
          <form action="" method="post">
            <input type="text" name="keyword" placeholder="search keyword..."/>
            <input type="submit" name="submit" value="Search">
          </form>
        </div> 
           
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

<div class="content_area clear">
<div class="maincontent clear">

<!-- pagination -->
<?php 
  $per_page = 4;
  if(isset($_GET["page"])){
    $page = $_GET["page"];
  }else{
    $page=1;
  }
  $start_form = ($page-1) * $per_page;
?>
<!-- pagination -->
    <?php
        $query = "select * from tbl_post limit $start_form, $per_page";
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

<?php } ?> <!--  end while loop -->

<!-- pagination -->

<?php
$query  = "select * from tbl_post";
$result = $db->select($query);
$total_rows = mysqli_num_rows($result);
$total_pages = ceil($total_rows/$per_page);

echo "<span class='pagination'><a href='index.php?page=1'>".'First Page'."</a>";

for ($i=1; $i <= $total_pages; $i++){
  echo "<a href='index.php?page=".$i."'>".$i."</a>";
}

echo "<a href='index.php?page=$total_pages'>".'Last Page'."</a></span>" ?>
<!-- pagination -->
<?php } else { header("location:404.php");} ?>

</div>
<div class="sidebar clear">
         <div class="samesidebar clear">
           <h2>Latest Articles</h2>
        <ul>

          <?php 
              $query = "select * from tbl_category";
              $category = $db->select($query);
               if ($category) {
                 while ($result = $category->fetch_assoc()) {
          ?>

          <li><a href="posts.php?category=<?php echo $result['id']; ?>"><?php echo $result['name']; ?></a></li>
          <?php } } else { ?>
            <li>No Post created Here</li>
          <?php } ?>
              
        </ul>
         </div>
         <div class="samesidebar clear">
           <h2>Popular Articles</h2>
           <div class="popular clear">
            <h3><a href="#">Post title will be go here..</a></h3>
            <a href="#"><img src="img/bp.png" alt="post image"/></a>
            <p>Courier services have been around for a very long time. Ancient cultures had runners or horsemen to carry messages from one place to another without the hassle of going through the more commonly used slow channels..</p>
             <div class="readmore clear">
                <a href="post.php">Read More...</a>
              </div>
          </div>
          <div class="popular clear">
            <h3><a href="#">Post title will be go here..</a></h3>
            <a href="#"><img src="img/bp.png" alt="post image"/></a>
            <p>Courier services have been around for a very long time. Ancient cultures had runners or horsemen to carry messages from one place to another without the hassle of going through the more commonly used slow channels..</p>
            <div class="readmore clear">
                <a href="post.php">Read More...</a>
            </div>
          </div>
          <div class="popular clear">
            <h3><a href="#">Post title will be go here..</a></h3>
            <a href="#"><img src="img/bp.png" alt="post image"/></a>
            <p>Courier services have been around for a very long time. Ancient cultures had runners or horsemen to carry messages from one place to another without the hassle of going through the more commonly used slow channels..</p>
             <div class="readmore clear">
                <a href="post.php">Read More...</a>
              </div>
          </div>
          <div class="popular clear">
            <h3><a href="#">Post title will be go here..</a></h3>
            <a href="#"><img src="img/bp.png" alt="post image"/></a>
            <p>Courier services have been around for a very long time. Ancient cultures had runners or horsemen to carry messages from one place to another without the hassle of going through the more commonly used slow channels..</p>
             <div class="readmore clear">
                 <a href="post.php">Read More...</a>
             </div>
          </div>
         
       
       </div>
      </div>

       <div class="footer templete clear">
        <div class="footermenu templete clear">
          <li><a href="#">Home</a></li>
          <li><a href="#">Login</a></li>
        </div>
        <p>&copy; All Right Reserve@Copyright by Masud</p>
       </div>
<script type="text/javascript">var scrolltotop={setting:{startline:100,scrollto:0,scrollduration:1e3,fadeduration:[500,100]},controlHTML:'<img src="img/scu.png" />',controlattrs:{offsetx:5,offsety:5},anchorkeyword:"#top",state:{isvisible:!1,shouldvisible:!1},scrollup:function(){this.cssfixedsupport||this.$control.css({opacity:0});var t=isNaN(this.setting.scrollto)?this.setting.scrollto:parseInt(this.setting.scrollto);t="string"==typeof t&&1==jQuery("#"+t).length?jQuery("#"+t).offset().top:0,this.$body.animate({scrollTop:t},this.setting.scrollduration)},keepfixed:function(){var t=jQuery(window),o=t.scrollLeft()+t.width()-this.$control.width()-this.controlattrs.offsetx,s=t.scrollTop()+t.height()-this.$control.height()-this.controlattrs.offsety;this.$control.css({left:o+"px",top:s+"px"})},togglecontrol:function(){var t=jQuery(window).scrollTop();this.cssfixedsupport||this.keepfixed(),this.state.shouldvisible=t>=this.setting.startline?!0:!1,this.state.shouldvisible&&!this.state.isvisible?(this.$control.stop().animate({opacity:1},this.setting.fadeduration[0]),this.state.isvisible=!0):0==this.state.shouldvisible&&this.state.isvisible&&(this.$control.stop().animate({opacity:0},this.setting.fadeduration[1]),this.state.isvisible=!1)},init:function(){jQuery(document).ready(function(t){var o=scrolltotop,s=document.all;o.cssfixedsupport=!s||s&&"CSS1Compat"==document.compatMode&&window.XMLHttpRequest,o.$body=t(window.opera?"CSS1Compat"==document.compatMode?"html":"body":"html,body"),o.$control=t('<div id="topcontrol">'+o.controlHTML+"</div>").css({position:o.cssfixedsupport?"fixed":"absolute",bottom:o.controlattrs.offsety,right:o.controlattrs.offsetx,opacity:0,cursor:"pointer"}).attr({title:"Scroll to Top"}).click(function(){return o.scrollup(),!1}).appendTo("body"),document.all&&!window.XMLHttpRequest&&""!=o.$control.text()&&o.$control.css({width:o.$control.width()}),o.togglecontrol(),t('a[href="'+o.anchorkeyword+'"]').click(function(){return o.scrollup(),!1}),t(window).bind("scroll resize",function(t){o.togglecontrol()})})}};scrolltotop.init();</script>
<noscript>Not seeing a <a href="https://www.scrolltotop.com/">Scroll to Top Button</a>? Go to our FAQ page for more info.</noscript>
</div>

</body>
</html>