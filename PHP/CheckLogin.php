<?php
session_start();
?>
<html>
<head>
</head>
<body>
<?php
 header('Content-Type: charset=utf-8'); 
$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$db_name = "apartadodesalas";
$tbl_name = "Administrador";

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
 die("La conexión falló: " . $conexion->connect_error);
}

$nombre = $_POST['nombre'];
$pass = $_POST['pass'];
 
$sql = "SELECT * FROM $tbl_name WHERE nombre = '$nombre'";

$result = $conexion->query($sql);


if ($result->num_rows > 0) {     
 }
 $row = $result->fetch_array(MYSQLI_ASSOC);
 
 if (password_verify($pass, $row['pass'])) { 
 
    $_SESSION['loggedin'] = true;
    $_SESSION['nombre'] = $nombre;
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);

    echo "¡Bienvenido, " . $_SESSION['nombre']."!";
	echo "<br>";
	
	 
	ob_start(); 
	header("refresh: 3; url = Administrador.php");
	echo 'Espere un momento, redireccionando...'; 
	ob_end_flush();  

   

 } else { 
   echo "Nombre o Contraseña incorrectos.";

   echo "<br><a href='../HTML/LoginAdministrador.html'>Reintentar</a>";
 }
 mysqli_close($conexion); 
 ?>
 </body>
 </html>