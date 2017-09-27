<?php 

namespace BeerU;

class API
{

	# Properties
	private $request
	public $showError = false;
	// public $getName, $getCategory, $getDescription, $getGlass, $getImage, $getStatus, $getABV;

	/**
    * 
    * Defines Request Type
    * Currently only uses GET to retrieve a beer from breweryDBAPI
    * TODO - implement POST functionality to add missing beers
    *
    * $form = new BeerU\API($_GET);
    */
	public function __construct($postOrGet)
	{
		$this->request = $postOrGet;
	}


	/**
    * Returns True if *either* GET or POST have been submitted
    */
	public function isSubmitted()
	{
		return $_SERVER['REQUEST_METHOD'] == 'POST' || !empty($_GET);
	}

	public function makeRequest($beerName)
	{
		$name = urlencode($beerName);

		$baseURL = 'http://api.brewerydb.com/v2/beers/?key=' . $config['api_key'] . '&name=' . $name;

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL, $baseURL);

		$response = curl_exec($ch);

		$cleanData = json_decode($response, true);

		$getName = $cleanData["data"][0]["name"];
		$getCategory = $cleanData["data"][0]["style"]["category"]["name"];
		$getDescription = $cleanData["data"][0]["description"];
		$getGlass = $cleanData["data"][0]["glass"]["name"];
		$getImage = $cleanData["data"][0]["labels"]["large"];
		$getStatus = $cleanData["status"];
		$getABV = $cleanData["data"][0]["style"]["abvMax"];

		curl_close($ch);
	}







}