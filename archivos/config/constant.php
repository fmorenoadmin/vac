<?php
date_default_timezone_set("America/Lima");
header("Access-Control-Allow-Origin: https://localhost/");
header("Access-Control-Allow-Origin: https://vac.net.pe/");
header("Access-Control-Allow-Origin: https://www.vac.net.pe/");
header("Access-Control-Allow-Origin: https://archivos.vac.net.pe/");
header("Access-Control-Allow-Origin: https://sistema.vac.net.pe/");
header("Access-Control-Allow-Origin: https://plugins.vac.net.pe/");
//-------------------------------------------
define('HTTP', 'http://');
define('HTTPS', 'https://');
define('HTTP2', 'https://www.');
//-------------------------------------------
define('TIT', ' | Metedología VAC-PHP');
define('TIPE', 'Metedología VAC-PHP');
//-------------------------------------------
define('DIRMOR', 'MORENOCL/');
define('DIRACT', 'ACTIONJF/');
//-------------------------------------------
define('__DIRIMG__', $_SERVER['DOCUMENT_ROOT']."/vac/archivos/img/");
define('DIRERR', '/error/');
define('CONF', 'config/');
define('VIEW', 'views/');
//-------------------------------------------
define('DB_TYPE', 'mysqli_');
//define('DB_TYPE', 'pg_');
//define('DB_TYPE', 'sqlsrv_');
//-------------------------------------------
define('ROWS', 25);
//-------------------------------------------
define('SCHU', '_qas');//local
//define('SCHU', '_prd');//servidor
//-------------------------------------------
define('SCHU_EMAIL', SCHU);//local
//-------------------------------------------
if (SCHU == '_qas') {
	define('DIR', '/vac/sistema/');
	//-------------------------------------------
	define('DOM', 'localhost/');
	define('D_DIR', 'vac');
	//-------------------------------------------
	define('URL', HTTPS.DOM.D_DIR.'/web/');
	define('URL2', HTTPS.DOM.D_DIR.'/web');
	//-------------------------------------------
	define('ARCH', HTTPS.DOM.D_DIR.'/archivos/');
	define('PLUG', HTTPS.DOM.D_DIR.'/plugins/');
	define('SIST', HTTPS.DOM.D_DIR.'/sistema/');
	//-------------------------------------------
	define('WEB', HTTPS.DOM.D_DIR.'/web/');
}else{
	define('DIR', '/');
	//-------------------------------------------
	define('DOM', 'vac.net.pe');
	define('D_DIR', '');
	//-------------------------------------------
	define('URL', HTTP2.DOM.D_DIR.'/');
	define('URL2', HTTP2.DOM.D_DIR.'');
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
define('ACTI', URL.DIRACT);
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