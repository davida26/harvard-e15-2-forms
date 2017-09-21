<?php

require('helpers.php');

$config = parse_ini_file('config.ini', true);

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

// if there is input check to see if the beer exists
if (!$showError) {
	// Encode the User Entered String
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

