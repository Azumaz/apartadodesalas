
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"> 
	<link rel="icon" type="image/png" href="../PICTURES/logo2.png" />
    <title>Elegir Sala - Apartado de salas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/4.0.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../CSS/Estilo.css" type="text/css">
	<script type="text/javascript">
	window.onload = function () {
	elementosEnForm = document.forms['formularioSalas'].elements;
		for (var i=0; i< elementosEnForm.length; i++) {
			if (elementosEnForm[i].type != 'radio') {botonAbajo.disabled = true;}
				else {elementosEnForm[i].addEventListener('click', activarBoton);}
		}
		
	}		
	
	function activarBoton() { 
		botonAbajo.disabled=false;
	}
	function mostrarOtraNombre(){
	
		document.getElementById("otraNombre").style.display="inline";
		document.getElementById("otraNombre").required=true;
		
	}
	function ocultarOtraNombre(){
	
		document.getElementById("otraNombre").style.display="none";
		document.getElementById("otraNombre").required=false;
		
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
			<li style="background-color:red;"><img src="../PICTURES/liebre.png"   alt="liebre" width="30" height="20"  ><a  href="../HTML/Home.html">inicio</a></li>
			<li><a href="../PHP/ElegirSala.php" disabled >Solicitar sala</a></li>
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
	<h1>Elija una sala:</h1>
	<center>
	<form name="formularioSalas" class="" action="../PHP/Recursos.php" method="get">
	
	  <label class="seleccionSala">
	    <input type="radio" name="sala" value="Aula Magna" id="" onclick="ocultarOtraNombre();">
		<img class="" src="../PICTURES/Aula Magna.png"  	title="Aula Magna" alt="Aula Magna"/>
	    </label>
		
	  <label class="seleccionSala">
	    <input type="radio" name="sala" value="Audiovisual" id="" onclick="ocultarOtraNombre();">
		<img class="" src="../PICTURES/Audiovisual.png"  	title="Audiovisual" alt="Audiovisual"/>
	    </label>
		
	  <label class="seleccionSala">
	    <input type="radio" name="sala"  onclick="mostrarOtraNombre();">
		<img class="" src="../PICTURES/Otra.png" 	title="Otra" alt="Otra"/>
	    </label>
		<br/>
		<input type="text" placeholder="Escriba aquí el lugar" name="salaNombre"  id="otraNombre" style="position:relative;display: none; float:right;right:15%">
		<button type="submit" id="botonAbajo" style="font-size:30px;bottom:7%" class="btn btn-secondary btn-dark btn-block">Siguiente</button>
	</form>	
	</center>
	</div> 
</body>
</html>