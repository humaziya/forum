<?php include("header.php");?>
<?php include("db.php");?>
<?php
    $postid=$_GET['id'];
	$sql = "SELECT * FROM post WHERE id='$postid'";
	$result = mysqli_query($db,$sql);
	$row = mysqli_fetch_array($result);

	$sql2="SELECT * FROM comment WHERE post_id='$postid' ";
    $result2 = mysqli_query($db,$sql2);
	$row2= mysqli_fetch_array($result2);
	
?>
<form action="process.php" method="POST">
				
				<?php  echo $row['post_id']; ?>
				<h4>COMMENT:</h4><input type="text" name="comment"  placeholder="text here" ><br>
				<button class="badge badge-secondary" type="submit" name="comment_post">reply</button>
			</form>


<?php include("footer.php");?>






