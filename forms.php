<?php
header('Content-Type: text/html; charset=utf-8');
//#######################################################################
//##########################  Обработчик форм  ##########################
//#######################################################################




/////////////////////////////////////////////////////////////
// Сюда надо поставить адрес получателя
$mail_to = 'serhiyhulyi93@gmail.com';
/////////////////////////////////////////////////////////////



//#######################################################################
// Функция отправки почты
//#######################################################################
function custom_mail($to, $subject, $message, $attachment){
	require_once('Swiftmailer/swift_required.php');

	$smtpHost			= 'smtp.yandex.ru';
	$smtpPort			= '465';
	$smtpEncryption		= 'ssl';
	$smtpUser			= 'send.engine@yandex.ru';
	$smtpPass			= 'ASlqI2V38M';
	$XMailer			= 'SMTP Mailer v.1.0 by SSJ';
	$FromMail			= 'send.engine@yandex.ru';
	$FromName	        = '';
	
/* code = 35*/
	Swift_Preferences::getInstance()->setCharset('UTF-8');

	$transport = Swift_SmtpTransport::newInstance($smtpHost, $smtpPort)
		->setUsername($smtpUser)
		->setPassword($smtpPass);

	if (!empty($smtpEncryption)){
		$transport->setEncryption($smtpEncryption);
	}

	$mailer = Swift_Mailer::newInstance($transport);

	$msg = Swift_Message::newInstance()
				->setReturnPath($smtpUser)
				->setMaxLineLength(1000)
				->setFrom(array($FromMail => $FromName))
				->setTo(array($to))
				->setSubject($subject);
				//->setBody($message, 'text/html');


	$msg->setBody($message);
	
	$headers = $msg->getHeaders();
	$headers->addTextHeader('X-Mailer', $XMailer);

	if ( $attachment ) {
		$msg->attach(
			Swift_Attachment::fromPath($attachment['tmp_name'])->setFilename($attachment['name'])
		);
	}


   // Подключаем плагин логов
   $logger = new Swift_Plugins_Loggers_ArrayLogger();
   $mailer->registerPlugin(new Swift_Plugins_LoggerPlugin($logger));

   $result = $mailer->send($msg, $failures);
   
    if (!$result){
		print_r(array("BAD_MAIL" => $failures, "LOG" => $logger->dump()), true);
    }
	
    return $result;
}





//=======================================================================



function clean($data){
	$data = htmlspecialchars($data);
	$data = stripslashes($data);
	$data = trim($data);
	return ($data);
}

$id = substr(base_convert(md5(time()), 16, 10), 0, 5);

$result = array(
	'status'	=> 'error',
	'message'	=> 'Ошибка: не указан номер формы',
);

if (
		!empty($_POST['phone']) &&
		!empty($_POST['name'])
   ){			
	$mail_title	=	'BeautyCure - Заявка на консультацию (#'.$id.')';
	$mail_text =	'Здравствуйте, на сайте была оформлена заявка на консультацию' . "\n\n" .
					'ID: ' . $id . "\n" .
					'Дата и время заявки: ' . date('d.m.Y, H:i', time()) . "\n\n" .
					'Телефон: '.clean($_POST['phone']) . "\n" .
					'Имя: '.clean($_POST['name']);
	

	if (custom_mail($mail_to, $mail_title, $mail_text)) {
		$result = array('status' => 'ok');
	} else {
		$result = array(
			'status'	=> 'error',
			'message'	=> 'Ошибка: не удалось отправить почтовое уведомление',
		);
	}
}

header('Access-Control-Allow-Origin: *');
header('Content-type: application/json; charset=UTF-8'); 
echo json_encode($result);
?>
