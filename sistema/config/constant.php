<?php
date_default_timezone_set("America/Lima");
header("Access-Control-Allow-Origin: https://localhost/");
header("Access-Control-Allow-Origin: https://vac.net.pe/");
header("Access-Control-Allow-Origin: https://www.vac.net.pe/");
header("Access-Control-Allow-Origin: https://archivos.vac.net.pe/");
header("Access-Control-Allow-Origin: https://sistema.vac.net.pe/");
header("Access-Control-Allow-Origin: https://plugins.vac.net.pe/");
header("Access-Control-Allow-Origin: https://qr.vac.net.pe/");
//-------------------------------------------
define('HTTP', 'http://');
define('HTTPS', 'https://');
define('HTTP2', 'https://www.');
//-------------------------------------------
define('TIT', ' | Sistema | Metedología VAC con PHP');//titulo de todas las paginas
define('TIPE', 'Metedología VAC-PHP');//nomrbe de proyecto
//-------------------------------------------
define('DIRMOR', 'MORENOCL/');//carpeta donde se alamacenan las clases
define('DIRACT', 'ACTIONJF/');//carpeta donde se alamacenan las acciones
//-------------------------------------------
define('DIRERR', '/error/');//carpeta donde se alamacenan los archivos de error
define('CONF', 'config/');//carpeta principal donde de almacena la configuración del Proyecto
define('VIEW', 'views/');//se almacenan vistas que pueden ser llamadas desde varias vistas globales
//-------------------------------------------
define('DB_TYPE', 'mysqli_');//base de datos MySQL
//define('DB_TYPE', 'pg_');//base de datos PostgreSQL
//define('DB_TYPE', 'sqlsrv_');//base de datos SQL Server
//-------------------------------------------
define('ROWS', 20);//cantidad de registros por vista, para las tablas
//-------------------------------------------
//define('SCHU', '_qas');//esquema
define('SCHU', '_prd');//servidor
//-------------------------------------------
define('SCHU_EMAIL', SCHU);//local
//-------------------------------------------
if (SCHU == '_qas') {
	define('__DIRIMG__', $_SERVER['DOCUMENT_ROOT']."/vac/archivos/img/");//ruta global donde se almacenan los archivos
	//-------------------------------------------
	define('DIR', '/vac/sistema/');
	//-------------------------------------------
	define('DOM', 'localhost/');
	define('D_DIR', 'vac');
	//-------------------------------------------
	define('URL_L', HTTPS.substr(DOM, 0, -1));
	//-------------------------------------------
	define('URL', HTTPS.DOM.D_DIR.'/sistema/');//URL PRINCIPALES
	define('URL2', HTTPS.DOM.D_DIR.'/sistema');//URL PRINCIPALES
	//-------------------------------------------
	define('ARCH', HTTPS.DOM.D_DIR.'/archivos/');
	define('PLUG', HTTPS.DOM.D_DIR.'/plugins/');
	define('SIST', HTTPS.DOM.D_DIR.'/sistema/');
	//-------------------------------------------
	define('WEB', HTTPS.DOM.D_DIR.'/web/');
}else{
	define('__DIRIMG__', substr($_SERVER['DOCUMENT_ROOT'], 0, -8)."/archivos/img/");//ruta global donde se almacenan los archivos
	//-------------------------------------------
	define('DIR', '/');
	//-------------------------------------------
	define('DOM', 'vac.net.pe');
	define('D_DIR', '');
	//-------------------------------------------
	define('URL', HTTPS.'sistema.'.DOM.D_DIR.'/');//URL PRINCIPALES
	define('URL2', HTTPS.'sistema.'.DOM.D_DIR);//URL PRINCIPALES
	//-------------------------------------------
	define('ARCH', HTTPS.'archivos.'.DOM.'/');
	define('PLUG', HTTPS.'plugins.'.DOM.'/');
	define('SIST', HTTPS.'sistema.'.DOM.'/');
	//-------------------------------------------
	define('WEB', HTTP2.DOM.'/');
}
//-------------------------------------------
define('IMG', ARCH.'img/');
//-------------------------------------------
define('LOGO', IMG.'logo600x300.png');
//-------------------------------------------
define('XCEL', SIST.'excel/');
define('PDFS', SIST.'pdf/');
//-------------------------------------------
define('ACTI', URL.DIRACT);
define('HOME', URL.'home/');
define('LOGI', URL.'login/');
//-------------------------------------------
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