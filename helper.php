<?php


/*
load the movies with red/green/blue/yellow terms in it
@param 		resource $ch (resource used for the cURL connection)
@return 	array
*/
function getMovies($ch)
{
	$movie_collections = array();
	foreach (JosephRTApi::getSearchTerms() as $term) {
		// search per color
		$url = JosephRTApi::getApiUrlWithParams(urlencode($term));

		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPGET, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Accept: application/json'
		));

		$result = curl_exec($ch);

		$result = json_decode($result, true);
		$result = $result['movies'];
		$movie_collections[$term] = $result;

	}
	return $movie_collections;
}

/*
 * load the colors used for the search terms as <li> HTML
 * @return 	string
 */
function getColorsNav()
{
	$color_nav = '';
	foreach (JosephRTApi::getSearchTerms() as $term) {
		$color_nav .= '<li><a href="#"'
			. ' data-color="' . $term . '">' . ucfirst($term)
			. '</a></li>';
	}
	return $color_nav;
}