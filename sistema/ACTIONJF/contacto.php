<?php
	if(isset($_SESSION)){}else{ session_start(); }
	//------------------------------
	$ru0='../';
	//------------------------------
	$cls = array(
		"dbs"	=>	"database",
		"cl1"	=>	"contacto",
	);
	//------------------------------
	$di1 = $cls['cl1'].'/';
	$di2 = $di1.'detalle/?p=';
	$dt = array();$json = new stdClass();
	//------------------------------
	$_tbl = new stdClass();
	$_tbl->tname = $cls['cl1'];
	$_tbl->tid = 'id';
	$_tbl->pid = 0;
	$_tbl->test = true;
	//-------------------------------
		function index($rut,$uid,$rid,$url,$pag){
			global $cls;
			require_once($rut.DIRMOR.$cls['dbs'].'.php');
			require_once($rut.DIRMOR.$cls['cl1'].'.php');
			$_dbs = new $cls['dbs']();
			$_cl1 = new $cls['cl1']();
			$data = new stdClass();
			//----------------------------------------
			$total = $_cl1->cantidad($rid);
			$data->inf = $_cl1->listar($total,$pag,$rid,$uid,$url);
			$data->btns = $_dbs->db_get_btns($total,$pag,$url);
			//----------------------------------------
			return $data;
		}
		function detalle($rut,$pid){
			global $cls,$_tbl;
			require_once($rut.DIRMOR.$cls['dbs'].'.php');
			require_once($rut.DIRMOR.$cls['cl1'].'.php');
			$_dbs = new $cls['dbs']();
			$_cl1 = new $cls['cl1']();
			$data = new stdClass();
			//----------------------------------------
			$_tbl->pid = $pid;
			//-------------------------------
			$data->inf = $_dbs->db_get_id(NULL,$_tbl);
			$data->seg = $_cl1->listarSeg($pid);
			//-------------------------------
			return $data;
		}
		function exportar($rut){
			global $cls;
			require_once($rut.DIRMOR.$cls['dbs'].'.php');
			require_once($rut.DIRMOR.$cls['cl1'].'.php');
			$_dbs = new $cls['dbs']();
			$_cl1 = new $cls['cl1']();
			$data = new stdClass();
			//-------------------------------
			$data->inf = $_cl1->exportar();
			//-------------------------------
			return $data;
		}
	//-------------------------------
	if (isset($_POST['addSeg'])) {
		if(isset($_SESSION)){}else{ session_start(); }
		require_once($ru0.'config/constant.php');
		//----------------------------------------
		if (isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0) {
			require_once($ru0.DIRMOR.$cls['dbs'].'.php');
			require_once($ru0.DIRMOR.$cls['cl1'].'.php');
			$_dbs = new $cls['dbs']();
			$_cl1 = new $cls['cl1']();
			//----------------------------------------
			$_tbl->tname = 'seg_contacto';//seg_contacto
			$_tbl->success = 'add';
			$_tbl->danger = 'no'.$_tbl->success;
			//----------------------------------------
			$add = array(
				"id"	=>	base64_decode($_POST['pid']),
				"id_usuario"	=>	base64_decode($_POST['uid']),
				"respuesta"	=>	str_replace("'", '´', $_POST['respuesta']),
				"id_created"	=>	base64_decode($_POST['uid']),
				"created_at"	=>	date('Y-m-d H:i:s')
			);
			//----------------------------------------
			$url = base64_decode($_POST['url']);
			//----------------------------------------
			$resp = $_dbs->db_add($add, $_tbl);
			$_SESSION['stat'] = $resp->inf;
			$_SESSION['sql'] = $resp->sql;
			//----------------------------------------
			$_POST = null;
			//----------------------------------------
			header("Location: ".$url);
			exit();
		}else{
			include_once($ru0.'error/403.shtml');
		}
	}
	if (isset($_POST['dropSeg'])) {
		if(isset($_SESSION)){}else{ session_start(); }
		require_once($ru0.'config/constant.php');
		//----------------------------------------
		if (isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0) {
			require_once($ru0.DIRMOR.$cls['dbs'].'.php');
			$_dbs = new $cls['dbs']();
			//----------------------------------------
			$_tbl->tname = 'seg_contacto';//seg_contacto
			$_tbl->tid = 'id_seg';
			$_tbl->pid = base64_decode($_POST['pid']);
			$_tbl->success = 'drop';
			$_tbl->danger = 'no'.$_tbl->success;
			//-----------------------------------
			$drop = array(
				"motivo_drop" => str_replace("'", '´', $_POST['motivo_drop']),
				"drop_at" => date('Y-m-d H:i:s'),
				"id_drop" => base64_decode($_POST['uid']),
				"status" => 2,
			);
			//-----------------------------------
			$url = base64_decode($_POST['url']);
			//-----------------------------------
			$resp = $_dbs->db_edit($drop,$_tbl);
			if ($resp->result) {
				$_SESSION['SMStrue'] = $resp->mensaje;
			}else{
				$_SESSION['SMSfalse'] = $resp->mensaje;
			}
			if (isset($_tbl->test) && $_tbl->test==true) {
				$_SESSION['sql'] = $resp->sql;
			}
			//-----------------------------------
			$_POST = null;
			//-----------------------------------
			header("Location: ".$url);
			exit();
		}else{
			include_once($ru0.'error/403.shtml');
		}
	}
	if (isset($_POST['busq'])) {
		require_once($ru0.'config/constant.php');
		$_tbl = new stdClass();
		//-----------------------------
		if (isset($_SESSION['user_id'])) {
			require_once($ru0.DIRMOR.$cls['dbs'].'.php');
			require_once($ru0.DIRMOR.$cls['cl1'].'.php');
			$_dbs = new $cls['dbs']();
			$_cl1 = new $cls['cl1']();
			//-----------------------------
			$uid = $_SESSION['user_id'];
			$rid = $_SESSION['tipo_id'];
			$total = ROWS;
			$pag = 1;
			//-----------------------------
			$url = base64_decode($_POST['url']);
			//-----------------------------
			$val = $_dbs->custom_escape_string($_POST['val']);
			//-----------------------------
			$_tbl->inf = $_cl1->listar($total,$pag,$rid,$uid,$url,true,$val);
			$_tbl->btns = $_dbs->db_get_btns($total,$pag,$url);
			//-----------------------------
			$_POST = null;
			//-----------------------------
			$_tbl->result = true;
		}else{
			$_tbl->result = false;
			$_tbl->error = true;
			$_tbl->mensaje = 'Usted no tiene Permisos para acceder a este recurso';
		}
		//-----------------------------
		header("Content-type: application/json; Charset: UTF-8;");
		echo json_encode($_tbl);
	}
	//-----------------------------------
	require_once('functions.php');
	//-----------------------------------