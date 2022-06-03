
<!doctype html>
<html>
<?php header('Content-Type: charset=utf-8'); 
?>
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

	
   
	
</body>



<?php

$link = mysqli_connect("localhost", "root", "");

mysqli_select_db($link, "apartadodesalas");


$tildes = $link->query("SET NAMES 'utf8'"); 
$id=$_GET['id'];


//$resultado=mysqli_num_rows(mysqli_query($link,"SELECT descripcion FROM nosotros WHERE id='$id'"));
$consulta = mysqli_query($link,"SELECT descripcion FROM informacion WHERE id='$id'");

$descripcion = mysqli_fetch_row($consulta);

switch($_GET['id']) { 

	case 1: {
		echo "<h2>Misión actual:</h2>";	
		echo $descripcion[0];
		echo "</br></br>";
		echo "<h2>Modificar Misión:</h2>";	
		echo "</br>";

	}
	break; 
	case 2: {
		echo "<h2>Visión actual:</h2>";	
		echo $descripcion[0];
		echo "</br></br>";
		echo "<h2>Modificar Visión:</h2>";	
		echo "</br>";

	}
	break; 
	case 3: {
		echo "<h2 style='color:red;'>´Acerca de' actual:</h2>";	
		echo "<label style='font-size: 28px; 	'>".$descripcion[0]."</label>";
		echo "</br></br><hr>";
		echo "<h2>Modificar Acerca de:</h2>";	
		echo "</br>";
		echo "<form action='../PHP/Administrador.php'><textarea rows='10' cols='70' style='left:50px; font-size: 28px'></textarea> ";
		//echo "<input type='text'> ";
		echo "<br/>";
		echo "<br/>";
		echo "<br/>";
		echo "<br/>";
		echo "<br/>";
		echo "<br/>";
		echo "<br/>";
		echo "<br/>";
		echo "<br/>";
		echo "<br/>";
		echo "<br/>";
		echo "<br/>";
		echo "<br/>";
		echo "<br/>";
		echo "<br/>";
		echo "<br/>";
		echo "<br/>";
		echo "<br/>";
		echo "<br/>";
		//echo "<input type='reset' style='width:19%;font-size:30px; bottom:1%' class='btn btn-danger'>";
		//echo "<input type='submit' id='botonSiguiente'  style='font-size:30px;width:80%'  class='btn btn-secondary btn-dark '>";
		echo "<input type='reset' style='width:19%;font-size:30px; ' >";
		echo "<input type='submit' id='botonSiguiente'  style='font-size:30px;width:80% '></form>";
		echo "<br/>";
		echo "<br/>";
		echo "<br/>";

	}
	break; 


}  

?>

</html>