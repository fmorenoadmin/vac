<?php
require_once($rut.'config/constant.php');
//--------------------------------------------------
$_SESSION['location'] = $location = HTTPS.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
//--------------------------------------------------
//variables
$uid=null;$rid=null;$tna=null;$una=null;$uno=null;$uap=null;$uus=null;$uem=null;$ufe=null;$uho=null;$ufo=null;$tallid=0;$tallna=null;$pid=null;$vdat=null;$ap_M=false;$u_inte=null;$u_inic=null;$u_proy=null;$is_vac=0;
$schu=SCHU;$singlr=null;
$bot=' <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
//--------------------------------------------------
if (isset($_REQUEST['p'])) { $pid = $_SESSION['pid'] = base64_decode($_REQUEST['p']); }
if (isset($_REQUEST['v'])) { $vid = $_SESSION['vid'] = base64_decode($_REQUEST['v']); }
//--------------------------------------------------SESSIONES
if (isset($_SESSION['sid'])) { $sid = $_SESSION['sid']; }else{ $sid = $_SESSION['sid'] = session_id(); }
//--------------------------------------------------
$day = date('w');
$wk_s_ant = date('Y-m-d', strtotime('-'.($day + 7).' days'));
$wk_e_ant = date('Y-m-d', strtotime('+'.(6 - 7 - $day).' days'));
$wk_s_hoy = date('Y-m-d', strtotime('-'.($day).' days'));
$wk_e_hoy = date('Y-m-d', strtotime('+'.(6 - $day).' days'));
$mont_lim = date('Y-m-d', strtotime('-3 month'));
$day_lim = date('Y-m-d', strtotime('-3 days'));
//--------------------------------------------------
if (isset($_REQUEST['pag'])) {
	$pag = base64_decode($_REQUEST['pag']);
	if ($pag > 0) {
	}else{
		$pag = 1;
	}
}else{
	$pag = 1;
}
//echo '<pre style="display: none;">'.__DIRIMG__.'</pre>';