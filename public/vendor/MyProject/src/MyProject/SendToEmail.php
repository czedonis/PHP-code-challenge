<?php
namespace MyProject;

class SendToEmail {
	private $emailTo,$emailFrom,$emailSubject;
	function __construct($to = null,$from = null,$subject = null) {
		$this->emailTo = (!empty($to)) ? $to: 'guy-smiley@example.com';
		$this->emailFrom = (!empty($from)) ? $from: 'guy-smiley@example.com';
		$this->emailSubject = (!empty($subject))?$subject:'Code Challenge Message for Mr. Smiley';	
	}
	
	public function sendEmail($name,$email,$message,$phone=null) {
		$emailTo = 'guy-smiley@example.com';
		$emailSubject = 'Code Challenge Message for Mr. Smiley';
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= "From: " . $this->emailFrom; 
		$msg = '<html>
		<head>
			<title>Hello Mr. Smiley, it seems you have another message.</title>
		</head>
		<body>
			<h1>Hello Mr. Smiley, it seems you have another message.</h1>
			<table cellspacing="0" style="border: 2px dashed #FB4314; width: 300px; height: 200px;">
				<tr>
					<th>Name:</th><td>' . $name->getContactName() . '</td>
				</tr>
				<tr style="background-color: #e0e0e0;">
					<th>Email:</th><td>' . $email->getEmail() . '</td>
				</tr>
				<tr>
					<th>Message:</th><td>' . $message->getMessage() . '</td>
				</tr>';
				if(!empty($phone)) {
		  $msg .= '<tr>
						<th>Phone(optional):</th><td>' . $phone->getPhone() . '</td>
					</tr>';
				}
		  $msg .='</table>
				</body>
			</html>';
		# Finished 
		return mail($this->emailTo, $this->emailSubject, $msg, $headers);
			
	}
} 