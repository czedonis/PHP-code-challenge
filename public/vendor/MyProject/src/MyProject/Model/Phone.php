<?php 

namespace MyProject\Model;

class Phone {
	private $phone;
	
	public function __construct($phone) {	
		if(!preg_match('/^[1-9][0-9]{9}$/', $phone)) {
			throw new \InvalidArgumentException("Invalid phone number");
		}
		
		$this->phone = $phone;
	}
	
	public function getPhone() {
		return $this->phone;
	}
}