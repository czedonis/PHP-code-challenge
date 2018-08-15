<?php 

namespace MyProject\Tests\Model;

use PHPUnit\Framework\TestCase;
use MyProject\Model\ContactName;

class ContactNameTest extends TestCase {	
	/**
	 * @expectedException InvalidArgumentException
	 * @expectedExceptionMessage Invalid: Name not valid
	 */
	public function testThrowsExceptionWhenInvalidName() {
		$stringInput = str_repeat('v', 101);
		$name = new ContactName($stringInput);
	}
	
	/**
	 * @expectedException InvalidArgumentException
	 * @expectedExceptionMessage Invalid: Name not valid
	 */
	public function testThrowsExceptionWhenNullName() {
		$name = new ContactName('');
	}
	
	public function testNameCreationExpectedData() {
		$name = new ContactName('Cat zedonis');
		$this->assertNotEmpty( $name->getContactName());
	}
}