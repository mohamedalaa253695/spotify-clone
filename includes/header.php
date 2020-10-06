<?php 

include("includes/config.php");
include("includes/classes/User.php");
include("includes/classes/Artist.php");
include("includes/classes/Album.php");
include("includes/classes/Song.php");
include("includes/classes/Playlist.php");

//session_destroy();
if(isset($_SESSION['userLoggedIn']))
{
	$userLoggedIn = new User($conn,$_SESSION['userLoggedIn']);
	$username 	  = $userLoggedIn->getUsername();
	echo "<script>userLoggedIn ='$username'; </script>";

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
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

	<script src="assets/js/scripts.js"></script>
	<title>Welcom to spotify Clone</title>
</head>
<body>
	
	<div class="mainContainer">

		<div id="topContainer">
			<?php include('includes/navBarContainer.php')?>	

		
	
			

			<div id="mainViewContainer">
				<div id="mainContent">


