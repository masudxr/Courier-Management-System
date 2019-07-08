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

          <li><a href="post.php?category=<?php echo $result['id']; ?>"><?php echo $result['name']; ?></a></li>
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