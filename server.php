<?php
session_start();
//iniitialising variables
$name= "";
$errors = array();
//connect to db
$db = mysqli_connect('localhost', 'root', '', 'forum') or die("could not connect to database");
//register users
if(isset($_POST['reg_user'])){
$name = mysqli_real_escape_string($db, $_POST['name']);
$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  
$password = mysqli_real_escape_string($db, $_POST['password']);
$repeatpass = mysqli_real_escape_string($db, $_POST['repeatpass']);	
$email = mysqli_real_escape_string($db, $_POST['email']);	
// form validation 


if(empty($name)) {array_push($errors, "name is required");}
if(empty($password)) {array_push($errors, "Password is required");}
if($password != $repeatpass){array_push($errors, "password do not match");}
// check db for existing user with  same username


$user_check_query = "SELECT * FROM user WHERE name = '$name'  LIMIT 1 ";
$result = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($result);
if($user){
	if($user['name'] === $name){array_push($errors, "name already exists");}	
}
//register the user if no error

if(count($errors) == 0){
	$password = $password;
	$query = "INSERT INTO user (name,password,image,email) VALUES  ('$name','$password','$file','$email')";
	mysqli_query($db,$query);
	$_SESSION['name'] = $name;
	$_SESSION['success'] = "you are now logged in";
	header('location: index.php');
} else {
	$_SESSION['error'] = $errors;
	header('location: index.php');
}
}
?>