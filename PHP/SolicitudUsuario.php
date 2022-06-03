<?php
session_start();
$link = mysqli_connect("localhost", "root", "");
if ($link->connect_error) {
    die("La conexión a la base de datos falló: " . $link->connect_error);
}
mysqli_select_db($link, "apartadodesalas");


$nombre=$_GET['nombre'];
$correo=$_GET['correo'];
$depto=$_GET['depto'];
$tel=$_GET['tel'];
$comentarios=$_GET['comentarios'];
$sala=$_SESSION['sala'];
$fecha=$_SESSION['fecha'];
$horaInicio=$_SESSION['horaInicio'];
$horaFin=$_SESSION['horaFin'];
$_SESSION['nombre']=$nombre;
$_SESSION['correo']=$correo;
$_SESSION['depto']=$depto;
$_SESSION['tel']=$tel;
$_SESSION['comentarios']=$comentarios;
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8"> 
	<link rel="icon" type="image/png" href="../PICTURES/logo2.png" />
    <title>Solicitud del usuario - Apartado de salas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/4.0.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../CSS/Estilo.css" type="text/css">
	<script type="text/javascript">
	window.onbeforeunload = confirmExit;
	function confirmExit(){
		return "No ha terminado el apartado de la sala. ¿Está seguro que desea salir?";
	}
	function avanzar(){
		window.onbeforeunload =false;
	}
	
	</script>
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
			<li><a href="../PHP/ElegirSala.php" disabled >Solicitar sala</a></li>
			<li><a href="../HTML/ConsultarFolio.html">Consultar folio</a></li>
			<li><a href="../HTML/Cancelacion.html">Cancelación</a></li>
			<li><a href="../HTML/Manual.html">Manual de usuario</a></li>
			<li><a href="../HTML/Mision.html">Misión</a></li>
			<li><a href="../HTML/Vision.html">Visión</a></li>
			<li><a href="../HTML/Acerca.html">Acerca de   </a></li>
			<li><a href="../HTML/LoginAdministrador.html">Administrador</a></li>
		</ul>
	</nav>
<?php
echo "<br><br><br><br><br>";

echo "<h2>Los datos que ha proporcionado son los siguientes, favor de verificar que sean correctos:</h2>";
echo "Nombre: ";
echo " $nombre";
echo "<br>Correo: ";
echo " $correo";
echo "<br>Departamento: ";
echo " $depto";
echo "<br>Teléfono: ";
echo " $tel";
echo "<br>Comentarios: ";
echo " $comentarios";
echo "<br><br>";

$audio=$_SESSION['audio'];
$fotografia=$_SESSION['fotografia'];
$podium=$_SESSION['podium'];
$presidium=$_SESSION['presidium'];

echo "Recursos solicitados:<br>";
if(!empty($audio)){
	echo $audio.", ";
	$_SESSION['audio']=$audio;
}
if(!empty($fotografia)){
echo $fotografia.", ";
	$_SESSION['fotografia']=$fotografia;
}
if(!empty($podium)){
echo $podium.", ";
	$_SESSION['podium']=$podium;
}
if(!empty($presidium)){
echo $presidium." ";
	$_SESSION['presidium']=$presidium;
}

$recursosSeleccionados=$audio." ".$fotografia." ".$podium." ".$presidium;
	$_SESSION['recursosSeleccionados']=$recursosSeleccionados;

echo "<br>";
//echo $recursosSeleccionados;
	
echo "<br>";
echo "<h2>¿Desea solicitar ";
echo $_SESSION['sala'];
echo " para el día ";
echo date('d/m/Y',strtotime($fecha));
echo " y usarla de ";

$horaInicio = date('h:i A', strtotime($_SESSION['horaInicio']));
echo $horaInicio; 
echo "-";
$horaFin = date('h:i A', strtotime($_SESSION['horaFin']));
echo $horaFin; 
echo "?";
echo "<br>";
echo "</h2>";

?>
<br>
<form action="../PHP/EnvioSolicitud.php">
	<input type="button" onclick="window.location.href='../HTML/Home.html'" value="Volver al inicio" style="width:19%;font-size:30px; bottom:5%" class="btn btn-danger">
	<input type="submit" id="aceptar"  style="width:80%;font-size:30px;" value="Aceptar" onclick="avanzar();"  class="btn btn-secondary btn-dark ">
</form>
</body>
</html>

	<?php
	mysqli_close($link);

?>