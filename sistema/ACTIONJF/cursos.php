<?php
	if(isset($_SESSION)){}else{ session_start(); }
	//------------------------------
	$ru0='../';
	//------------------------------
	$cls = array(
		"dbs"	=>	"database",
		"cl1"	=>	"cursos",
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
	//------------------------------
		function index($rut,$uid,$rid,$url,$pag){
			global $cls;
			require_once($rut.DIRMOR.$cls['dbs'].'.php');
			require_once($rut.DIRMOR.$cls['cl1'].'.php');//LA ACCION INVOCA A LA CLASE
			$_dbs = new $cls['dbs']();
			$_cl1 = new $cls['cl1']();
			$data = new stdClass();
			//----------------------------------------
			$total = $_cl1->cantidad($rid);
			$data->inf = $_cl1->listar($total,$pag,$rid,$uid,$url);//CUERPO HTML TABLA
			$data->btns = $_dbs->db_get_btns($total,$pag,$url);
			//----------------------------------------
			return $data;
		}
		function detalle($rut,$pid){
			global $cls, $_tbl;
			require_once($rut.DIRMOR.$cls['dbs'].'.php');
			require_once($rut.DIRMOR.$cls['cl1'].'.php');
			$_dbs = new $cls['dbs']();
			$_cl1 = new $cls['cl1']();
			$data = new stdClass();
			//----------------------------------------
			$_tbl->pid = $pid;
			//----------------------------------------
			$data->inf = $_dbs->db_get_id(NULL, $_tbl);
			//----------------------------------------
			return $data;
		}
		function exportar($rut,$tip){
			global $cls;
			require_once($rut.DIRMOR.$cls['dbs'].'.php');
			require_once($rut.DIRMOR.$cls['cl1'].'.php');
			$_dbs = new $cls['dbs']();
			$_cl1 = new $cls['cl1']();
			$data = new stdClass();
			//-------------------------------
			$data->inf = $_cl1->exportar($tip);
			//-------------------------------
			return $data;
		}
	//------------------------------
	if (isset($_POST['nuevo'])) {
		require_once($ru0.'config/constant.php');
		//----------------------------------------
		$destino= __DIRIMG__."cursos/";
		//----------------------------------------
		if (isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0) {
			require_once($ru0.DIRMOR.$cls['dbs'].'.php');
			$_dbs = new $cls['dbs']();
			//----------------------------------------
			$_tbl->success = 'add';
			$_tbl->danger = 'no'.$_tbl->success;
			//----------------------------------------
			$nombre = $_dbs->custom_escape_string($_POST['nombre']);
			$descrip = str_replace("'", '´', $_POST['descrip']);
			//----------------------------------------
			if (is_uploaded_file($_FILES["imagen"]["tmp_name"])) {
				$nombfile=$_FILES["imagen"]["name"];
				$taman=$_FILES["imagen"]["size"];
				$type=$_FILES["imagen"]["type"];
				$imagen=date("YmdHis").str_replace(' ', '_', $nombfile);
				$sub_file = true;
			}else{
				$imagen='user.png';
				$sub_file = false;
			}
			//----------------------------------------
			//Las key deben se iguales a los campos de la tabla
			$add = array(
				"nombre"	=>	$nombre,
				"descrip"	=>	$descrip,
				"imagen"	=>	$imagen,
				"id_created"	=> base64_decode($_POST['uid']),
				"created_at"	=>	date('Y-m-d H:i:s')
			);
			//----------------------------------------
			$url = base64_decode($_POST['url']);
			//----------------------------------------
			$resp = $_dbs->db_add($add,$_tbl);
			if ($resp->result) {
				if ($sub_file) {
					move_uploaded_file($_FILES["imagen"]["tmp_name"], $destino.$imagen);
				}
			}
			$_SESSION['stat'] = $resp->inf;
			if (isset($_tbl->test) && $_tbl->test==true) {
				$_SESSION['sql'] = $resp->sql;
			}
			//----------------------------------------
			$_POST = null;
			//----------------------------------------
			header("Location: ".$url);
			exit();
		}else{
			include_once($ru0.'error/403.shtml');
		}
	}
	if (isset($_POST['editar'])) {
		require_once($ru0.'config/constant.php');
		//----------------------------------------
		$destino= __DIRIMG__."cursos/";
		//----------------------------------------
		if (isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0) {
			require_once($ru0.DIRMOR.$cls['dbs'].'.php');
			$_dbs = new $cls['dbs']();
			//----------------------------------------
			$_tbl->pid = base64_decode($_POST['pid']);
			$_tbl->success = 'edit';
			$_tbl->danger = 'no'.$_tbl->success;
			//----------------------------------------
			$nombre = $_dbs->custom_escape_string($_POST['nombre']);
			$descrip = str_replace("'", '´', $_POST['descrip']);
			//----------------------------------------
			if (is_uploaded_file($_FILES["imagen"]["tmp_name"])) {
				$nombfile=$_FILES["imagen"]["name"];
				$taman=$_FILES["imagen"]["size"];
				$type=$_FILES["imagen"]["type"];
				$imagen=date("YmdHis").str_replace(' ', '_', $nombfile);
				$sub_file = true;
			}else{
				$imagen=$_POST['imagen_ant'];
				$sub_file = false;
			}
			//----------------------------------------
			$edit = array(
				"nombre"	=>	$nombre,
				"descrip"	=>	$descrip,
				"imagen"	=>	$imagen,
				"id_updated"	=>	base64_decode($_POST['uid']),
				"updated_at"	=>	date('Y-m-d H:i:s')
			);
			//----------------------------------------
			$url = base64_decode($_POST['url']);
			//----------------------------------------
			$resp = $_dbs->db_edit($edit,$_tbl);
			if ($resp->result) {
				if ($sub_file) {
					move_uploaded_file($_FILES["imagen"]["tmp_name"], $destino.$imagen);
				}
			}
			$_SESSION['stat'] = $resp->inf;
			if (isset($_tbl->test) && $_tbl->test==true) {
				$_SESSION['sql'] = $resp->sql;
			}
			//----------------------------------------
			$_POST = null;
			//----------------------------------------
			header("Location: ".$url);
			exit();
		}else{
			include_once($ru0.'error/403.shtml');
		}
	}
	if (isset($_POST['busq'])) {
		require_once($ru0.'config/constant.php');
		$resp = new stdClass();
		//-----------------------------
		if (isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0) {
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
			$resp->inf = $_cl1->listar($total,$pag,$rid,$uid,$url,true,$val);
			$resp->btns = $_dbs->db_get_btns($total,$pag,$url);
			if (isset($_tbl->test) && $_tbl->test==true) {
				$_SESSION['sql'] = $resp->inf->sql;
			}
			//-----------------------------
			$_POST = null;
			//-----------------------------
			$resp->result = true;
		}else{
			$resp->result = false;
			$resp->error = true;
			$resp->mensaje = 'Usted no tiene Permisos para acceder a este recurso';
		}
		//-----------------------------
		header("Content-type: application/json; Charset: UTF-8;");
		echo json_encode($resp);
	}
	//-----------------------------------
	require_once('functions.php');
	//-----------------------------------