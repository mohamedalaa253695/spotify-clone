
<?php 

function sanitizeFormPassword($inputText)
{
	$inputText=strip_tags($inputText);
	return $inputText;

}

function sanitizeFormUserName($inputText)
{
	$inputText=strip_tags($inputText);
	$inputText= str_replace(" ","",$inputText);
	return $inputText;

}
function sanitizeFormString($inputText)
{
	$inputText=$_POST['inputText'];
	$inputText=strip_tags($inputText);
	$inputText= str_replace(" ","",$inputText);
	$inputText= ucfirst(strtolower($inputText));
	return $inputText;

}


if(isset($_POST['registerButton']))
{
	$userName= sanitizeFormUserName( $_POST['userName'] ) ;
	$firstName= sanitizeFormString($POST['firstName']);
	$lastName= sanitizeFormString($POST['lastName']);
	$email= sanitizeFormString($POST['email']);
	$email2= sanitizeFormString($POST['email2']);
	$password= sanitizeFormPassword($POST['password']);
	$password2= sanitizeFormPassword($POST['password2']);

	$userRegistered = $account->register($userName,$firstName,$lastName,$email,$email,$password,$password2);
	
	if($userRegistered)
	{
		header("Location : index.php");
	}

}
	

	
	
	//echo $userName;


?>
