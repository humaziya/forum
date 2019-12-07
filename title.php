
<?php include 'header.php';?>
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
<?php include 'nav.php';?>
<?php include("db.php");?>
<?php 
$result = $db -> query("SELECT * FROM post ORDER BY title ASC ")
or die(mysqli_error($db));
?>
<div class="container">
 <style>
body {
  background-image: url("img1.jpg");
}
</style>
<div class="card">
<table class="table table-bordered ">
<tr>

<th>SL.No.</th>
<th>Titles</th>
</tr>
<?php
$i=1; 
while($row=$result->fetch_assoc()):?>
<tr>
<td><?php echo $i ?></td>
<td><a href="read.php?id=<?php echo $row['id'];?>"><?php echo $row['title'];?></a></td>
<?php $i++ ?>
</tr><?php endwhile; ?>
</table>
</div>
</div>
</body>
</html>
<?php include 'footer.php'?>
