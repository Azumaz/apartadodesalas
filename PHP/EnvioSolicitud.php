<?php
session_start();
$link = mysqli_connect("localhost", "root", "");
if ($link->connect_error) {
    die("La conexión a la base de datos falló: " . $link->connect_error);
}
mysqli_select_db($link, "apartadodesalas");

$nombre=$_SESSION['nombre'];
$correo=$_SESSION['correo'];
$depto=$_SESSION['depto'];
$tel=$_SESSION['tel'];
$comentarios=$_SESSION['comentarios'];
$sala=$_SESSION['sala'];
$fecha=$_SESSION['fecha'];
$horaInicio=$_SESSION['horaInicio'];
$horaFin=$_SESSION['horaFin'];
$recursosSeleccionados=$_SESSION['recursosSeleccionados'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"> 
	<link rel="icon" type="image/png" href="../PICTURES/logo2.png" />
    <title>Solicitud enviada - Apartado de salas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/4.0.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../CSS/Estilo.css" type="text/css">
	
</head>
<body>
	</div class="itcj">
		<img src="../PICTURES/LOGO TECNM azul.png" width="185" height="103" alt="tecNM">
	</div>
	<div class="principal" >
	  Instituto Tecnológico de Ciudad Juárez <br/>
      Apartado de salas
      </div>
	</div class="logo">
		<img src="../PICTURES/logo1.png" alt="logo" width="200" height="100" style="float: right">
	</div>
	
    <nav>
		<ul>
			<li style="background-color:red;"><img src="../PICTURES/liebre.png"   alt="liebre" width="30" height="20"  ><a  href="../HTML/Home.html">inicio</a></li>
			<li><a href="" disabled >Solicitar sala</a></li>
			<li><a href="">Consultar folio</a></li>
			<li><a href="">Cancelación</a></li>
			<li><a href="">Manual de usuario</a></li>
			<li><a href="">Misión</a></li>
			<li><a href="">Visión</a></li>
			<li><a href="">Acerca de   </a></li>
			<li><a href="">Administrador</a></li>
		</ul>
	</nav>
	
<br>
</body>
</html>

	<?php
	
$query = "INSERT INTO solicitud ( folio, nombre,correo, departamento, telefono, comentarios, salaNombre, fecha, horaInicio, horaFin, status, recursosSeleccionados)
VALUES (DEFAULT,
'$nombre',
'$correo',
'$depto',
 '$tel',
 '$comentarios',
 '$sala',
 '$fecha',
 '$horaInicio', 
 '$horaFin',
 DEFAULT,
 '$recursosSeleccionados')";


  if ($link->query($query) === TRUE) {
 
	echo "<br/><br/><br/>" . "<h2>" . "Solicitud enviada exitosamente!<br>El Administrador enviará un correo electrónico con su folio y el estado de la solicitud." . "</h2>";
		 ob_start(); 
	header("refresh: 8; url = ../HTML/Home.html");  
	echo '<br/>En un momento será redireccionado a la página inicial...'; 
	ob_end_flush();  
	 }else {
		echo "Error al hacer solicitud. " . $query . "<br>" . $link->error; 
	 }
 
	mysqli_close($link);

?>