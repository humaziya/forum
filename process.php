<?php include("db.php");?>
<?php
if(isset($_POST['submit_post'])){
	$user_id=$_POST['user_id'];
	$content=$_POST['content'];
	$title=$_POST['title'];
	//$id=$_POST['id'];
	$db ->query("INSERT INTO post (user_id, content,title) VALUES ( '$user_id', '$content','$title')")or die($db->error);
    header("location:dashboard.php");
}
if(isset($_POST['comment_post'])){
	$post_id=$_POST['post_id'];
	$user_id=$_POST['user_id'];
	$name=$_POST['name'];
	$comment=$_POST['comment'];
   	$db ->query("INSERT INTO comment (post_id, user_id, name, comment) VALUES ( '$post_id', '$user_id', '$name', '$comment')")or die($db->error);
	header("location:read.php?id=".$post_id);
}
?>
