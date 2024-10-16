<?php
	if(isset($_SESSION)){}else{ session_start(); }
	//-------------------------------------------
	$rut='../';
	//-------------------------------------------
	require($rut.'config/constant.php');
	//-------------------------------------------
	$data=null;$json = new stdClass();$tipo=1;//excel
	//-------------------------------------------
	if (isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0) {
		if (isset($_REQUEST['cls'])) {
			$pagina = strtoupper($_REQUEST['cls']);
			$action = $_REQUEST['cls'].'.php';
			//-------------------------------------------
			require($rut.DIRACT.$action);
			$data = exportar($rut,$tipo);
			//-------------------------------------------
			header('Content-language: es');
			header("Content-type: application/vnd.ms-excel");
			header("Content-Disposition: attachment; filename=".$pagina.'_'.date('His').".xls");
			//-------------------------------------------
			$html='';
			//-------------------------------------------
			$html.= '<meta charset="utf-8" />';
			$html.= '<br>';
			$html.= '<table border="1">';
				$html.= $data->inf; $data->inf=null;
			$html.= '</table>';
			//-------------------------------------------
			echo $html;
			//-------------------------------------------
			exit();
		}else{
			header("Content-type: application/json; charset: utf-8;");
			//-------------------------------------------
			$json->result = false;
			$json->error = true;
			$json->mensaje = "Usted no tiene persmisos par aacceder a este recurso.";
			//-------------------------------------------
			echo json_encode($json);
		}
	}