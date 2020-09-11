<?php
ini_set('display_errors', 1);
 //init_set('display_startup_errors', 1);
 //error_reporting(E_ALL);
try
{

include('includes/config.php');
include('includes/classes/Account.php');
include('includes/classes/Constants.php');
$account = new Account($conn);
//$account->register();
//cho "here";

include("includes/handlers/register-handler.php");
//echo "register handler";

include("includes/handlers/login-handler.php");
//echo "Login  handler";

}
catch(Exception $e)
{
	echo $e;
} 
function getInputValue($name){
	if(isset($_POST[$name]))
	{
		echo $_POST[$name];
	}
}

?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="assets/css/register.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="assets/js/register.js"></script>
	<title>Spotify Clone</title>

</head>
	<body>
		<?php

		if(isset($_POST['registerButton']))
		{
			echo '<script >
					$(document).ready(function(){
					
					$("#registerForm").show();
					$("#loginForm").hide();
					});
				</script>';
		}
		else
		{
			echo '<script >
					$(document).ready(function(){
					$("#loginForm").show();
					$("#registerForm").hide();
					});
				</script>';
		}

		?>
		
		<div id="background">

			<div id = "loginContainer" >

				<div id="inputContainer">
					<form id="loginForm" action="register.php" method="POST">
						<h2>Login to your account </h2>
						<p> 
							<?php echo $account->getError(Constants::$loginFailed);?>
							<label for="loginUserName">Username</label>
							<input id="loginUserName" type="text" name="loginUserName" placeholder="e.g. Mohamed Alaa" value="<?= getInputValue('loginUserName');?>" required>
							
						</p>
						<p>
							<label for="loginPassword">Password</label>
							<input id="loginPassword" type="password" name="loginPassword"  placeholder="your password"  required>
							
						</p>
						<button type="submit" name="loginButton" >LOG IN</button>
						<div class = "hasAccountText">
							<span id="hideLogin">Don't have an account yet? Signup here.</span>

						</div>
					</form>



					<form id="registerForm" action="register.php" method="POST">
						<h2>Create your free account </h2>
						<p>
							<?php echo $account->getError(Constants::$userNameCharacters);?>
							<?php echo $account->getError(Constants::$userNameTaken);?>
							<label for="userName">Username</label>
							<input id="userName" type="text" name="userName" placeholder="e.g. Mohamed Alaa" value="<?= getInputValue('userName');?>" required>
							
						</p>

						<p>
							<?php echo $account->getError(Constants::$firstNameCharactars);?>
							<label for="firstName">FirstName</label>
							<input id="firstName" type="text" name="firstName" placeholder="e.g. Mohamed" value="<?= getInputValue('firstName');?>" required>
							
						</p>
						<p>
							<?php echo $account->getError(Constants::$lastNameCharacters);?>
							<label for="lastName">LastName</label>
							<input id="lastName" type="text" name="lastName" placeholder="e.g.  Alaa" value="<?= getInputValue('lastName');?>" required>
							
						</p>
						<p>
							<?php echo $account->getError(Constants::$emailsDoNotMatch);?>
							<?php echo $account->getError(Constants::$emailInvalide);?>
							<?php echo $account->getError(Constants::$emailTaken);?>

							<label for="email">Email</label>
							<input id="email" type="email" name="email" placeholder="e.g. MohamedAlaa@mohameddemos.com" value="<?= getInputValue('email');?>" required>
							
						</p>
						<p>
							<label for="email2">Confirm email</label>
							<input id="email2" type="email" name="email2" placeholder="e.g. MohamedAlaa@mohameddemos.com" value="<?= getInputValue('email2');?>" required>
							
						</p>
						


						<p>
							<?php echo $account->getError(Constants::$passwordsDoNotMatch);?>
							<?php echo $account->getError(Constants::$passwordNotAlphanumeric);?>
							<?php echo $account->getError(Constants::$passwordCharacters);?>

							<label for="Password">Password</label>
							<input id="Password" type="password" name="password" placeholder="your password"  required>
							
						</p>
						<p>
							<label for="Password2">Confirm Password</label>
							<input id="Password2" type="password" name="password2"  placeholder="confirm your password"  required>
							
						</p>
						<button type="submit" name="registerButton" >SIGN UP</button>
						<div class = "hasAccountText">
							<span id="hideRegister">Already have an account? Log in here.</span>
						</div>


					</form>


				</div>
				<div id="loginText">
				<h1>Get great music right now </h1>
				<h2>Listen to loads of songs for free</h2>
				<ul>
				 
				  <li>Discover music you'll fall in love with</li>
				  <li>Create your own playlists</li>	
				  <li>Follow artists to keep up to date</li>
				</ul>
			</div>
			</div>
			
	</div>
	</body>
</html>