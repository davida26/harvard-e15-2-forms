<?php

namespace DWA;

class Email {
	
	private $receipient;

	public function __construct($receipient){
		$this => receipient = $receipient;
	}

	public send($subject, $message){
		return mail($this->recipient, $subject, $message);
	}

}