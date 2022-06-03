<html>

<head>


</head>
<meta charset="UTF-8">
	<link rel="icon" type="image/png" href="../PICTURES/logo2.png" />
	<title>Uso de salas - Apartado de salas</title>
	<link rel="stylesheet" href="../CSS/Estilo.css" type="text/css">
	<link rel="stylesheet" href="../CSS/EstiloAdministrador.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/4.0.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	
	
	
	
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
	th{
	background-color:black;
	color:white;	
    border-collapse: collapse;
}

tr:nth-child(even) {
	background-color: white;
	}
	
table{
	
	width:30%;
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
<div class="principal"  >
	  Instituto Tecnológico de Ciudad Juárez <br/>
      Apartado de salas
      </div>
	<div class="logo">
		<img src="../PICTURES/logo1.png" alt="logo" width="180" height="95" style="float: right">
	</div>
	
	
	<div class="navbar">
	
	<a style="background-color:red;" href="Logout.php">- Cerrar Sesión -</a>
	  <a href="../PHP/MostrarSalas.php">Uso de salas</a>
	  <a href="../PHP/MostrarUsoRecursos.php">Uso de recursos</a>
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
// Te recomiendo utilizar esta conección, la que utilizas ya no es la recomendada. 
$link = new PDO('mysql:host=localhost;dbname=apartadodesalas', 'root', ''); // el campo vaciío es para la password. 

?>
<br/><br/><br/><br/>
<table class="table table-striped">
  	
		<thead>
		<tr>
			<th>Día</th>
			<th>Sala</th>
			<th>Total</th>
			
			
		</tr>
		</thead>
		
<?php foreach ($link->query('select COUNT(*) as Total, A.salaNombre as Sala,A.fecha as Fecha from solicitud A GROUP BY A.fecha order by Total desc') as $row){ // aca puedes hacer la consulta e iterarla con each. ?> 

<tr>
	
	<td><?php echo date('d/m/Y',strtotime($row['Fecha']))  ?></td>
    <td><?php echo $row['Sala'] ?></td>
	<td><?php echo $row['Total'] // aca te faltaba poner los echo para que se muestre el valor de la variable.  ?></td>
 </tr>
<?php
	}
?>
</table>
<center>
<br>
		<label>Exportar:</label>
		<a href="ExportarUsoSalas.php?t=word" target="_blank">Word</a>
		<a href="ExportarUsoSalas.php?t=excel" target="_blank">Excel</a>
		</center>
</body>
</html>