<?php
	$ru0='../';
	$cls = array(
		"dbs"	=>	"database",
		"cl1"	=>	"cursos",
	);//clases => cls
	//------------------------------
	$_tbl = new stdClass();//_tbl => tabla
	$_tbl->tname = $cls['cl1'];//tname => table name
	$_tbl->tid = 'id';//id PK de la tabla
	$_tbl->pid = 0;
	//-----------------------------
	function index($rut){
		global $cls;//llama o invoca a la variable para ser usada dentro de la función
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