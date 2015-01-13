<?php

class JosephRTApi {
	const API_BASE_URL = 'http://api.rottentomatoes.com/api/public/v1.0/movies.json';
	const API_KEY = '9vc3j8rsnkh72tgqpny7bxhn';

	/**
	 * get the API url
	 * @return 	string
	 */
	public static function getApiUrl()
	{
		return self::API_BASE_URL . '?apikey=' . self::API_KEY;
	}

	/**
	 * gets the API url together with the parameters
	 * @param 	string $q - the search query term
	 * @param 	string $page_limit (optional) - page limit of the search results (default: 30)
	 * @return 	string
	 */
	public static function getApiUrlWithParams($q, $page_limit = 30)
	{
		return self::getApiUrl() . '&q=' . $q . '&page_limit=' . $page_limit;
	}

	public static function getSearchTerms()
	{
		return array('red', 'green', 'blue', 'yellow');
	}

}