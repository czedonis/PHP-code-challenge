<?php 

namespace MyProject\Model;

class Email {
	private $email;
	
	public function __construct($email) {	
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			throw new \InvalidArgumentException("Invalid email");
		}
		
		$this->email = $email;
	}
	
	public function getEmail() {
		return $this->email;
	}
}