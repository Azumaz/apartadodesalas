
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"> 
	<link rel="icon" type="image/png" href="../PICTURES/logo2.png" />
    <title>Cancelación - Apartado de salas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/4.0.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../CSS/Estilo.css" type="text/css">
	<script type="text/javascript">
	window.onload = function () {
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
    <nav class="menu">
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
	<br>
	<br>
	<br>
	<br>
	<?php
	$folio=$_GET['folio'];
	
	
$link = mysqli_connect("localhost", "root", "");

mysqli_select_db($link, "apartadodesalas");

$tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes


$result = mysqli_query($link, "SELECT * FROM solicitud WHERE $folio=folio");
if(mysqli_num_rows($result)==0){
	echo "¡El folio ingresado no fue encontrado!";
}else{
	echo "Se ha avisado al Administrador sobre la cancelación; usted recibirá un correo de confirmación.<br> ¡Gracias!";
	
$result = mysqli_query($link, "UPDATE solicitud Set status='Usuario solicita cancelar'  WHERE $folio=folio");

//mysqli_data_seek ($result, 0);



//mysqli_free_result($result);

mysqli_close($link);

}

	
	
	?>
	<img src="../PICTURES/logo1.png" alt="logotipo ITCJ"  class="logotipo">
</body>
</html>