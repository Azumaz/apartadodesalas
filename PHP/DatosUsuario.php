<?php
session_start();
if(isset($_GET['audio'])){
	$_SESSION['audio']=$_GET['audio'];
}else{
	$_SESSION['audio']='';
}

if(isset($_GET['fotografia'])){
	$_SESSION['fotografia']=$_GET['fotografia'];
}else{
	$_SESSION['fotografia']='';
}

if(isset($_GET['podium'])){
	$_SESSION['podium']=$_GET['podium'];
}else{
	$_SESSION['podium']='';
}

if(isset($_GET['presidium'])){
	$_SESSION['presidium']=$_GET['presidium'];
}else{
	$_SESSION['presidium']='';
}


//$_SESSION['fotografia']=$_GET['fotografia'];
//$_SESSION['podium']=$_GET['podium'];
//$_SESSION['presidium']=$_GET['presidium'];
	
//$_SESSION['recurso[]'] = $_GET['recurso']; 
//$_SESSION['sala']=$_GET['sala'];
$_SESSION['fecha']=$_GET['fecha'];
$_SESSION['horaInicio']=$_GET['horaInicio'];
$_SESSION['horaFin']=$_GET['horaFin'];

?>
<!doctype html>
<html>
<head>
	
    <meta charset="UTF-8"> 
	<link rel="icon" type="image/png" href="../PICTURES/logo2.png" />
	<title>Solicitud - Apartado de salas</title>
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
			<li style="background-color:red;"><img src="../PICTURES/liebre.png" alt="liebre" width="30" height="20"><a href="../HTML/Home.html">inicio</a></li>
			<li><a href="../PHP/ElegirSala.php">Solicitar sala</a></li>
			<li><a href="../HTML/ConsultarFolio.html">Consultar folio</a></li>
			<li><a href="../HTML/Cancelacion.html">Cancelación</a></li>
			<li><a href="../HTML/Manual.html">Manual de usuario</a></li>
			<li><a href="../HTML/Mision.html">Misión</a></li>
			<li><a href="../HTML/Vision.html">Visión</a></li>
			<li><a href="../HTML/Acerca.html">Acerca de   </a></li>
			<li><a href="../HTML/LoginAdministrador.html">Administrador</a></li>
		</ul>
	</nav>
	<br/>
	<br/>
	<br/>
	<br/>
	<br />
	<form class="datosUsuario" action="../PHP/SolicitudUsuario.php"  >
	  	<label  for="nombre" >Nombre completo:</label><br />
		<input id="nombre" placeholder="(Campo obligatorio)" name="nombre" type="text" value="" size="30" required><br /><br />
	  	<label class="" for="correo">Correo electrónico:</label><br />
		<input id="correo" placeholder="(Campo obligatorio)" name="correo" type="email" value="" size="30" required><br /><br />
	  	<label class="" for="depto">Departamento:</label><br />
		<input id="depto" placeholder="(Campo obligatorio)" name="depto" type="text" value="" size="30" required><br /><br />
	  	<label class="" for="tel">Teléfono:</label><br />
		<input id="tel"  placeholder="(Campo opcional)" name="tel" placeholder="*" type="tel" value="" size="30" ><br /><br /> <!--The tel type is currently only supported in Safari 8.https://www.w3schools.com/Html/html_form_input_types.asp,2018-->
		<label class="" for="comentarios">Comentarios:</label><br />
		<textarea id="comentarios"  placeholder="(Campo opcional)" name="comentarios" rows="3" cols="32" ></textarea><br />
		<input type="submit" style="left:0px;font-size:30px; bottom:5%; width:100%" id="botonAbajo" onclick="avanzar();" value="Enviar Solicitud" class="btn btn-secondary btn-dark btn-block">
	</form>
</body>
</html>