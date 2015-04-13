<?php
	class Mail{

		
		public static function send($to_name, $to_email, $subject = null, $message = null, $from = null){
			
			if(!$subject){
				$subject = 'Automatgenererat svar';
 			}
 			if(!$message){
 				$message = 'Tack för ditt meddelande, MVH VadSkaJagLaga';
 			}

 			switch($from) {
 				case 'newsletter' : $from = 'nyhetsbrev@vadskajaglaga.se';
 					break;
 				default : $from = 'info@vadskajaglaga.se';
 			}

 			// Content-type header set for sending HTML mail

			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

			// Additional headers
			$headers .= 'To:' . $to_name . ' <' . $to_email . '>' . "\r\n";
			$headers .= 'From: VadSkaJagLaga <' . $from . '>' . "\r\n";


 			if(!mail($to, $subject, $message, $headers)){
 				echo 'error sending mail';
 			}
		}


	}

?>