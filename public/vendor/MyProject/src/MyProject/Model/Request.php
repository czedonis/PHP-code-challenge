<?php
namespace MyProject\Model;

class Request {
	private $name,$email,$message,$phone;
	
	public function __construct($name,$email,$message,$phone = null) {
		$this->name = new ContactName($name);
		$this->email = new Email($email);
		$this->message = new Message($message);
		if(!empty($phone))
			$this->phone = new Phone($phone);
			
			
			
	}
	public function getName() {
		return $this->name;
	}
	public function getEmail() {
		return $this->email;
	}
	public function getMessage() {
		return $this-> message;
	}
	public function getPhone() {
		return $this->phone;
	}


}