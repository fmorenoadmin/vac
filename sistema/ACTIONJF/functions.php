<?php
	if (isset($_REQUEST['meth'])) {
		require_once($ru0.'config/constant.php');
		if (isset($_SESSION['user_id'])) {
			require($ru0.DIRCLA.$cls['dbs'].'.php');
			require_once($ru0.DIRCLA.$cls['cl1'].'.php');
			$_dbs = new $cls['dbs']();
			$_cl1 = new $cls['cl1']();
			//-----------------------------------
			$_tbl->pid = base64_decode($_REQUEST['pid']);
			$_tbl->success = (($_REQUEST['meth']=="act") ? 'active' : 'desactive');
			$_tbl->danger = 'no'.$_tbl->success;
			//-----------------------------------
			$drop = array(
				"updated_at" => date('Y-m-d H:i:s'),
				"id_updated" => $_SESSION['user_id'],
				"status" => (($_REQUEST['meth']=="act") ? 1 : 0),
			);
			//-----------------------------------
			$url = base64_decode($_REQUEST['url']);
			//-----------------------------------
			$resp = $_dbs->db_edit($drop,$_tbl);
			if ($resp->result) {
				$_SESSION['SMStrue'] = $resp->mensaje;
			}else{
				$_SESSION['SMSfalse'] = $resp->mensaje;
			}
			//-----------------------------------
			$_REQUEST = null;
			//-----------------------------------
			header("Location: ".$_SESSION['location']);
			exit();
		}else{
			header("Location: ".E403);
			exit();
		}
	}
	if (isset($_POST['drop'])) {
		require_once($ru0.'config/constant.php');
		if (isset($_SESSION['user_id'])) {
			require($ru0.DIRCLA.$cls['dbs'].'.php');
			require_once($ru0.DIRCLA.$cls['cl1'].'.php');
			$_dbs = new $cls['dbs']();
			$_cl1 = new $cls['cl1']();
			//-----------------------------------
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