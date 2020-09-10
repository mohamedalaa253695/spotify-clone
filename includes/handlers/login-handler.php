


<?php  

if(isset($_POST['loginButton']))
{
	$userName=$_POST['loginUserName'];
	$password=$_POST['loginPassword'];

	$userExists = $account->login($userName,$password);

	if($userExists)
	{
		$_SESSION['userLoggedIn'] = $userName;

		header("Location:index.php");
	}



}










?>