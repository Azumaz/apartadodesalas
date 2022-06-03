
<html>
<?php header('Content-Type: charset=utf-8'); ?>
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
 header('Content-Type: charset=utf-8'); 
$link = mysqli_connect("localhost", "root", "");

mysqli_select_db($link, "apartadodesalas");
$id=$_GET['id'];
$tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes

$resultado=mysqli_num_rows(mysqli_query($link,"SELECT id FROM administrador WHERE id='$id'"));

if ($resultado) {
	$result = mysqli_query($link, "DELETE FROM administrador WHERE id='$id'");
	
	echo "Se ha borrado el registro con id= $id";
	echo "<br><a href='../PHP/MostrarAdministradores.php'>Volver al menu</a>";
}else{
	echo "Especifique un id válido";
	echo "<br><a href='../PHP/BorrarAdministrador.php'>Volver al menu</a>";
}
	
	mysqli_close($link);

?>

</body>
</html>
