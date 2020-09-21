<?php 

include("includes/config.php");
include("includes/classes/Artist.php");
include("includes/classes/Album.php");
include("includes/classes/Song.php");


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
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<title>Welcom to spotify Clone</title>
</head>
<body>
	
	<div class="mainContainer">

		<div id="topContainer">
			<?php include('includes/navBarContainer.php')?>	

		</div>
	
			

			<div id="mainViewContainer">
				<div id="mainContent">
