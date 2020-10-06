<?php

include("../../config.php");

if(isset($_POST['playlistId']) && isset($_POST['songId'])   ){
	$playlistId = $_POST['playlistId'];
	$songId = $_POST['songId'];
	$playlistQuery =  mysqli_query($conn,"DELETE FROM playlistSongs WHERE playlistId='$playlistId' AND songId='$songId'");
}
else{
	echo"PlaylistId or songId was not passed into removeFromPlaylist.php";
}

?>