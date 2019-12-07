<?php include("header.php");?>
	<?php session_start();
	$value='';

	?>


	<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
			<form class="login100-form validate-form" action="auth.php" method="POST">
				<span class="login100-form-title p-b-37">
					Sign In
				</span>
				<div class="wrap-input100 validate-input m-b-20" data-validate="Enter username or email">
					<input class="input100" type="text" name="name" placeholder="name or email">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password">
					<input class="input100" type="password" name="password" placeholder="password">
					<span class="focus-input100"></span>
				</div>
			    <?php include("errors.php"); ?>
				<div class="container-login100-form-btn">
					<button class="login100-form-btn">
						Login
					</button>
				</div>
                <br><br>
				<div class="container-login100-form-btn">
					<button class="login100-form-btn"><a href="signup.php">
						Sign UP</a>
					</button>
				</div>
			</form>	
		</div>
	</div>
<div id="dropDownSelect1"></div>
<?php include("footer.php");?>