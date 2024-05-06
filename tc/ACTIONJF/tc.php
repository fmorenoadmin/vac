<?php
	$ru0 = '../';
	$cls = array(
		"dbs"	=>	"database",
		"cl1"	=>	"tc",
	);
	//------------------------------
	$_tbl = new stdClass();
	$_tbl->tname = 'tc';
	$_tbl->tid = 'id_tc';
	$_tbl->pid = 0;
	//------------------------------
	function call($rut,$tipo='tc_last',$pid=null){
		global $cls,$_tbl;
		//------------------------------
		require_once($rut.DIRMOR.$cls['dbs'].'.php');
		$_dbs = new $cls['dbs']();
		//------------------------------
		$data = $_dbs->get_datos($pid,$tipo);
		//------------------------------
		return $data;
	}