<?php include("header.php");?>
<?php 
session_start();
if(!isset($_SESSION['name'])){
	$_SESSION['msg']= "you must login first ";
	header("location: index.php");
}
if(isset($_GET['logout'])){
	session_destroy();
	unset($_SESSION['name']);
	header("location: index.php");
}
?>
 <style>
body {
background-image:url("img1.jpg");
}
</style>
<?php include 'nav.php';?>
 <?php include("db.php");?>
<?php 
 	$postid=$_GET['id'];
	$sql = "SELECT * FROM post WHERE id='$postid'";
	$result = mysqli_query($db,$sql);
	$row = mysqli_fetch_array($result);
	
?>
<div class="container-fluid">
  <div class="container-fluid">
    <!-- Control the column width, and how they should appear on different devices -->
    <div class="row">
      <div class="col-sm-6" style="background-color:lavender;">
      	<div class="card">
	<div class="card border-primary mb-4" >
		<div class="card-header  text-success">	Title: </h4><?php echo $row['title'];?></center> 
			</div>
		</div>
	<div class="card border-primary mb-3">
		<div class="card-body text-success"><h4>Content:</h4><?php echo $row['content'];?></div>
		</div>
	<div class="card border-primary mb-3">
		<div class="card-footer text-success">
			<form action="process.php" method="POST">
				<input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>">
				<input type="hidden" name="post_id" value="<?php  echo $postid; ?>" >
				<input type="hidden" name="name" value="<?php echo $_SESSION['name'];?>">
				<h4>COMMENT:</h4><input type="text" name="comment"  placeholder="text here"><br>
				<button class="badge badge-secondary" type="submit" name="comment_post">reply</button>
			</form>
		</div>
	</div>
</div>
</div>
<div class="col-sm-6" style="background-color:lavender;">
      <div class="card border-primary mb-4" >
         <div class="container">
            <table class="table table-bordered">
            <tr class="danger">
                <th>name</th>
                <th>comment</th>
            </tr>
<h3> Comments:</h3>
<?php include("db.php");?>
<?php
    $sql2="SELECT * FROM comment WHERE post_id='$postid'";
    $result2 = mysqli_query($db,$sql2);
	//$row2= mysqli_fetch_array($result2);
?>
<?php 
      while($row2=$result2->fetch_assoc()):?>
         <tr class="success">
            <div class="card" >
              <td><?php echo $row2['name'];?></td>
            </div>
              <td><?php echo $row2['comment'];?></td>
         </tr><?php endwhile; ?>
            </table>
         </div>
     </div>
</div>
</div>
</div>
</div>
<?php include("footer.php");?>