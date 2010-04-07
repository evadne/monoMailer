<?php

//	lib.monoMailer.php
//	Evadne Wu at Iridia, 2010





//	For brevity’s sake.  Base 64 Wrapper for MIME mailing.

	function _B64W ($inString, $processRecipient = false){
	
		if (!$processRecipient)
		return '=?UTF-8?B?' . base64_encode($inString) . '?=';

	//	Process Email Recipients — hurdle email recipient

		$inString = explode("<", $inString);
		return "=?UTF-8?B?" . $inString[0] . "?= <" . $inString[1];
	
	}





	function MNSendMail($varFrom, $varTo, $varSubject, $varMessage, $contentType='text/plain') {

		$varTo = _B64W ($varTo, true);
		$varFrom = _B64W ($varFrom, true);
		$varSubject = _B64W ($varSubject);
	
		$varMailHeader = "MIME-Version: 1.0"
			. "\n" . "Content-type: " . $contentType . "; charset=UTF-8"
			. "\n" . "From: " . $varFrom
			. "\n" . "X-Mailer: PHP"
			. "\n";

		return mail(
		
			$varTo, 
			$varSubject,
			$varMessage,
			$varMailHeader
		
		);		  

	}
	
	
	
	
	
	
	
	
	
	
	class MMAddressee {
		    	
		public $recipientName, $recipientAddress;
		
		public function __construct ($inRecipientName, $inRecipientAddress) {
		
			$this->recipientName = $inRecipientName;
			$this->recipientAddress = $inRecipientAddress;
		
		}
		
		public function __toString () {
		
			return $this->recipientName . " <"  . $this->recipientAddress . ">";
		
		}
	
	}
	
	
	
	
	

?>