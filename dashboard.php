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

<div class="container-fluid">
 <style>
body {
  background-image: url("img1.jpg");
}
</style>
  <div class="container-fluid">
    
    <div class="row">
      <div class="col-sm-4" style="background-color:WhiteSmoke;">
        <?php include("db.php");?>
		<?php  
               $a=$_SESSION['id'];
                $query = "SELECT * FROM user WHERE id=$a";  
                $result = mysqli_query($db, $query);  
                while($row = mysqli_fetch_array($result))  
                {  
                     echo '  
                          <tr>  
                               <td>  
                                    <img src="data:image/jpeg;base64, '.base64_encode($row['image'] ).'" height="200" width="200" class="img-circle" />  
                               </td>  
                          </tr>  
                     ';  
                }  
                ?>


	<?php if(isset($_SESSION['name'])):  ?>
	<h5> welcome <?php echo $_SESSION['name']; ?></h5>
	
                <?php include("db.php");?>
                <?php  
               $email=$_SESSION['id']; 
                $query = "SELECT * FROM user WHERE id=$email";  
                $result = mysqli_query($db, $query);  
                while($row=$result->fetch_assoc()):?>  
               
                 <h5> email is <?php echo $row['email']; ?></h5>
                 
                <?php endwhile; ?>
                
	<?php endif; ?>
	</div>
		<div class="col-sm-8" style="background-color:WhiteSmoke;">
			<form action="process.php" method="POST">
				<input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>" >

				<div class="form-group">
						
						<h5>TITLE:</h5><input type="text" name="title"><br><br>
						<textarea  name="content" class="form-control"  rows="5" cols="30" placeholder="enter your text here"></textarea>
						<button type="submit"  class="btn btn-success" name="submit_post" >Post</button>
				</div> 
			</form>
      	</div>
    </div>
</div>
<?php include 'footer.php';?>