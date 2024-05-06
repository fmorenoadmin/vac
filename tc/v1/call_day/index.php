<?php
if(isset($_SESSION)){ }else{ session_start(); }
//_--------------------------------------------------
$rut = '../../';$action='tc';
//_--------------------------------------------------
require_once($rut.'config/0code.php');
//_--------------------------------------------------
$json = new stdClass();
//_--------------------------------------------------
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$json->type = 'POST';
	$json->post = $_POST;
	$fecha = $_POST['fecha'] ?? null;
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
	$json->type = 'GET';
	$json->get = $_GET;
	$fecha = $_GET['fecha'] ?? null;
} else {
	$json->type = 'RAW';
	// Obtener los datos RAW de la petición
	$data = file_get_contents('php://input');
	$json->raw = $data;
	// Intentar decodificar los datos JSON
	$decodedData = json_decode($data, true);
	if ($decodedData) {
		$fecha = $decodedData['fecha'] ?? null;
	} else {
		$fecha = null;
	}
}
//_--------------------------------------------------
if (!is_null($fecha)) {
	require_once($rut.DIRACT.$action.'.php');
	$json = call($rut,'tc_day',$fecha);
}else{
	$json->result = 0;
	$json->error = 1;
	$json->mensaje = 'no se recibió: fecha, campo obligatorio para esta API.';
}
//_--------------------------------------------------
$json->ip_cli = $ip_cli;
//_--------------------------------------------------
header("content-type: application/json; Charset: UTF-8;");
echo json_encode($json, JSON_PRETTY_PRINT);
//_--------------------------------------------------