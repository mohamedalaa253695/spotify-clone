<?php
include("includes/includedFiles.php");

?>


<div class="entityInfo">
	<div class="userInfo">
		<h1><?php echo $userLoggedIn->getFirstAndLastName();  ?></h1>		

	</div>

	<div class="buttonItems">
		<button class="button" onclick="openPage('updateDetails.php')">User Details</button>
		<button class="button" onclick="logout()">Log OUt</button>
	</div>



</div>