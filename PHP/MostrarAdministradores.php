<html>
<?php header('Content-Type: charset=utf-8'); ?>
<head>

	<link rel="icon" type="image/png" href="../PICTURES/logo2.png" />
	<title>Mostrar Administradores - Apartado de salas</title>
	<link rel="stylesheet" href="../CSS/Estilo.css" type="text/css">
	<link rel="stylesheet" href="../CSS/EstiloAdministrador.css" type="text/css">
	
	
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
	th{
	background-color:black;
	color:white;
	border-right:3px solid white;
	
    border-collapse: collapse;
}

tr:nth-child(even) {
	background-color: white;
	}
	
table{
	
	width:20%;
	border-top: 3px solid white;
}
th, td {
   width: 70;
   
	font-size: 18px;
   padding: 0.5em;
}
	</style>
</head>

<body>
<div class="itcj">
		<img src="../PICTURES/LOGO TECNM azul.png" width="185" height="103" alt="tecNM">
	</div>
<div class="principal" >
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
<?php

$link = mysqli_connect("localhost", "root", "");

mysqli_select_db($link, "apartadodesalas");

$tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes

$result = mysqli_query($link, "SELECT * FROM administrador");
mysqli_data_seek ($result, 0);
echo "<table >";
echo "<tr>";
echo "<th><h3>id</th></h3>";
echo "<th><h3>Nombre</th></h3>";
echo "</tr>";

while ($colum = mysqli_fetch_array($result))
 {
    echo "<tr>";
    echo "<td><h4>" . $colum['id']. "</td></h4>";
    echo "<td><h4>" . $colum['nombre'] . "</td></h4>";
    echo "</tr>";
}
echo "</table >";

mysqli_free_result($result);

mysqli_close($link);

?>

</body>

</html>