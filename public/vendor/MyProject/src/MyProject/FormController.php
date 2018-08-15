<?php
namespace MyProject;

include('..\..\vendor\autoload.php');

use MyProject\SendToEmail;
use MyProject\SaveToDb;
use MyProject\Model\Response;
use MyProject\Model\Request;
	
$request = new Request($_POST['fullName'],$_POST['contactEmail'],$_POST['smileyMessage'],$_POST['phoneNumber']);
$mySqlDb = new MysqlDb();
$dbPass = new SaveToDb($mySqlDb);

$dbResult = $dbPass->saveValues($request->getName(),$request->getEmail(),$request->getMessage(),$request->getPhone());
$emailPass = new SendToEmail();
$emailResult = $emailPass->sendEmail($request->getName(),$request->getEmail(),$request->getMessage(),$request->getPhone());
$result = ($dbResult == true && $emailResult == true) ? true : false;
	
$message = ($result == true) ? 'Thank you for your Message' : 'Please try again later';
$response = new Response($result,$message);

echo $response->serialize();