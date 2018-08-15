<?php 

namespace MyProject\Tests\Model;

use PHPUnit\Framework\TestCase;
use MyProject\Model\Request;

class RequestTest extends TestCase {	
	/**
	 * @expectedException InvalidArgumentException
	 * @expectedExceptionMessage Invalid email
	 */
	public function testThrowsExceptionEmail() {
		$request = new Request('Name','blue','','');
	}
	/**
	 * @expectedException InvalidArgumentException
	 * @expectedExceptionMessage Invalid: Name not valid
	 */
	 public function testThrowsExceptionName() {
		$request = new Request(str_repeat('v', 101),'','','');
	}
		/**
	 * @expectedException InvalidArgumentException
	 * @expectedExceptionMessage Invalid: message
	 */
	 public function testThrowsExceptionMessage() {
		$request = new Request('Name','Email@email.com',str_repeat('v', 501),'');
	}
	public function testRequestCreationNoPhone() {
		$request = new Request('Name','Email@email.com','message');
		$this->assertEquals('Name', $request->getName()->getContactName());
	}
	
	public function testRequestCreationExpectedData() {
		$request = new Request('Name','Email@email.com','message',9999999999);
		$this->assertEquals(9999999999, $request->getPhone()->getPhone());
		
	}
}