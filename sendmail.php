>?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';

$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
$mail->setLanguage('ru', 'phpmailer/language/');
$mail->IsHTML(true);


// от кого письмо
$mail->setForm('test-diler@diler.ru', 'Diler');

// кому отправить
$mail->addAdress('maksimoveg2016@yandex.ru')

//Тема письма
$mail->Subject = "Заявка от диллера"




//Тело письма
$body = '<h1>Новая заявка от дилера!</h1>';

if(trim(!empty($_POST['inn']))){
$body.='<p><strong>Имя:</strong> '.$_POST['inn'].'</p>';
}
if(trim(!empty($_POST['email']))){
$body.='<p><strong>E-mail:</strong> '.$_POST['email'].'</p>';
}
if(trim(!empty($_POST['tel']))){
$body.='<p><strong>Телефон:</strong> '.$_POST['tel'].'</p>';
}
if(trim(!empty($_POST['category']))){
$body.='<p><strong>Основная категория:</strong> '.$_POST['category'].'</p>';
}



//отправляем
if(!$mail->send()) {
$message = 'Ошибка';
} else {
$message = "Данные отправлены";
}

$response = ['message' => $message]
header('Content-type: application/json');
echo json_encode($response);

?>