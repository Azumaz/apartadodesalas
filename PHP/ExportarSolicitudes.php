<?php
$tipo = isset($_REQUEST['t']) ? $_REQUEST['t'] : 'excel';
$extension = '.xls';

if($tipo == 'word') $extension = '.doc';

// Si queremos exportar a PDF
if($tipo == 'pdf'){
	//En desarrollo
} else{
    require_once '../PHP/MostrarSolicitudes.php';
    
    header("Content-type: application/vnd.ms-$tipo");
    header("Content-Disposition: attachment; filename=Solicitudes$extension");
    header("Pragma: no-cache");
    header("Expires: 0");    
}