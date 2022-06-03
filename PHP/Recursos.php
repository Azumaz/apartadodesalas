
<?php
session_start();
//$_SESSION['recurso[]'] = $_GET['recurso']; 

//$_SESSION['sala']=$_GET['sala'];
//$_SESSION['fecha']=$_GET['fecha'];
	if(empty($_GET['salaNombre'])){
		$_SESSION['sala']=$_GET['sala'];
	}else{
		$_SESSION['sala']=$_GET['salaNombre'];
	}
	
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8"> 
	<link rel="icon" type="image/png" href="../PICTURES/logo2.png" />
    <title>Elegir recursos - Apartado de salas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/4.0.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../CSS/Estilo.css" type="text/css">
	<link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
	<script type="text/javascript">
	window.onbeforeunload = confirmExit;
	function confirmExit(){
		return "No ha terminado el apartado de la sala. ¿Está seguro que desea salir?";
	}
	function avanzar(){
		window.onbeforeunload =false;
	}
	window.onload = function () {
	/*var date = new Date();
	var day = date.getDate();
	var month = date.getMonth() + 1;
	var year = date.getFullYear();
	
	if (month < 10) month = "0" + month;
	if (day < 10) day = "0" + day;
	var today = year + "-" + month + "-" + day;
	document.getElementById('fecha').value = today;*/
	elementosEnForm = document.forms['formularioRecursos'].elements;
		for (var i=0; i< elementosEnForm.length; i++) {
			if (elementosEnForm[i].type != 'date') {botonSiguiente.disabled = true;}
				else {elementosEnForm[i].addEventListener('click', activarBoton);}
		}
	}
	function activarBoton() { 
			botonSiguiente.disabled=false;
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
	<br><br><br><br>
	<h1>Recursos disponibles:</h1>
	<br/>
	<center>
	<form name="formularioRecursos" action="../PHP/DatosUsuario.php" >
		<!--  hidden porque viene de una página A y necesitamos pasar el dato a una página C -->
	  
		
	  <label class="seleccion">
	    <input type="checkbox" name="audio" value="audio" id="audio">
		<img class="" src="../PICTURES/Audio.png" width="312" height="180" 	title="Audio" alt="audio"/>
	    </label>
		
	 
		
	  <label class="seleccion">
	    <input type="checkbox" name="fotografia" value="fotografia" id="fotografia">
		<img class="" src="../PICTURES/Fotografia.png" width="312" height="180" 	title="Fotografía" alt="Fotografía"/>
	    </label>
		
	  <label class="seleccion">
	    <input type="checkbox" name="podium" value="podium" id="podium">
		<img class="" src="../PICTURES/Podium.png" width="312" height="180" 	title="Podium" alt="Podium"/>
	    </label>
	  
	  <label class="seleccion">
	    <input type="checkbox" name="presidium" value="presidium" id="presidium">
		<img class="" src="../PICTURES/presidium.png" width="312" height="180" 	title="Presídium" alt="Presídium"/>
	    </label>	
	<br/>
	</center>	
	<br/>
	<br/>
	<center><p>
	<label style="font-size:24px">Solicito lo anteriormente seleccionado para el día:  </label>
	
	<!--<input type="date" name="fecha" id="fecha" > <br/><br/> 
	<input type="datetime-local" name="fecha"  id="fecha" required><br/><br/>-->
	<input type="date" data-date="" data-date-format="DD MMMM YYYY" name="fecha"   id="fecha" required><br/><br/> 
	<label>De: </label><input type="time" name="horaInicio"   id="horaInicio" required>
	<label> hasta: </label><input type="time" name="horaFin"   id="horaFin" required>
	
	
	</p></center>
	<br/>
	<input type="reset" style="width:19%;font-size:30px; bottom:1%" class="btn btn-danger">
	<input type="submit" id="botonSiguiente"  style="font-size:30px;width:80%" value="Siguiente" onchange="activarBoton()" onclick="avanzar();" class="btn btn-secondary btn-dark ">
	
	</form>
	
</body>
</html>