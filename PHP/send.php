<?php
include "class.phpmailer.php";
include "class.smtp.php";
header("Content-Type: text/html;charset=utf-8");
 
 //Correo electrónico del Depto. de Comunicación y Difusión
$email_user = "mrchirisco@gmail.com";
//Contraseña
$email_password = "azumaz123";
//Asunto
$the_subject = "Aviso";
$address_to = "mrchirisco@gmail.com";
//Destinatario
//$address_to = "cm454410@gmail.com";
//Remitente
$from_name = "Comunicación y Difusión";
$phpmailer = new PHPMailer();

// ---------- datos de la cuenta de Gmail -------------------------------
$phpmailer->Username = $email_user;
$phpmailer->Password = $email_password; 
//-----------------------------------------------------------------------
// $phpmailer->SMTPDebug = 1;
$phpmailer->SMTPSecure = 'ssl';
$phpmailer->Host = "smtp.gmail.com"; // GMail
$phpmailer->Port = 465;
$phpmailer->IsSMTP(); // use SMTP
$phpmailer->SMTPAuth = true;

$phpmailer->setFrom($phpmailer->Username,$from_name);
$phpmailer->AddAddress($address_to); // recipients email

$phpmailer->Subject = $the_subject;	
$phpmailer->Body .="<h1 style='color:#3498db;'>Se ha realizado el siguiente cambio:</h1>";
$phpmailer->Body .= "<p>Mensaje personalizado</p>";
$phpmailer->Body .= "<p>Fecha y Hora: ".date("d-m-Y h:i:s")."</p>";
$phpmailer->IsHTML(true);

$phpmailer->Send();
?>