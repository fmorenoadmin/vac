<?php
	if(isset($_SESSION)){}else{ session_start(); }
	//-----------------------------------
	$ru0='../';
	//-----------------------------------
	$cls = array(
		"dbs"	=>	'DataBase',
		"cl1"	=>	'[CLASS_NAME]',
	);
	$di1 = $cls['cl1'].'/';
	//-----------------------------------
	$dt = new stdClass();
	$_tbl = new stdClass();
	$_tbl->tname = 'public.'.$cls['cl1'];
	$_tbl->tid = '[TABLE_ID]';
	$_tbl->pid = 0;
	//-----------------------------------
		function index($rut,$rid,$uid,$url){
			global $cls;
			require($rut.DIRCLA.$cls['dbs'].'.php');
			require_once($rut.DIRCLA.$cls['cl1'].'.php');
			$_dbs = new $cls['dbs']();
			$_cl1 = new $cls['cl1']();
			$data = new stdClass();
			//-----------------------------------
			$total = $_cl1->cantidad($rid);
			$data->inf = $_cl1->listar($total,$pag,$rid,$uid,$url);
			$data->btns = $_dbs->db_get_btns($total,$pag,$url);
			//$data->cboTipos = $_cl2->cbo($rid,$uid,$tipo);
			//-----------------------------------
			return $data;
		}
		function detalle($rut,$rid,$pid){
			global $cls,$_tbl;
			require($rut.DIRCLA.$cls['dbs'].'.php');
			require_once($rut.DIRCLA.$cls['cl1'].'.php');
			$_dbs = new $cls['dbs']();
			$_cl1 = new $cls['cl1']();
			$data = new stdClass();
			//-----------------------------------
			$_tbl->pid = $pid;
			//-----------------------------------
			$data->call = $_cl1->db_get_id(null,$_tbl);
			//$data->cboTipos = $_cl2->cbo($rid,$uid,$tipo);
			//-----------------------------------
			return $data;
		}
	//-----------------------------------
	if (isset($_POST['nuevo'])) {
		require_once($ru0.'config/constant.php');
		if (isset($_SESSION['user_id'])) {
			require($ru0.DIRCLA.$cls['dbs'].'.php');
			require_once($ru0.DIRCLA.$cls['cl1'].'.php');
			$_dbs = new $cls['dbs']();
			$_cl1 = new $cls['cl1']();
			//-----------------------------------
			$_tbl->success = 'add';
			$_tbl->danger = 'no'.$_tbl->success;
			//-----------------------------------
			$add = array(
				"nombre" => $_POST['nombre'],
				"und_neg" => $_POST['und_neg'],
				"direccion" => $_POST['direccion'],
				"enlace" => $_POST['enlace'],
				"telefono" => str_replace(array(" ", '-', '_'), '', $_POST['telefono']),
				"descrip" => str_replace("'", '´', $_POST['descrip']),
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
			}else{
				$_SESSION['SMSfalse'] = $resp->mensaje;
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
		if (isset($_SESSION['user_id'])) {
			require($ru0.DIRCLA.$cls['dbs'].'.php');
			require_once($ru0.DIRCLA.$cls['cl1'].'.php');
			$_dbs = new $cls['dbs']();
			$_cl1 = new $cls['cl1']();
			//-----------------------------------
			$_tbl->pid = base64_decode($_POST['pid']);
			$_tbl->success = 'edit';
			$_tbl->danger = 'no'.$_tbl->success;
			//-----------------------------------
			$edit = array(
				"nombre" => $_POST['nombre'],
				"und_neg" => $_POST['und_neg'],
				"direccion" => $_POST['direccion'],
				"enlace" => $_POST['enlace'],
				"telefono" => str_replace(array(" ", '-', '_'), '', $_POST['telefono']),
				"descrip" => str_replace("'", '´', $_POST['descrip']),
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
			}else{
				$_SESSION['SMSfalse'] = $resp->mensaje;
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
	//-----------------------------------
	require_once('functions.php');
	//-----------------------------------