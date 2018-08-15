<?php 

namespace MyProject\Tests;
use MyProject\Model;
use PHPUnit\Framework\TestCase;
use MyProject\Model\DatabaseConnection;
use MyProject\Model\ContactName;
use MyProject\Model\Email;
use MyProject\Model\Message;
use MyProject\Model\Phone;
use MyProject\SaveToDb;

class SubjectTest extends TestCase
{
    public function testInputWoPhone()
    {
		$statement = $this->getMockBuilder(stdClass::class)
                         ->setMethods(['execute'])
                         ->getMock();
					
		$statement->expects($this->once())
                 ->method('execute')
                 ->with($this->equalTo(array(':name' => 'Carl',':email' => 'Broccoli@email.com',':message' => 'hello')));
				 
        $MySqldb = $this->getMockBuilder(MySqldb::class)
                         ->setMethods(['connect','prepare'])
                         ->getMock();
		$MySqldb->expects($this->once())
                 ->method('connect');
                 
        $MySqldb->expects($this->once())
                 ->method('prepare')
                 ->with($this->equalTo("INSERT INTO messages (name,email,message) VALUES (:name,:email,:message)")
                    )->willReturn($statement);
		
                    

        $testSaveToDb = new SaveToDb($MySqldb);
			$testSaveToDb->saveValues(new ContactName('Carl'),new Email('Broccoli@email.com'),new Message('hello'));


    }
	    public function testInputWithPhone()
    {
		
		$statement = $this->getMockBuilder(stdClass::class)
                         ->setMethods(['execute'])
                         ->getMock();
					
		$statement->expects($this->once())
                 ->method('execute')
                 ->with($this->equalTo(array(':name' => 'Carl',':email' => 'Broccoli@email.com',':message' => 'hello',':phone' => 9999999999)));
        // Create a mock for the Observer class, mocking the
        // reportError() method
        $MySqldb = $this->getMockBuilder(MySqldb::class)
                         ->setMethods(['connect','prepare'])
                         ->getMock();
		$MySqldb->expects($this->once())
                 ->method('connect');
              

        $MySqldb->expects($this->once())
                 ->method('prepare')
                 ->with($this->equalTo("INSERT INTO messages (name,email,message,phone) VALUES (:name,:email,:message,:phone)"))
				 ->willReturn($statement);

        $testSaveToDb = new SaveToDb($MySqldb);
        $testSaveToDb->saveValues(new ContactName('Carl'),new Email('Broccoli@email.com'),new Message('hello'),new Phone(9999999999));

    }
}
