<?php include("header.php");?>
<?php session_start();?>
<body>
	<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
			<form class="login100-form validate-form" action="server.php"  enctype="multipart/form-data" method="POST">
				<span class="login100-form-title p-b-37">
					Sign Up
				</span>
				<div class="wrap-input100 validate-input m-b-25" data-validate = "Enter username">
					<input class="input100" type="text" name="name" placeholder="name">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-25" data-validate = "Enter email">
					<input class="input100" type="text" name="email" placeholder="email">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password">
					<input class="input100" type="password" name="password" placeholder="password">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password">
					<input class="input100" type="password" name="repeatpass" placeholder=" confirm password">
					<span class="focus-input100"></span>
				</div>
  
				  
                     <input type="file" name="image" id="image" />  
                	<?php include("errors.php"); ?>
				    <div class="container-login100-form-btn">
					<button class="login100-form-btn" name="reg_user">
						Sign Up</a>
					</button>
				</div>
			</form>
			
		</div>
	</div>

<?php include("footer.php");?>