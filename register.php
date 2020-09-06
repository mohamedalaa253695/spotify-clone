
<?php 
if(isset($_POST['loginButton']))
{
	echo "loginbutton pressed";
}
if(isset($_POST['registerButton']))
{
		echo "registerbutton pressed";

}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Spotify Clone</title>
</head>
<body>
	<div class="inputContainer">
		<form id="loginForm" action="register.php" method="POST">
			<h2>Login to your account </h2>
			<p>
				<label for="loginUserName">Username</label>
				<input id="loginUserName" type="text" name="loginUserName" placeholder="e.g. Mohamed Alaa" required>
				
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
				<label for="userName">Username</label>
				<input id="userName" type="text" name="userName" placeholder="e.g. Mohamed Alaa" required>
				
			</p>

			<p>
				<label for="firstName">FirstName</label>
				<input id="firstName" type="text" name="firstName" placeholder="e.g. Mohamed" required>
				
			</p>
			<p>
				<label for="lastName">LastName</label>
				<input id="lastName" type="text" name="lastName" placeholder="e.g.  Alaa" required>
				
			</p>
			<p>
				<label for="email">Email</label>
				<input id="email" type="email" name="email" placeholder="e.g. MohamedAlaa@mohameddemos.com" required>
				
			</p>
			<p>
				<label for="email2">Confirm email</label>
				<input id="email2" type="email" name="email2" placeholder="e.g. MohamedAlaa@mohameddemos.com" required>
				
			</p>
			


			<p>
				<label for="Password">Password</label>
				<input id="Password" type="password" name="password" placeholder="your password" required>
				
			</p>
			<p>
				<label for="Password2">Confirm Password</label>
				<input id="Password2" type="password" name="pasword2"  placeholder="confirm your password"  required>
				
			</p>
			<button type="submit" name="registerButton" >SIGN UP</button>

		</form>


	</div>
</body>
</html>