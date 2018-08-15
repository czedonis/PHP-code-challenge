<?php 

namespace MyProject\Model;

class Message {
	private $message;
	
	public function __construct($message) {
		if (empty($message) || strlen($message) > 500) {
			throw new \InvalidArgumentException("Invalid: message");
		}
		
		$this->message = $message;
	}
	
	public function getMessage() {
		return $this->message;
	}
}