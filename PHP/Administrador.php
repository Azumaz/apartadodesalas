<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

} else {
   echo "Esta página es sólo para usuarios registrados.<br>";
   echo "<br><a href='../html/LoginAdministrador.html'>Login</a>";
   echo "<br><br><a href='../index.html'>inicio</a>";

exit;
}

$now = time();

if($now > $_SESSION['expire']) {
session_destroy();

echo "Esta sesión ha expirado,
<a href='../html/LoginAdministrador.html'>Es necesario hacer Login</a>";
exit;
}
?>


<!doctype html>
<html>
<head>
    <meta charset="UTF-8"> 
	<link rel="icon" type="image/png" href="../PICTURES/logo2.png" />
	<title>Administrador - Apartado de salas</title>
	<link rel="stylesheet" href="../CSS/Estilo.css" type="text/css">
	<link rel="stylesheet" href="../CSS/EstiloAdministrador.css" type="text/css">
	
	
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
</head>

<body>
<div class="itcj">
		<img src="../PICTURES/LOGO TECNM azul.png" width="185" height="103" alt="tecNM">
	</div>
<div class="principal" style="height:113px">
	  Instituto Tecnológico de Ciudad Juárez <br/>
      Apartado de salas
      </div>
	<div class="logo">
		<img src="../PICTURES/logo1.png" alt="logo" width="180" height="95" style="float: right">
	</div>
	
	
	
	<div class="navbar">
	
	<a style="background-color:red;" href="../PHP/Logout.php">- Cerrar Sesión -</a>
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
	  
	  <div class="dropdown">
		<button class="dropbtn">Nosotros 
		  <i class="fa fa-caret-down"></i>
		</button>
		<div class="dropdown-content">
	  <a href="../PHP/Nosotros.php?id=1" id="1">Misión</a>
	  <a href="../PHP/Nosotros.php?id=2" id="2">Visión</a>
	  <a href="../PHP/Nosotros.php?id=3" id="3">Acerca de</a>
		</div>
	  </div> 
	  
	  
	  
	</div>

	<img src="../PICTURES/logo1.png" alt="logotipo ITCJ"  class="logotipo">
   
	
</body>
</html>