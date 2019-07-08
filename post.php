<?php include 'header.php';?>
<?php include 'config/config.php'; ?>
<?php include 'libs/database.php'; ?>
<?php include 'libs/format.php'; ?>

<?php
    $db = new database();
    $fm = new format();
?>
<?php 
	if (!isset($_GET['id']) || $_GET['id'] == NULL) {
		header("location: 404.php");
	} else{
		$id = $_GET['id'];
	}
?>

    <div class="content_area clear">
     <div class="maincontent clear">
  <div class="samepost clear">
  	<!-- //Show Database Post Details Here// -->
  	<?php 
  		$query = "select * from tbl_post where id=$id";
  		$post = $db->select($query);
        if ($post) {
        while ($result = $post->fetch_assoc()) {
  	 ?>

   <h2><?php echo $result['title']; ?></h2>
   <h4><?php echo $fm->formatDate($result['date']); ?>, By <a href="#"><?php echo $result['author']; ?></a></h4>
  <img src="img/<?php echo $result['image']; ?>" alt="post image"/>
    <?php echo $result['body']; ?>

<div class="relatedpost clear">
  <h2>Related Post</h2>
  <!-- //Show Related Post For Database// -->
<?php 
	$catgid = $result['catg'];
	$queryrelated = "select * from tbl_post where catg = '$catgid' order by rand() limit 6";
  		$relatedpost = $db->select($queryrelated);
        if ($relatedpost) {
        while ($rresult = $relatedpost->fetch_assoc()) {
?>
    <a href="post.php?id=<?php echo $rresult['id']; ?>">
    	<img src="img/<?php echo $rresult['image']; ?>" alt="post image"/>
    </a> 

   <?php } } else { echo "No related post avaiable !!"; } ?>
</div>

<?php } } else { header("location:404.php");} ?>

<?php include 'sidebar.php'; ?>
<?php include 'footer.php'; ?>