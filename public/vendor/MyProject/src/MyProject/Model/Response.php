<?php
namespace MyProject\Model;

class Response {
	private $success,$message;
	
	public function __construct($success,$message=null) {
		$this->success = $success;
		$this->message = $message;
			
	}
	public function getMessage() {
		return $this->message;
	}
	public function getSuccess() {
		return $this->success;
	}
	
	public function serialize() {
		$responseReturn = array('success' => $this->getSuccess(),'message' => $this->getMessage());
        return json_encode($responseReturn);
	}

}