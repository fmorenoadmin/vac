<?php
define('HTTP', 'http://');
define('HTTPS', 'https://');
//-------------------------------
define('DIRACT', 'ACTIONVQ/');
define('DIRIMG', 'img/');
define('DIRERR', 'error/');
//-------------------------------
//define('SCHU', '_qas');
define('SCHU', '_prd');
//-------------------------------
if (SCHU == '_qas') {
	define('__DIRIMG__', $_SERVER['DOCUMENT_ROOT']."/generador_url/img/");//ruta global donde se almacenan los archivos
	//-------------------------------------------
	define('DIR', '/generador_url/web/');
	//-------------------------------------------
	define('DOM', 'localhost/');
	define('D_DIR', 'generador_url');
	//-------------------------------------------
	define('URL', HTTPS.DOM.D_DIR.'/');//URL PRINCIPALES
	define('URL2', HTTPS.DOM.D_DIR);//URL PRINCIPALES
}else{
	define('__DIRIMG__', $_SERVER['DOCUMENT_ROOT']."/img/");//ruta global donde se almacenan los archivos
	//-------------------------------------------
	define('DIR', '/');
	//-------------------------------------------
	define('DOM', 'vac.net.pe');
	define('D_DIR', '');
	//-------------------------------------------
	define('URL', HTTPS.'qr.'.DOM.D_DIR.'/');//URL PRINCIPALES
	define('URL2', HTTPS.'qr.'.DOM.D_DIR);//URL PRINCIPALES
}
//-------------------------------
define('ACTI', URL.DIRACT);
//-------------------------------
define('E401', URL2.DIRERR.'401.shtml');
define('E402', URL2.DIRERR.'402.shtml');
define('E403', URL2.DIRERR.'403.shtml');
define('E404', URL2.DIRERR.'404.shtml');
//-------------------------------------------
define('FMMA', 'https://www.frankmorenoalburqueque.com/');
define('LOGOF', FMMA.'images/logo.png');
define('FACE', 'https://www.facebook.com/fmorenoadmin/');
define('TWIT', 'https://www.twitter.com/fmorenoadmin/');
define('INST', 'https://www.instagram.com/fmorenoadmin/');
//-------------------------------------------
define('SECRET_KEY', '');
//-------------------------------------------
// Obtener la dirección IP real del visitante cuando se usa CloudFlare
if (isset($_SERVER['HTTP_CF_CONNECTING_IP'])) {
	$ip_cli = $_SERVER['HTTP_CF_CONNECTING_IP'];
} elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
	$ip_cli = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
	$ip_cli = $_SERVER['REMOTE_ADDR'];
}