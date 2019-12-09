<?php include("db.php");?>
<?php
session_start();
    $errors = array();
    if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
        $myusername = mysqli_real_escape_string($db,$_POST['name']);
        $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
        
				$sql1 = "SELECT * FROM user WHERE name = '$myusername'";
		        $result1 = mysqli_query($db,$sql1);
		        $row1 = mysqli_fetch_array($result1);
				$countt = mysqli_num_rows($result1);


		        if($countt == 1){
				$sql = "SELECT * FROM user WHERE name = '$myusername' and password = '$mypassword'";
		        $result = mysqli_query($db,$sql);
		        $row = mysqli_fetch_array($result);
		        $uname = $row['name'];
		        $userid = $row['id'];
		        $uemail = $row['email'];
		       
		      
		        $count = mysqli_num_rows($result);
		 
		        if($count == 1) {
		            $_SESSION['name'] = $uname;
		             $_SESSION['id'] = $userid;
		             $_SESSION['email'] = $uemail;

		              
		          $_SESSION['success'] = "login succesfull";
		            header("location: dashboard.php");
		        }else {
		            array_push($errors, " Password is incorrect");
		            header("location:index.php");
		            $_SESSION['error'] = $errors;
		        }
		        }
		        else {
		            array_push($errors, " username does not exists");
		            header("location:index.php");
		            $_SESSION['error'] = $errors;


		        
   }
		  }      
if(isset($_GET['logout'])) {
		session_destroy();
		header("location: index.php");
   }   
?>