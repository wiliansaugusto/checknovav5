<?php
//include("classes/class.phpmailer.php");
require_once("PHPMailer.php");

$msg="texto da mensagem";

$mail = new PHPMailer();
$mail->IsSMTP(); 
$mail->SMTPDebug = 1;
$mail->SMTPAuth = true;
$mail->SMTPSecure = "";
$mail->Host = "smtp.rebecafonseca.x-br.com";
$mail->Port = 587;
$mail->Username = "hostnet=rebecafonseca.x-br.com";
$mail->Password = "220495re";
$mail->CharSet = 'UTF-8';

$mail->SetFrom("hostnet@rebecafonseca.x-br.com", 'MC Ágape');
$mail->AddReplyTo("hostnet@rebecafonseca.x-br.com", 'MC Ágape');

$mail->Subject = "MC Ágape - Fale Conosco";

$mail->AltBody = "Para visualizar esta mensagem favor usar um email compatível com HTML!";

$mail->MsgHTML($msg);

//$mail->AddAddress('fonseca@rebecafonseca.x-br.com', 'Fulano');
$mail->AddBCC("rebeca.batista@hostnet.com.br", 'Wilson Leal');

if(!$mail->Send()) {
echo "Mailer Error: " . $mail->ErrorInfo;
} else {
echo "Sucesso envio email.";
}
?>
