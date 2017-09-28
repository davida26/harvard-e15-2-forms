<?php

namespace BeerU;

Class Beer
{


	/**
	* Properties
	*/
	private $beerName;
	public $response;
	private $baseURL;



	public function __construct($name){
		$this->beerName = $name;
	}


	public function makeCall(){
		$config = parse_ini_file('config.ini', true);

		$baseURL = 'http://api.brewerydb.com/v2/beers/?key=' . $config['api_key'] . '&name=' . $this->beerName;

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL, $baseURL);
		$response = curl_exec($ch);
		curl_close($ch);
		
		return $response;

	}
	

}