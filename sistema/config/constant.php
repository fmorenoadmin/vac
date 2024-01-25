<?php
date_default_timezone_set("America/Lima");
header("Access-Control-Allow-Origin: https://localhost/");
header("Access-Control-Allow-Origin: https://vac.frankmorenoalburqueque.com/");
//-------------------------------------------
define('HTTP', 'http://');
define('HTTPS', 'https://');
//-------------------------------------------
define('TIT', ' | Sistema | Metedología VAC con PHP');
//-------------------------------------------
define('DIRMOR', 'MORENOCL/');
define('DIRACT', 'ACTIONJF/');
//-------------------------------------------
define('__DIRIMG__', $_SERVER['DOCUMENT_ROOT']."/vac/archivos/img/");
define('DIRERR', '/error/');
define('DIR', '/vac/sistema/');
define('CONF', 'config/');
define('VIEW', 'views/');
//-------------------------------------------
define('DB_TYPE', 'mysqli_');
//define('DB_TYPE', 'pg_');
//define('DB_TYPE', 'sqlsrv_');
//-------------------------------------------
define('ROWS', 25);
//-------------------------------------------
define('SCHU', '_qas');//esquema
//define('SCHU', '_prd');
//-------------------------------------------
if (SCHU == '_qas') {
	define('DOM', 'localhost/');
	define('D_DIR', 'vac');
	//-------------------------------------------
	define('URL_L', HTTPS.substr(DOM, 0, -1));
	//-------------------------------------------
	define('URL', HTTPS.DOM.D_DIR.'/sistema/');
	define('URL2', HTTPS.DOM.D_DIR.'/sistema');
}else{
	define('DOM', 'frankmorenoalburqueque.com/');
	define('D_DIR', '');
	//-------------------------------------------
	define('URL', HTTPS.'vac.'.DOM.D_DIR.'sistema/');
	define('URL2', HTTPS.'vac.'.DOM.D_DIR.'sistema');
}
//-------------------------------------------
define('ARCH', HTTPS.DOM.D_DIR.'/archivos/');
define('PLUG', HTTPS.DOM.D_DIR.'/plugins/');
define('SIST', HTTPS.DOM.D_DIR.'/sistema/');
//-------------------------------------------
define('IMG', ARCH.'img/');
define('XCEL', SIST.'excel/');
define('PDFS', SIST.'pdf/');
//-------------------------------------------
define('ACTI', URL.DIRACT);
define('HOME', URL.'home/');
define('LOGI', URL.'login/');
//-------------------------------------------
define('FMMA', 'https://www.frankmorenoalburqueque.com/');
define('LOGOF', FMMA.'images/logo.png');
define('FACE', 'https://www.facebook.com/fmorenoadmin/');
define('TWIT', 'https://www.facebook.com/fmorenoadmin/');
define('INST', 'https://www.facebook.com/fmorenoadmin/');
//-------------------------------------------
define('SECRET_KEY', '');