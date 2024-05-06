<?php
if(isset($_SESSION)){ }else{ session_start(); }
//_--------------------------------------------------
$rut = '../../';$action='tc';
//_--------------------------------------------------
require_once($rut.'config/0code.php');
//_--------------------------------------------------
$json = new stdClass();
//_--------------------------------------------------
require_once($rut.DIRACT.$action.'.php');
$json = call($rut);
//_--------------------------------------------------
header("content-type: application/json; Charset: UTF-8;");
echo json_encode($json, JSON_PRETTY_PRINT);
//_--------------------------------------------------