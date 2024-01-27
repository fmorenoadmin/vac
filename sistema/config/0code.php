<?php
require_once($rut.'config/constant.php');
//------------------------------------
$_SESSION['location'] = $location = HTTPS.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
//------------------------------------
if ($_SERVER['REQUEST_URI'] == DIRERR) {
}else if ($_SERVER['REQUEST_URI'] == DIR) {
}else{
	if (!isset($_SESSION['user_id']) || $_SESSION['user_id']==0) {
		$_SESSION['_dir_url'] = base64_encode($_SERVER['REQUEST_URI']);
		//-----------------------------------------------------------------------
		header("Location: ".LOGI);
		exit();
	}
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
		if (isset($_SESSION['tipo_id'])) { $rid = $_SESSION['tipo_id']; }else{ $rid = $_SESSION['tipo_id'] = 0; }
		if (isset($_SESSION['tipo_nomb'])) { $tno = $_SESSION['tipo_nomb']; }else{ $tno = $_SESSION['tipo_nomb'] = NULL; }
		//--------------------------------------------------
		if (isset($_SESSION['user_id'])) { $uid = $_SESSION['user_id']; }else{ $uid = $_SESSION['user_id'] = 0; }
		if (isset($_SESSION['user_nomb'])) { $uno = $_SESSION['user_nomb']; }else{ $uno = $_SESSION['user_nomb'] = NULL; }
		if (isset($_SESSION['user_apel'])) { $uap = $_SESSION['user_apel']; }else{ $uap = $_SESSION['user_apel'] = NULL; }
		if (isset($_SESSION['user_name'])) { $una = $_SESSION['user_name']; }else{ $una = $_SESSION['user_name'] = NULL; }
		if (isset($_SESSION['user_foto'])) { $ufo = $_SESSION['user_foto']; }else{ $ufo = $_SESSION['user_foto'] = NULL; }
	//--------------------------------------------------
	$apel_sup = $uap;
	$pri_ape = $uap;
	$l1_n = strtoupper(substr($uno, 0, 1));
	$l1_a = substr($pri_ape, 0, 1);
	$l2_a = (isset($pri_ape)) ? strtoupper(substr($apel_sup, 0, 1)) : '';
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
}
//echo '<pre style="display: none;">'.__DIRIMG__.'</pre>';