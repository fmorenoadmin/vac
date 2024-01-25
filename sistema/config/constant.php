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
define('__DIRIMG__', $_SERVER['DOCUMENT_ROOT']."/vac/img/");
define('DIRERR', '/error/');
define('CONF', 'config/');
//-------------------------------------------
//-------------------------------------------
define('SCHU', '_qas');//esquema
//define('SCHU', '_prd');
//-------------------------------------------
if (SCHU == '_qas') {
	define('DOM', 'localhost/');
	define('DIR', 'vac');
	//-------------------------------------------
	define('URL', HTTPS.DOM.DIR.'/sistema/');
	define('URL2', HTTPS.DOM.DIR.'/sistema');
}else{
	define('DOM', 'frankmorenoalburqueque.com/');
	define('DIR', '');
	//-------------------------------------------
	define('URL', HTTPS.'vac.'.DOM.DIR.'sistema/');
	define('URL2', HTTPS.'vac.'.DOM.DIR.'sistema');
}
//-------------------------------------------
define('ARCH', HTTPS.DOM.DIR.'/archivos/');
define('PLUG', HTTPS.DOM.DIR.'/plugins/');
define('SIST', HTTPS.DOM.DIR.'/sistema/');
//-------------------------------------------
define('IMG', ARCH.'img/');
define('XCEL', SIST.'excel/');
define('LOGI', SIST.'login/');
define('PDFS', SIST.'pdf/');
//-------------------------------------------
define('ACTI', URL.DIRACT);
//-------------------------------------------
define('FMMA', 'https://www.frankmorenoalburqueque.com/');
define('LOGOF', FMMA.'images/logo.png');
define('FACE', 'https://www.facebook.com/fmorenoadmin/');
define('TWIT', 'https://www.facebook.com/fmorenoadmin/');
define('INST', 'https://www.facebook.com/fmorenoadmin/');
//-------------------------------------------
define('SECRET_KEY', '');