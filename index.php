
<?php include('includes/header.php');?>		




<h1  class="pageHeadingBig">that should work</h1>

<div class="gridViewContainer">
	<?php

		$albumQuery = mysqli_query($conn,"SELECT * FROM albums ORDER By RAND()");
		while($row=mysqli_fetch_array($albumQuery))
		{

			// echo $row['title'];

			echo "<div class='gridViewItem'>
					<a href='album.php?id=".$row['id']."'>
					<img src='".$row['artworkPath']."'>
					<div class='gridViewInfo'>"
						.$row['title'].
					"</div>
					</a>
				</div>
			";
		}

	?>

</div>


<?php include('includes/footer.php');?>			

