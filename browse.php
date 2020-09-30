
<?php 

include('includes/includedFiles.php');


?>		




<h1  class="pageHeadingBig">You Might Also Like</h1>

<div class="gridViewContainer">
	<?php

		$albumQuery = mysqli_query($conn,"SELECT * FROM albums ORDER By RAND()");
		while($row=mysqli_fetch_array($albumQuery))
		{

			// echo $row['title'];

			echo "<div class='gridViewItem'>
						<span  role='link' tabindex='0' onclick='openPage(\"album.php?id=".$row['id']."\")' >
					<img src='".$row['artworkPath']."'>
					<div class='gridViewInfo'>"
						.$row['title'].
					"</div>
					</span>
				</div>
			";
		}

	?>

</div>



