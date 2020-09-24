

<?php
include("../../config.php");
	//echo"ajax";

if(isset($_POST['songId'])){
	$songId = $_POST['songId'];
	//echo"ajax";
	$query = mysqli_query($conn,"SELECT * FROM songs WHERE id='$songId'");
	$resultArray = mysqli_fetch_array($query);

	echo json_encode($resultArray);
}





?>
