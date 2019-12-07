<nav class="navbar navbar-expand-md bg-dark navbar-dark">
       <a class="navbar-brand" href="#">DISSCUSSION FORUM</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
              <span class="navbar-toggler-icon"></span>
          </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
           <ul class="navbar-nav">
             <li class="nav-item">
             <a class="nav-link" href="dashboard.php">HOME</a>
             </li>
             <li class="nav-item">
             <a class="nav-link" href="title.php">READ</a>
             </li>
             <li class="nav-item">
             <a class="nav-link" href="auth.php?logout='1'">LOGOUT</a>
             </li>    
           </ul>
        </div>
     <div class="card-header">
        <h5 style="font-family:verdana;color:white;float: right;"><?php echo $_SESSION['name'];?></h5>
     </div>

     <li class="nav-item">
             <a class= "nav-link" style="color:white;float: right;" data-toggle="modal" data-target="#exampleModalCenter">
              SETTINGS
              </a>
              </li> 
              

</nav>


<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="modal-title" id="exampleModalLongTitle">
          <img src="set.jpg" height="40", width="40" class="image-circle" >
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
      <?php include("db.php");?>

      <?php  
        $b=$_SESSION['id'];
        if(isset($_POST["insert"]))  
        {  
        $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  
        $query = "UPDATE user SET image='$file'WHERE id=$b";
 
        mysqli_query($db, $query);

        }  
        ?>
          <form method="post" enctype="multipart/form-data">  
                     <input type="file"  name="image" id="image" />  
                     <br />  
                     <input type="submit" name="insert" value="Update" class="btn btn-info" />
          </form> 

       <?php include("db.php");?>

       <?php  
         $c=$_SESSION['id']; 
                $query = "SELECT * FROM user WHERE id=$c";  
                $result = mysqli_query($db, $query);
        if(isset($_POST["update"]))  
        {  
        $email = $_POST['email'];
        $query = "UPDATE user SET email='$email' WHERE id=$c";
        $result1= mysqli_query($db, $query);
        }  
       ?>
            <form method="POST">          
           <textarea  name="email" value="<?php echo $result1['email'];?>" class="form-control"  rows="2" cols="10" placeholder="enter your email here"></textarea>
            <button type="submit" name="update" value="update" class="btn btn-success">change</button> 
           </form>     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


