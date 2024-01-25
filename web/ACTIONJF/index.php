<?php
	$ru0='./';
	$cls = array(
		"dbs"	=>	"database",
		"cl1"	=>	"cursos",
	);
	$dir1='./';
	$dir2='./detalle.php?p=';
	//------------------------------
	$_tbl = new stdClass();
	$_tbl->tname = $cls['cl1'];
	$_tbl->tid = 'id';
	$_tbl->pid = 0;
	//-----------------------------
	function index($rut){
		global $cls;
		require_once($rut.DIRMOR.$cls['dbs'].'.php');
		require_once($rut.DIRMOR.$cls['cl1'].'.php');
		$_dbs = new $cls['dbs']();
		$_cl1 = new $cls['cl1']();
		$data = new stdClass();
		//----------------------------------------
		$data->inf = $_cl1->listar();
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