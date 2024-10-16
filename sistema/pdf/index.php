<?php
	if(isset($_SESSION)){}else{ session_start(); }
	$rut='../';
	//-------------------------------------------
	require($rut.'config/constant.php');
	//-------------------------------------------
	$data=null;$json = new stdClass();$tipo=2;//excel
	//-------------------------------------------
	require_once($rut.'../plugins/dompdf_2.0.4/vendor/autoload.php');
	//-------------------------------------------
	use Dompdf\Dompdf;
	//-------------------------------------------
	if (isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0) {
		if (isset($_REQUEST['cls'])) {
			$pagina = strtoupper($_REQUEST['cls']);
			$action = $_REQUEST['cls'].'.php';
			//-------------------------------------------
			require($rut.DIRACT.$action);
			$data = exportar($rut,$tipo);
			//-------------------------------------------
			$paper_size=array(0,0,1080,720);
			//$paper_size='"letter","landscape"';
			$html="";
			//-------------------------------------------
			$html.='<meta charset="utf-8">';
			//-------------------------------------------
			$html.='<table width="100%" style="vertical-align: middle;">';
				$html.='<tr>';
					$html.='<th width="20%">';
					$html.='</th>';
					$html.='<th width="60%" align="center" style="font-size: 2em;">';
			    		$html.='Lista de '.$pagina;
					$html.='</th>';
					$html.='<th width="20%">';
					$html.='</th>';
				$html.='</tr>';
			$html.='</table>';
			$html.='<br>';
			$html.='<br>';
		    $html.='<table border="1" width="100%">';
			    $html.=$data->inf; $data->inf=null;
			$html.='</table>';
			$html.='<br>';
			//-------------------------------------------
			$data=null;
			ob_start();
			$dompdf = new DOMPDF();
			$dompdf->set_paper($paper_size);
			$dompdf->load_html($html);
			$dompdf->render();
			$dompdf->stream($pagina.'_'.date('His').".pdf");
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