<?php 

namespace MyProject\Tests\Model;

use PHPUnit\Framework\TestCase;
use MyProject\Model\Response;

class ResponseTest extends TestCase {	

	public function testResponseCreationNoPhone() {
		$response = new Response(true);
		$this->assertEquals(true, $response->getSuccess());
	}
	
	public function testResponseCreationExpectedData() {
		$response = new Response(true,'Name');
		$this->assertEquals('Name', $response->getMessage());
		
	}
}