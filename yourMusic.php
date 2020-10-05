<?php
include("includes/includedFiles.php");

?>

<div class="playlistsContainer">
	<h2  class="playlistTitle">Playlists</h2>
	<div class="buttonItems">
		<button class="button green" onclick="createPlaylist();">Create Playlist</button>
	</div>


	<?php

		$username = $userLoggedIn->getUsername();
		$playlistsQuery = mysqli_query($conn,"SELECT * FROM playlists WHERE owner='$username'");

		if(mysqli_num_rows($playlistsQuery) == 0 ){
			echo "<span class='noResults'>No Playlists found </span>";
		}

		while($row=mysqli_fetch_array($playlistsQuery))
		{

			// echo $row['title'];
			$playlist = new Playlist($conn, $row);

			echo "<div class='gridViewItem' role='link' tabindex='0' onclick='openPage(\"playlist.php?id=" . $playlist->getId() . "\")'>

					<div class='playlistImage'>
							<img src='assets/images/icons/playlist.png'>
						</div>
						
					<div class='gridViewInfo'>"
						. $playlist->getName() .
					"</div>
				</div>
			";
		}

	?>






</div>
