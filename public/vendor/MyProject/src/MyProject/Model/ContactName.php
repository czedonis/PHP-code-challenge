<?php 

namespace MyProject\Model;

class ContactName {
	private $contactName;
	
	public function __construct($contactName) {	
		if(empty($contactName) || strlen($contactName) > 100) {
			throw new \InvalidArgumentException("Invalid: Name not valid");
		}
		
		$this->contactName = $contactName;
	}
	
	public function getContactName() {
		return $this->contactName;
	}
}