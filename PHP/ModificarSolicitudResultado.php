
<html>
<?php header('Content-Type: charset=utf-8'); 
date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');

$fecha_actual=strftime("%d/%m/%Y");
$hora_actual=strftime("%H:%M:%S");
?>

<head>

	<link rel="icon" type="image/png" href="../PICTURES/logo2.png" />
	<title>Resultado</title>
	<link rel="stylesheet" href="../CSS/Estilo.css" type="text/css">
	<link rel="stylesheet" href="../CSS/EstiloAdministrador.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/4.0.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	
	
	
	
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	
	
</head>

<body>
<div class="itcj">
		<img src="../PICTURES/LOGO TECNM azul.png" width="185" height="103" alt="tecNM">
	</div>
<div class="principal"  >
	  Instituto Tecnológico de Ciudad Juárez <br/>
      Apartado de salas
      </div>
	<div class="logo">
		<img src="../PICTURES/logo1.png" alt="logo" width="180" height="95" style="float: right">
	</div>
	
	
	<div class="navbar">
	
	<a style="background-color:red;" href="Logout.php">- Cerrar Sesión -</a>
	  <a href="../PHP/MostrarUsoSalas.php">Uso de salas</a>
	  <a href="../PHP/MostrarUsoRecursos.php">Uso recursos</a>
	  <div class="dropdown">
		<button class="dropbtn">Opciones Solicitud 
		  <i class="fa fa-caret-down"></i>
		</button>
		<div class="dropdown-content">
		  <a href="../PHP/MostrarSolicitudes.php">Mostrar solicitudes</a>
		  <a href="../PHP/ModificarSolicitud.php">Modificar solicitudes</a>
		</div>
	  </div> 
	  <div class="dropdown">
		<button class="dropbtn">Opciones Administrador 
		  <i class="fa fa-caret-down"></i>
		</button>
		<div class="dropdown-content">
			<a href="../HTML/RegistrarAdministrador.html">Agregar Administrador</a>
		  <a href="../PHP/MostrarAdministradores.php">Mostrar Administradores</a>
		  <a href="../PHP/BorrarAdministrador.php">Borrar Administrador</a>
		</div>
	  </div> 
	</div>
	<br>
	<br>
	<br>
	<br>
<?php

$link = mysqli_connect("localhost", "root", "");

include "class.phpmailer.php";
include "class.smtp.php";

mysqli_select_db($link, "apartadodesalas");
$folio=$_GET['folio'];
$status=$_GET['status'];


$resultado=mysqli_num_rows(mysqli_query($link,"SELECT folio FROM solicitud WHERE folio='$folio'"));

if ($resultado) {
	$result = mysqli_query($link, "UPDATE solicitud Set status='$status'  WHERE $folio=folio");
	$correoUsuario = mysqli_query($link,"SELECT correo FROM solicitud WHERE folio='$folio'");

$correo = mysqli_fetch_row($correoUsuario);

	echo "Se ha modificado el registro con folio: $folio";
	echo "<br>Status: $status";
	echo "<br>";
	echo "Cambio notificado  al correo: ";
	echo $correo[0]; // correo destino
	
	echo "<br><br><a href='../PHP/MostrarSolicitudes.php'>Volver al menu</a><br>";
	


if (!$correoUsuario) {
    echo 'No se pudo ejecutar la consulta: ' . mysqli_error();
    exit;
}



	
	
	 
 //Correo electrónico del Depto. de Comunicación y Difusión
$email_user = "mrchirisco@gmail.com";
//Contraseña
$email_password = "azumaz123";
//Asunto
$the_subject = "Aviso";
//$address_to = "mrchirisco@gmail.com";
$address_to = $correo[0];
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
$phpmailer->Body .="<h1>Se ha realizado el siguiente cambio:</h1>"."<br>";
$phpmailer->Body .= "Status de la solicitud: ".$status."<br>";
$phpmailer->Body .= "Folio: ".$folio;
$phpmailer->Body .= "<p>Fecha y Hora de la modificación: ".$fecha_actual." ".$hora_actual."</p>";
$phpmailer->IsHTML(true);

$phpmailer->Send();

}else{
	echo "Especifique un Folio válido";
	echo "<br><a href='../PHP/ModificarSolicitud.php'>Volver al menú</a>"; 
}
	
	mysqli_close($link);
?>



</body>
</html>

