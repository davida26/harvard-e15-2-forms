<?php

require('helpers.php');
require('GetBeer.php');

use BeerU\Beer;

$showError = false;
$showDisplay = false;
$beerName = '';
$cleanData = '';
$option = '';


// Clean up the input
if(isset($_GET['beerName'])){
	$beerName = sanitize($_GET['beerName']);
}

// When there is no input, show an error
if($beerName == ''){
	$showError = true;
	$showErrorMsg = "Get Started with a Beer Name";
	$showDisplay = false;
} 

// if there are no errors, proceed to make API Call
if (!$showError) {
	// Encode the User Entered String before sending
	$name = urlencode($beerName);

	$beer = new Beer($name);

	// using class to make the api call/separate the api config
	$response = $beer->makeCall();
	$cleanData = json_decode($response, true);

	if(isset($cleanData["data"])){
		$getName = $cleanData["data"][0]["name"];
		$getCategory = $cleanData["data"][0]["style"]["category"]["name"];
		$getDescription = $cleanData["data"][0]["description"];
		$getGlass = $cleanData["data"][0]["glass"]["name"];
		$getImage = $cleanData["data"][0]["labels"]["large"];
		$getStatus = $cleanData["status"];
		$getABV = $cleanData["data"][0]["style"]["abvMax"];
	}
	
}

// If there are no beers matching that name, show a message
$resultsCount = count($cleanData);
if($resultsCount < 4 && !$showError){
	$showError = true;
	$showErrorMsg = 'Sorry, No Beers Match: ' . '<strong>' .$beerName . '</strong>';
} elseif ($resultsCount > 4) {
	$showDisplay = true;
}


// Checkbox checked or not
if(isset($_GET['showGlass'])){
	$showGlass = true;
} else {
	$showGlass = false;
}

// Check ABV
if(isset($_GET['abv'])){
	$option = $_GET['abv'];
	if($option == 'yes'){
		$showABV = true;
	}
	
}