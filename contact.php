<?php 
  include 'header.php';
?>
<?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $fname     =$fm->validation($_POST['fullname']);
        $contactNo =$fm->validation($_POST['contactNo']);
        $email     =$fm->validation($_POST['email']);
        $topic     =$fm->validation($_POST['topic']);
        $body      =$fm->validation($_POST['body']);
        
        $fname     = mysqli_real_escape_string($db->link, $fname);
        $contactNo = mysqli_real_escape_string($db->link, $contactNo);
        $email     = mysqli_real_escape_string($db->link, $email);
        $topic     = mysqli_real_escape_string($db->link, $topic);
        $body      = mysqli_real_escape_string($db->link, $body);

        $error = "";
        if (empty($fname)) {
           $error = "First name must not be empty !";
        }elseif (empty($contactNo)) {
           $error = "contact No must not be empty !";
        }elseif (empty($email)) {
           $error = "Email must not be empty !";
        }elseif (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
           $error = "Invalid Email Address !";
        }elseif (empty($topic)) {
           $error = "topic must not be empty !";
        }elseif (empty($body)) {
           $error = "Message field not be empty !";
        } else{
        $query = "INSERT INTO  tbl_contact(fullname, contactNo, email, topic, body) VALUES ('$fname', '$contactNo', '$email', '$topic', '$body',)";

      $inserted_rows = $db->insert($query);
      if ($inserted_rows) {
         $msg = "Message send successfully !";
      }else{
        $msg = "Message not send !";
          }
     
        }
    }
?>
      
<div class="content_area clear">
<div class="maincontent clear">
  <div class="samepost clear">
     <h3>Contact Us</h3>

   <?php 
       if (isset($error)){
        echo "<span style='color:red'>$error</span>";
       }
        if (isset($msg)){
        echo "<span style='color:green'>$msg</span>";
       }
   ?>

     <table>
       <tr>
         <td>Your Full Name:</td>
         <td><input type="text" name="fullname" palceholder="Enter The First Name"/>
         </td>
       </tr>
       <tr>
         <td>Your Contact Number:</td>
         <td><input type="text" name="contactNo" palceholder="Enter The Last Name"/>
         </td>
       </tr>
        <tr>
         <td>Your Email Address:</td>
         <td><input type="text" name="email" palceholder="Enter Email Address"/>
         </td>
       </tr>
       <tr>
         <td>Your Subject:</td>
         <td><input type="text" name="topic" palceholder="Enter Email Address"/>
         </td>
       </tr>
        <tr>
         <td>Your Message:</td>
         <td>
          <textarea name="body"></textarea>
        </td>
       </tr>
     <tr>
     <td></td>
     <td><input type="submit" name="submit" value="Send" /></td>
      </tr>
   </table>
</div>
<div class="googlemap"></div>
    <div id="map"></div>
</div>
       <div class="sidebar clear">
         <div class="samesidebar clear">
           <h2>Latest Articles</h2>
             <ul>
               <li><a href="#">Post title one will be go there</a></li>
               <li><a href="#">Post title two will be go there</a></li>
               <li><a href="#">Post title three will be go there</a></li>
               <li><a href="#">Post title four will be go there</a></li>
               <li><a href="#">Post title five will be go there</a></li>
               <li><a href="#">Post title six will be go there</a></li>
               <li><a href="#">Post title seven will be go there</a></li>
               <li><a href="#">Post title eight will be go there</a></li>
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
        <p>&copy; copyright by Masud</p>
       </div>


 <script src="http://maps.google.com/maps/api/js"></script>
  <script src="js/gmaps.js"></script>      
<script type="text/javascript">
    var map;
    $(document).ready(function(){
      var map = new GMaps({
        el: '#map',
        lat: 23.7805733,
        lng: 90.279237,
        scrollwheel:false
      });

      GMaps.geolocate({
        success: function(position){
          map.setCenter(position.coords.latitude, position.coords.longitude);
        },
        error: function(error){
          alert('Geolocation failed: '+error.message);
        },
        not_supported: function(){
          alert("Your browser does not support geolocation");
        },
        always: function(){
          alert("Done!");
        }
      });
    });
  </script>
</body>
</html>