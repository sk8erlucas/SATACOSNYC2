<?php

$Nombre = $_POST['visitor_name'];
$Email = $_POST['visitor_email'];
$Mensaje = "Nueva reserva";


require_once('archivosformulario/class.phpmailer.php');
$mail = new PHPMailer();
//indico a la clase que use SMTP
$mail->IsSMTP();
//permite modo debug para ver mensajes de las cosas que van ocurriendo
$mail->SMTPDebug = 1;
//Debo de hacer autenticación SMTP
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
//indico el servidor de Gmail para SMTP
$mail->Host = "smtp.gmail.com";
//indico el puerto que usa Gmail
$mail->Port = 465;
//indico un usuario / clave de un usuario de gmail
$mail->Username = "galileo.laino@gmail.com";
$mail->Password = "rkiwoiwqhlskkiuf";
$mail->SetFrom($Email, $Nombre);
$mail->AddReplyTo($Email,$Nombre);
$mail->Subject = "Tienes una nueva reserva";

//Mensaje a enviar
$mensaje_completo = 'Tienes un nuevo contacto desde tu web enviado por ' . $Nombre . '\nDireccion E-mail: ' . $Email . '\nSu mensaje: ' . $Mensaje;

$mail->MsgHTML($mensaje_completo);
//indico destinatario
$address = "tacosondyckman1@gmail.com";
$mail->AddAddress($address, "Satacos");
if(!$mail->Send()) {
echo "Error al enviar: " . $mail->ErrorInfo;
} else {
echo "Mensaje enviado!";
}
?>