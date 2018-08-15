<?php

namespace MyProject;

class SaveToDb {
	private $db;
	
	public function __construct($db) {
		$this->db = $db;
		$this->db->connect();
	}
	public function saveValues($name,$email,$message,$phone=null) {
		$cleanInput = array(':name',':email',':message');
		$columns = array('name','email','message');
		$executeValues = array(':name' => $name->getContactName(),
								   ':email' => $email->getEmail(),
								   ':message' => $message->getMessage()
								   );
		if(!empty($phone)) {
			$cleanInput[] = ':phone';
			$columns[] = 'phone';
			$executeValues = array(':name' => $name->getContactName(),
								   ':email' => $email->getEmail(),
								   ':message' => $message->getMessage(),
								   ':phone' => $phone->getPhone()
								   );
		}
		
		$sbh = $this->db->prepare('INSERT INTO messages (' . implode(',',$columns) . ') VALUES (' . implode(',',$cleanInput) . ')');
		
		return $sbh->execute($executeValues);
	}


}
class MysqlDb implements DatabaseConnection {
	private $dbh;
	public function connect() {
		$this->dbh = new \PDO('mysql:host=localhost;dbname=smiley', 'root', '',array(
	  \PDO::ATTR_ERRMODE => \PDO::ERRMODE_WARNING
	));
	}
	public function prepare(string $statement, array $driver_options = array()) {
		return $this->dbh->prepare($statement, $driver_options);
	}
}
interface DatabaseConnection {
	public function connect();
	public function prepare(string $statement, array $driver_options = array());
}