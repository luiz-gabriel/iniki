<?php
	namespace Models;



	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	use PHPMailer\PHPMailer\SMTP;

	class ContatoModel{

		private static $host = 'ds2.hospedam.com';
		private static $user = 'contato@iniki.xyz';
		private static $pass = 'xUEYk24iG2DpCau';

		public static function sendEmail($name, $assunto, $email, $menssagem){
			$name = $name;
			$assunto = $assunto;
			$email = $email;
			$menssagem = $menssagem;

			// Load Composer's autoloader

			require 'vendor/autoload.php';

			// Instantiation and passing `true` enables exceptions

			$mail = new PHPMailer(true);

			try {

			$mail->isSMTP();

			$mail->Host       = self::$host;

			$mail->SMTPAuth   = true;

			$mail->Username   = self::$user;

			$mail->Password   = self::$pass; // SMTP password

			$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

			$mail->Port       = 587;



			//Recipients

			$mail->setFrom("$email", "$name");

			$mail->addAddress(self::$user , 'contato iniki');



			// Content

			$mail->isHTML(true); // Set email format to HTML

			$mail->Subject = "$assunto";

			$mail->Body    = "$menssagem";



			$mail->send();

			return true;
			} catch (Exception $e) {

			return false;


			}
		}

	}

?>
