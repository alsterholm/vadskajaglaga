<?php
	/**
	Klassen sköter utskicken av mail som sker från hemsidan

	*/
	class Mail{


		public static function send($to_name, $to_email, $subject = null, $message = null, $from = null){

			if(!$subject){
				$subject = 'Automatgenererat svar';
 			}
 			if(!$message){
 				$message = 'Tack för ditt meddelande, MVH VadSkaJagLaga';
 			}

 			switch($from) {
 				case 'nyhetsbrev': $from = 'nyhetsbrev@vadskajaglaga.se';
 				break;

 				case 'kontakt': $from = 'kontakt@vadskajaglaga.se';
 				break;

 				case 'info': $from = 'info@vadskajaglaga.se';
 				break;

 				default: $from = 'info@vadskajaglaga.se';
 			}

 			// Content-type header set for sending HTML mail
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=utf8' . "\r\n";

			// Additional headers
			$headers .= 'To:' . $to_name . ' <' . $to_email . '>' . "\r\n";
			$headers .= 'From: Vad ska jag laga? <' . $from . '>' . "\r\n";


 			if(!mail($to, $subject, $message, $headers)){
 				return false;
 			} else {
 				return true;
 			}
		}


	}

?>
