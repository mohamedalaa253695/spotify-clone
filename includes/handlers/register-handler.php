<?php 

function sanitizeFormPassword($inputText) {
	$inputText = strip_tags($inputText);
	return $inputText;
}

function sanitizeFormUserName($inputText) {
	$inputText = strip_tags($inputText);
	$inputText = str_replace(" ", "", $inputText);
	return $inputText;
}

function sanitizeFormString($inputText) {
	$inputText = strip_tags($inputText);
	$inputText = str_replace(" ", "", $inputText);
	$inputText = ucfirst(strtolower($inputText));
	return $inputText;
}


if(isset($_POST['registerButton']))
{


	$userName= sanitizeFormUserName( $_POST['userName'] ) ;
	$firstName= sanitizeFormString($_POST['firstName']);
	$lastName= sanitizeFormString($_POST['lastName']);
	$email= sanitizeFormString($_POST['email']);
	$email2= sanitizeFormString($_POST['email2']);
	$password= sanitizeFormPassword($_POST['password']);
	$password2= sanitizeFormPassword($_POST['password2']);



	$userRegistered = $account->register($userName,$firstName,$lastName,$email,$email2,$password,$password2);


	// 
	//header("Location : index.php");
	if($userRegistered == true)
	{
	 	$_SESSION['userLggedIn'] = $userName;
		header("Location:index.php");
		//exit();
	}

	

}
	

	
	


?>
