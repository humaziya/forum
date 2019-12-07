<?php 
session_start();
if(!isset($_SESSION['name'])){

	$_SESSION['msg']= "you must login first ";
	header("location: index.php");
}
?>
<?php
if(isset($_SESSION['success'])) : ?>
	<div>		
		<h3>			
			<?php
			echo $_SESSION['success'];
			unset($_SESSION['success']);
			 ?>
		</h3>
	</div>
<?php endif ?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<?php include("header.php");?>
<?php require_once 'process.php'; ?>
<?php $mysqli = new mysqli('localhost','root','','forum')
or die(mysqli_error($mysqli));
$result = $mysqli -> query("SELECT * FROM post")
or die(mysqli_error($mysqli));
?>
<div class="card bg-light text-white">
<div class="text-danger">
<?php if(isset($_SESSION['name'])):  ?>
<h3> welcome <?php echo $_SESSION['name']; ?></h3>
<h3> user id is <?php echo $_SESSION['id']; ?></h3>
<?php endif ?>
    </div>
  </div>
<div class="card">
<table>
<?php 
while($row=$result->fetch_assoc()):?>
<tr>
<div class="badge badge-secondary"><h5>user_id:</h5><?php echo $row['user_id'];?></div>
<div class="card-body"><h5>content no :</h5><?php echo $row['content'];?></div>
<form action="process.php" method="POST">
<input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>" >
<input type="hidden" name="post_id" value="<?php  echo $row['id']; ?>" >
 <div class="card-footer">comment:<input type="text" name="comment"><br><br>
 	<button class="badge badge-secondary" type="submit" name="comment_post">Reply</button></div>
</form>
</tr><?php endwhile; ?>
</table>
<?php require_once 'process.php'; ?>
<?php $mysqli = new mysqli('localhost','root','','forum')
or die(mysqli_error($mysqli));
$result = $mysqli -> query("SELECT * FROM comment")
or die(mysqli_error($mysqli));
?>
<div class="container">
<table class="table">
<tr>
<th>user_id</th>
<th>password</th>
 
</tr>
<?php 
while($row=$result->fetch_assoc()):?>
<tr>
<td><?php echo $row['user_id'];?></td>
<td><?php echo $row['comment'];?></td>


</tr><?php endwhile; ?>
</table>
</div>


