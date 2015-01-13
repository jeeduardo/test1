<?php

require_once 'JosephRTApi.php';
require_once 'helper.php';

$ch = curl_init();
$movie_collections = getMovies($ch);

curl_close($ch);

?>
<html>
<head>
	<link rel="stylesheet" href="style.css" type="text/css">
	<title>Rotten Tomatoes API Test for Emapta - Josephson Eduardo</title>
	<script src="jquery-1.11.0.min.js" type="text/javascript"></script>
</head>
<body>
Under construction. Launching of test site set on 01/14/2015. Thank you.
@TODO: create template first!
<div id="wrapper">
	<div id="movie-color-nav">
		<ul class="nav">
			<li>
				<a href="#">All</a>
			</li>
			<?php echo getColorsNav(); ?>
		</ul>
	</div>
	<div id="content">
		<?php
		foreach ($movie_collections as $term => $movies) {
			foreach ($movies as $movie) { ?>
				<div id="movie-<?php echo $movie['id']; ?>" data-color="<?php echo $term; ?>" class="movie">
					<div class="<?php echo $term; ?> inner">
						<img src="<?php echo $movie['posters']['original']; ?>"><br>
						<a href="<?php echo $movie['links']['alternate']; ?>">
							<?php echo preg_replace("/$term/i", strtoupper($term), $movie['title']); ?>
						</a><br>					
						Year: <?php echo $movie['year']; ?><br>
						Runtime: <?php echo $movie['runtime']; ?> minutes <br>
					</div>
				</div>
		<?php }
		} ?>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$('.nav a').click(function(e){
		e.preventDefault();
		color = $(this).data('color');
		$('div.movie').removeClass('none');	
		if (color) {
			// alert(color + '!!!');
			$('div.movie[data-color!="' + color +'"]').addClass('none');	
		}
	});
});
</script>
</body>
</html>