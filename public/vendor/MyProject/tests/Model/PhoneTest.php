<?php 

namespace MyProject\Tests\Model;

use PHPUnit\Framework\TestCase;
use MyProject\Model\Phone;

class PhoneTest extends TestCase {	
	/**
	 * @expectedException InvalidArgumentException
	 * @expectedExceptionMessage Invalid phone number
	 */
	public function testThrowsExceptionWhenInvalidNumberOfCharacters() {
		$phone = new Phone(19999999999999999999);
	}
	/**
	 * @expectedException InvalidArgumentException
	 * @expectedExceptionMessage Invalid phone number
	 */
	public function testThrowsExceptionWhenInvalidCharacters() {
		$phone = new Phone('fdalf;ajdfikljfweioewiof');
	}
	
	/**
	 * @expectedException InvalidArgumentException
	 * @expectedExceptionMessage Invalid phone number
	 */
	public function testThrowsExceptionWhenNullPhone() {
		$phone = new Phone(null);
	}
	
	public function testPhoneCreationExpectedData() {
		$phone = new Phone(8888888888);
		$this->assertEquals(8888888888, $phone->getPhone());
	}
}