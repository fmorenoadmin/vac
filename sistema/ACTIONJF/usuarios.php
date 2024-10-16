<?php
	if(isset($_SESSION)){}else{ session_start(); }
	//-----------------------------------
	$ru0='../';
	//-----------------------------------
	$cls = array(
		"dbs"	=>	'database',
		"cl1"	=>	'usuarios',
		"cl2"	=>	'tipos_usuarios',
	);
	//-----------------------------------
	$di1 = $cls['cl1'].'/';
	$di2=$di1.'detalle/?p=';
	$dt = array();$json = new stdClass();
	//-----------------------------------
	$_tbl = new stdClass();
	$_tbl->tname = $cls['cl1'];
	$_tbl->tid = 'id_user';
	$_tbl->pid = 0;
	$_tbl->test = true;
	//-----------------------------------
		function index($rut,$rid,$uid,$url,$pag){
			global $cls;
			require($rut.DIRMOR.$cls['dbs'].'.php');
			require_once($rut.DIRMOR.$cls['cl1'].'.php');
			require_once($rut.DIRMOR.$cls['cl2'].'.php');
			$_dbs = new $cls['dbs']();
			$_cl1 = new $cls['cl1']();
			$_cl2 = new $cls['cl2']();
			$data = new stdClass();
			//-----------------------------------
			$total = $_cl1->cantidad($rid);
			$data->inf = $_cl1->listar($total,$pag,$rid,$uid,$url);
			$data->btns = $_dbs->db_get_btns($total,$pag,$url);
			$data->cboTipos = $_cl2->cbo($rid);
			$data->pass = $_dbs->getRandomCode();
			//-----------------------------------
			return $data;
		}
		function detalle($rut,$rid,$pid){
			global $cls,$_tbl;
			require($rut.DIRMOR.$cls['dbs'].'.php');
			require_once($rut.DIRMOR.$cls['cl1'].'.php');
			require_once($rut.DIRMOR.$cls['cl2'].'.php');
			$_dbs = new $cls['dbs']();
			$_cl1 = new $cls['cl1']();
			$_cl2 = new $cls['cl2']();
			$data = new stdClass();
			//-----------------------------------
			$_tbl->pid = $pid;
			//-----------------------------------
			$data->call = $_cl1->db_get_id(null,$_tbl);
			$data->cboTipos = $_cl2->cbo($rid,$uid,$tipo);
			//-----------------------------------
			return $data;
		}
		function exportar($rut,$tipo){
			global $cls;
			require_once($rut.DIRMOR.$cls['dbs'].'.php');
			require_once($rut.DIRMOR.$cls['cl1'].'.php');
			$_dbs = new $cls['dbs']();
			$_cl1 = new $cls['cl1']();
			$data = new stdClass();
			//-------------------------------
			$data->inf = $_cl1->exportar($tipo);
			//-------------------------------
			return $data;
		}
	//-----------------------------------
	if (isset($_POST['nuevo'])) {
		require_once($ru0.'config/constant.php');
		//----------------------------------------
		$destino= __DIRIMG__."usuarios/";
		//----------------------------------------
		if (isset($_SESSION['user_id'])) {
			require($ru0.DIRMOR.$cls['dbs'].'.php');
			require_once($ru0.DIRMOR.$cls['cl1'].'.php');
			$_dbs = new $cls['dbs']();
			$_cl1 = new $cls['cl1']();
			//-----------------------------------
			$_tbl->success = 'add';
			$_tbl->danger = 'no'.$_tbl->success;
			//----------------------------------------
			if (is_uploaded_file($_FILES["foto_u"]["tmp_name"])) {
				$nombfile=$_FILES["foto_u"]["name"];
				$taman=$_FILES["foto_u"]["size"];
				$type=$_FILES["foto_u"]["type"];
				$foto_u=date("YmdHis").str_replace(' ', '_', $nombfile);
				$sub_file = true;
			}else{
				$foto_u='user.png';
				$sub_file = false;
			}
			//-----------------------------------
			$add = array(
				"id_tipo" => base64_decode($_POST['id_tipo']),
				"nombres_u" => $_dbs->custom_escape_string($_POST['nombres_u']),
				"apellidos_u" => $_dbs->custom_escape_string($_POST['apellidos_u']),
				"correo_u" => $_dbs->custom_escape_string($_POST['correo_u']),
				"usuario_u" => $_dbs->custom_escape_string($_POST['usuario_u']),
				"contrasenia_u" => password_hash($_POST['contrasenia_u'], PASSWORD_BCRYPT),
				"telefono_u" => $_dbs->custom_escape_string(str_replace(array(" ", '-', '_'), '', $_POST['telefono_u'])),
				"foto_u" => $foto_u,
				"descrip_u" => str_replace("'", '´', $_POST['descrip_u']),
				"created_at" => date('Y-m-d H:i:s'),
				"id_created" => base64_decode($_POST['uid']),
				"status" => ((isset($_POST['status'])) ? $_POST['status'] : 1),
			);
			//-----------------------------------
			$url = base64_decode($_POST['url']);
			//-----------------------------------
			$resp = $_dbs->db_add($add,$_tbl);
			if ($resp->result) {
				$_SESSION['SMStrue'] = $resp->mensaje;
				if ($sub_file) {
					move_uploaded_file($_FILES["foto_u"]["tmp_name"], $destino.$foto_u);
				}
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
			header("Location: ".E403);
			exit();
		}
	}
	if (isset($_POST['editar'])) {
		require_once($ru0.'config/constant.php');
		//----------------------------------------
		$destino= __DIRIMG__."usuarios/";
		//----------------------------------------
		if (isset($_SESSION['user_id'])) {
			require($ru0.DIRMOR.$cls['dbs'].'.php');
			require_once($ru0.DIRMOR.$cls['cl1'].'.php');
			$_dbs = new $cls['dbs']();
			$_cl1 = new $cls['cl1']();
			//-----------------------------------
			$_tbl->pid = base64_decode($_POST['pid']);
			$_tbl->success = 'edit';
			$_tbl->danger = 'no'.$_tbl->success;
			//----------------------------------------
			if (is_uploaded_file($_FILES["foto_u"]["tmp_name"])) {
				$nombfile=$_FILES["foto_u"]["name"];
				$taman=$_FILES["foto_u"]["size"];
				$type=$_FILES["foto_u"]["type"];
				$foto_u=date("YmdHis").str_replace(' ', '_', $nombfile);
				$sub_file = true;
			}else{
				$foto_u=$_POST['foto_u_ant'];
				$sub_file = false;
			}
			//-----------------------------------
			if (strlen($_POST['contrasenia_u']) > 5) {
				$pass = password_hash($_POST['contrasenia_u'], PASSWORD_BCRYPT);
			}else{
				$pass = base64_decode($_POST['contrasenia_u_ant']);
			}
			//-----------------------------------
			$edit = array(
				"id_tipo" => base64_decode($_POST['id_tipo']),
				"nombres_u" => $_dbs->custom_escape_string($_POST['nombres_u']),
				"apellidos_u" => $_dbs->custom_escape_string($_POST['apellidos_u']),
				"correo_u" => $_dbs->custom_escape_string($_POST['correo_u']),
				"usuario_u" => $_dbs->custom_escape_string($_POST['usuario_u']),
				"contrasenia_u" => $pass,
				"telefono_u" => $_dbs->custom_escape_string(str_replace(array(" ", '-', '_'), '', $_POST['telefono_u'])),
				"foto_u" => $foto_u,
				"descrip_u" => str_replace("'", '´', $_POST['descrip_u']),
				"updated_at" => date('Y-m-d H:i:s'),
				"id_updated" => base64_decode($_POST['uid']),
				"status" => ((isset($_POST['status'])) ? $_POST['status'] : 1),
			);
			//-----------------------------------
			$url = base64_decode($_POST['url']);
			//-----------------------------------
			$resp = $_dbs->db_edit($edit,$_tbl);
			if ($resp->result) {
				$_SESSION['SMStrue'] = $resp->mensaje;
				if ($sub_file) {
					move_uploaded_file($_FILES["foto_u"]["tmp_name"], $destino.$foto_u);
				}
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
			header("Location: ".E403);
			exit();
		}
	}
	if (isset($_POST['busq'])) {
		require_once($ru0.'config/constant.php');
		$resp = new stdClass();
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