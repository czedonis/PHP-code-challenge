<?php 

namespace MyProject\Tests\Model;

use PHPUnit\Framework\TestCase;
use MyProject\Model\Email;

class EmailTest extends TestCase {	
	/**
	 * @expectedException InvalidArgumentException
	 * @expectedExceptionMessage Invalid email
	 */
	public function testThrowsExceptionWhenInvalidEmail() {
		$email = new Email('fdalf;ajdfikljfweioewiof');
	}
	
	/**
	 * @expectedException InvalidArgumentException
	 * @expectedExceptionMessage Invalid email
	 */
	public function testThrowsExceptionWhenNullEmail() {
		$email = new Email(null);
	}
	
	public function testEmailCreationExpectedData() {
		$email = new Email('czedonis@dealerinspire.com');
		$this->assertEquals('czedonis@dealerinspire.com', $email->getEmail());
	}
}