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
	<title>Spotify Clone</title>
</head>
<body>
	<div class="inputContainer">
		<form id="loginForm" action="register.php" method="POST">
			<h2>Login to your account </h2>
			<p> 
				<?php echo $account->getError(Constants::$loginFailed);?>
				<label for="loginUserName">Username</label>
				<input id="loginUserName" type="text" name="loginUserName" placeholder="e.g. Mohamed Alaa"  required>
				
			</p>
			<p>
				<label for="loginPassword">Password</label>
				<input id="loginPassword" type="password" name="loginPassword"  placeholder="your password"  required>
				
			</p>
			<button type="submit" name="loginButton" >LOG IN</button>

		</form>



		<form id="RegisterForm" action="register.php" method="POST">
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



		</form>


	</div>
</body>
</html>