
<html>
<?php header('Content-Type: charset=utf-8'); ?>
<head>

	<link rel="icon" type="image/png" href="../PICTURES/logo2.png" />
	<title>Aviso - Apartado de salas</title>
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
	<?php
 $host_db = "localhost";
 $user_db = "root";
 $pass_db = "";
 $db_name = "apartadodesalas";
 $tbl_name = "Administrador";
 
 $form_pass = $_POST['pass'];
 
 $hash = password_hash($form_pass, PASSWORD_BCRYPT); 

 $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

 if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

 $buscarUsuario = "SELECT * FROM $tbl_name
 WHERE nombre = '$_POST[nombre]' ";

 $result = $conexion->query($buscarUsuario);

 $count = mysqli_num_rows($result);

 if ($count == 1) {
	 echo "<br />". "¡Ya hay un administrador con este nombre!" . "<br />";

	 echo "<a href='../HTML/RegistrarAdministrador.html'>Elegir otro nombre (Regresar)</a>";
	 echo "<br/>" . "<a href='../PHP/Administrador.php'>Ir a Administrador</a>";
	 
 }
 else{

 $query = "INSERT INTO Administrador (nombre, pass)
           VALUES ('$_POST[nombre]', '$hash')";

 if ($conexion->query($query) === TRUE) {
 
		echo "<br />" . "<h2>" . "Administrador registrado con éxito!" . "</h2>";
		 
		echo "<a href='../PHP/Administrador.php'>(Regresar)</a>";
		// echo "<h4>" . "Bienvenido: " . $_POST['nombre'] . "</h4>" . "\n\n";
		// echo "<h5>" . "Hacer Login: " . "<a href='login.html'>Login</a>" . "</h5>"; 
	 }

	 else {
		echo "Error al crear el usuario. " . $query . "<br>" . $conexion->error; 
	 }
 }
 mysqli_close($conexion);
?>

</body>
</html>
