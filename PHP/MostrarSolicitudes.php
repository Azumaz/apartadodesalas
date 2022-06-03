<html>
<?php header('Content-Type: charset=utf-8'); ?>
<head>


</head>
	<link rel="icon" type="image/png" href="../PICTURES/logo2.png" />
	<title>Mostrar Solicitudes - Apartado de salas</title>
	<link rel="stylesheet" href="../CSS/Estilo.css" type="text/css">
	<link rel="stylesheet" href="../CSS/EstiloAdministrador.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/4.0.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
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
	
	width:100%;
	border-top: 3px solid white;
}
th, td {
   width: 70;
   
	font-size: 18px;
   padding: 0.5em;
}

	</style>
	
	
	
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<script type="text/javascript">
	window.onload = function () {
		
    td_array = document.getElementsByTagName("td");
    Cancelada = "Cancelada";
	PorDecidir="Por decidir";
	usuarioCancelacion="Usuario solicita cancelar";
	validada="Validada";

    for (i = 0; i < td_array.length; i++){
      if (td_array[i].textContent == Cancelada){
        td_array[i].style="background-color:red";
      };
	  if (td_array[i].textContent == PorDecidir){
        td_array[i].style="background-color:yellow";
      };
	  if (td_array[i].textContent == usuarioCancelacion){
        td_array[i].style="background-color:orange";
      };
	  if (td_array[i].textContent == validada){
        td_array[i].style="background-color:green";
      };
    };
	
	
	elementosEnForm = document.forms['formularioConsulta'].elements;
		for (var i=0; i< elementosEnForm.length; i++) {
			if (elementosEnForm[i].type != 'number') {botonEnviar.disabled = true;}
				else {elementosEnForm[i].addEventListener('click', activarBoton);}
		}
	}
	function activarBoton() { 
			botonEnviar.disabled=false;
	}
	
	


	</script>
	
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

$link = mysqli_connect("localhost", "root", "");

mysqli_select_db($link, "apartadodesalas");

$tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes

$result = mysqli_query($link, "SELECT * FROM solicitud ORDER BY folio DESC");
mysqli_data_seek ($result, 0);
echo "<table >";
echo "<tr>";
echo "<th><h3>Folio</th></h3>";
echo "<th><h3>Nombre</th></h3>";
echo "<th><h3>Correo</th></h3>";
echo "<th><h3>Departamento</th></h3>";
echo "<th><h3>Teléfono</th></h3>";
echo "<th><h3>Comentarios</th></h3>";
echo "<th><h3>Sala</th></h3>";
echo "<th><h3>Fecha</th></h3>";
echo "<th><h3>Hora de inicio</th></h3>";
echo "<th><h3>Hora de terminación</th></h3>";
echo "<th><h3>Status de la sala</th></h3>";
echo "<th><h3>Recursos seleccionados</th></h3>";
echo "</tr>";
while ($colum = mysqli_fetch_array($result))
 {
    echo "<tr>";
    echo "<td><h4>" . $colum['folio']. "</td></h4>";
    echo "<td><h4>" . $colum['nombre'] . "</td></h4>";
    echo "<td><h4>" . $colum['correo'] . "</td></h4>";
    echo "<td><h4>" . $colum['departamento'] . "</td></h4>";
    echo "<td><h4>" . $colum['telefono'] . "</td></h4>";
    echo "<td><h4>" . $colum['comentarios'] . "</td></h4>";
    echo "<td><h4>" . $colum['salaNombre'] . "</td></h4>";
    echo "<td><h4>" . date('d/m/Y',strtotime($colum['fecha'])) . "</td></h4>";
    echo "<td><h4>" . date('h:i A', strtotime($colum['horaInicio'])) . "</td></h4>";
    echo "<td><h4>" . date('h:i A', strtotime($colum['horaFin'])) . "</td></h4>";
    echo "<td ><h4>" . $colum['status'] . "</td></h4>";
    echo "<td><h4>" . $colum['recursosSeleccionados'] . "</td></h4>";
    echo "</tr>";
}

echo "<tr>";
echo "<th><h3>Folio</th></h3>";
echo "<th><h3>Nombre</th></h3>";
echo "<th><h3>Correo</th></h3>";
echo "<th><h3>Departamento</th></h3>";
echo "<th><h3>Teléfono</th></h3>";
echo "<th><h3>Comentarios</th></h3>";
echo "<th><h3>Sala</th></h3>";
echo "<th><h3>Fecha</th></h3>";
echo "<th><h3>Hora de inicio</th></h3>";
echo "<th><h3>Hora de terminación</th></h3>";
echo "<th><h3>Status de la sala</th></h3>";
echo "<th><h3>Recursos seleccionados</th></h3>";
echo "</tr>";
echo "</table >";
/*
echo "<form class='consulta' name='formularioConsulta'>";
		echo "<label>Ingrese id del Administrador que desea borrar </label>";
		echo "<input type='number'  min='1'  style='width:300px' id='folio'>";
		echo "<input type='submit'  value='Enviar' id='botonEnviar' onchange='activarBoton()'  class='btn btn-secondary btn-dark '>";
	echo "</form>";*/

mysqli_free_result($result);

mysqli_close($link);

?>
	<br>
	
	
	<label>Si desea modificar status,</label>
	<a href="../PHP/ModificarSolicitud.php">Clic aquí</a>
</body>
</html>