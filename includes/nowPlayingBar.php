<?php 

$songQuery = mysqli_query($conn,"SELECT id FROM songs ORDER BY RAND() LIMIT 10");

$resultArray=array();

while($row=mysqli_fetch_array($songQuery))
{
	array_push($resultArray,$row['id']);
}


$jsonArray=json_encode($resultArray);

?>

<script>
	

	$(document).ready(function(){
		currentPlaylist = <?php echo $jsonArray; ?>;
		audioElement=new Audio();
		setTrack(currentPlaylist[0] , currentPlaylist , false);

	});


	function setTrack(trackId,newPlaylist,play){
		//audioElement.setTrack("assets/music/bensound-anewbeginning.mp3");
		$.post("includes/handlers/ajax/getSongJson.php",{songId : trackId},function(data){
			var track=JSON.parse(data);
			$(".trackName span").text(track.title);

			$.post("includes/handlers/ajax/getArtistJson.php", { artistId: track.artist }, function(data) {
			var artist = JSON.parse(data);
			$(".artistName span").text(artist.name);
			});

			$.post("includes/handlers/ajax/getAlbumJson.php", { albumId: track.album }, function(data) {
			var album = JSON.parse(data);
			//console.log(album);
			$(".albumLink img").attr("src",album.artworkPath);
			});


			audioElement.setTrack(data.path);
			audioElement.pause();
		});




		if(play == true)
		{
			audioElement.play();
		}

		
	}

	function playSong(){
			$(".controlButton.play").hide();
			$(".controlButton.pause").show();
			audioElement.play();
		}

		function pauseSong(){
			$(".controlButton.play").show();
			$(".controlButton.pause").hide();
			audioElement.pause();
		}
</script>




<div id="nowPlayingBarContainer">
	<div id="nowPlayingBar">
		
		<div id="nowPlayingLeft">
			<span class="albumLink">
				<img  src="" class="albumArtwork"></img>
			</span>
			<div class="trackInfo">
				<span class="trackName">
					<span></span>
				</span>
				<span class="artistName">
					<span></span>
				</span>
			</div>
		</div>

		<div id="nowPlayingCenter">
			<div class="content playerControls">
				<div class="buttons">
					<button class="controlButton shuffl" title="shuffl">
						<img src="assets/images/icons/shuffle.png" alt="shuffle">
					</button>
					<button class="controlButton previous" title="previous">
						<img src="assets/images/icons/previous.png" alt="Previous">
					</button>
					<button class="controlButton play" title="play" onclick="playSong();">
						<img src="assets/images/icons/play.png" alt="play">
					</button>
						<button class="controlButton pause" title="pause"   style="display: none;" onclick="pauseSong();">
						<img src="assets/images/icons/pause.png" alt="pause">
					</button>
					<button class="controlButton next" title="next">
						<img src="assets/images/icons/next.png" alt="next">
					</button>
					<button class="controlButton repeat" title="repeat">
						<img src="assets/images/icons/repeat.png" alt="repeat">
					</button>
				
				</div>
				<div class="playbackBar">
					<span class="progressTime current">0.00</span>
					<div class="progressBar">
						<div class="progressBarBg">
							<div class="progress"></div>
						</div>
					</div>
					<span class="progressTime remaining">0.00</span>
				</div>
			</div>
		</div>

		<div id="nowPlayingRight">
			<div class="volumeBar">
				<button class="controlButton volume" title="Volune button">
					<img src="assets/images/icons/volume.png" alt="Volume">
				</button>
				<div class="progressBar">
						<div class="progressBarBg">
							<div class="progress"></div>
						</div>
				</div>

			</div>
		</div>

	</div>	
</div>