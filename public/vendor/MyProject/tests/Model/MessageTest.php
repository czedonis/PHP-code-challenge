<?php 

namespace MyProject\Tests\Model;

use PHPUnit\Framework\TestCase;
use MyProject\Model\Message;

class MessageTest extends TestCase {	
	/**
	 * @expectedException InvalidArgumentException
	 * @expectedExceptionMessage Invalid: message
	 */
	public function testThrowsExceptionWhenInvalidMessage() {
		$stringInput = str_repeat('v', 501);
		$message = new Message($stringInput);
	}
	
	/**
	 * @expectedException InvalidArgumentException
	 * @expectedExceptionMessage Invalid: message
	 */
	public function testThrowsExceptionWhenNullMessage() {
		$message = new Message(null);
	}
	
	public function testMessageCreationExpectedData() {
		$stringInput = 'Lorem ipsum dolor sit amet';
		$message = new Message($stringInput);
		$this->assertEquals($stringInput, $message->getMessage());
	}
}