<?php 

include("includes/config.php");

//session_destroy();
if(isset($_SESSION['userLoggedIn']))
{
$userLoggedIn=$_SESSION['userLoggedIn'];

}
else
{
	header("Location:register.php");
}




?>




<!DOCTYPE html>
<html>
<head>
	<title>Welcom to spotify Clone</title>
</head>
<body>
	HELLo
</body>
</html>