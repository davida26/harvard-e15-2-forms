<?php

require('helpers.php');

function removeVowels($myArray){
	$newArray = [];
	foreach ($myArray as $key => $vowel) {
		$vowelsArray = ['a','e','i','o','u'];
		$vowel = strtolower($vowel);
		if(!in_array($vowel, $vowelsArray)){
				array_push($newArray, $vowel);
		}
	}
	return $newArray;
}

dump(removeVowels(['a', 'p', 'p', 'l', 'e']));;
