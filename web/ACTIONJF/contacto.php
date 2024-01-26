<?php
	$ru0='../';
	$cls = array(
		"dbs"	=>	"database",
		"cl0"	=>	"correo",
		"cl1"	=>	"contacto",
	);
	$di1=$cls['cl1'].'/';
	$di2=$di1.'detalle/?p=';
	$dt = array();$json = new stdClass();
	//------------------------------
	$_tbl = new stdClass();
	$_tbl->tname = $cls['cl1'];
	$_tbl->tid = 'id';
	$_tbl->pid = 0;
	$_tbl->test = true;
	//-------------------------------
	if (isset($_POST['guardar'])) {
		if(isset($_SESSION)){}else{ session_start(); }
		require_once($ru0.'config/constant.php');
		//----------------------------------------
		if (isset($_SESSION['sid'])) {
			require_once($ru0.DIRMOR.$cls['dbs'].'.php');
			require_once($ru0.DIRMOR.$cls['cl1'].'.php');
			$_dbs = new $cls['dbs']();
			$_cl1 = new $cls['cl1']();
			//----------------------------------------
			$_tbl->success = 'add';
			$_tbl->danger = 'no'.$_tbl->success;
			//----------------------------------------
			$ip_cli = $_dbs->custom_escape_string(base64_decode($_POST['ip_cli']));
			//----------------------------------------
			$url = base64_decode($_POST['url']);
			//----------------------------------------
			$cant = $_cl1->cantidad($ip_cli);
			if ($cant < 12) {
				$nombre = $_dbs->custom_escape_string($_POST['nombre']);
				$correo = $_dbs->custom_escape_string($_POST['correo']);
				$telefono = $_dbs->custom_escape_string($_POST['telefono']);
				$mensaje = str_replace("'", '´', $_POST['mensaje']);
				$nav_cli = $_dbs->custom_escape_string(base64_decode($_POST['nav_cli']));
				$sist_cli = $_dbs->custom_escape_string(base64_decode($_POST['sist_cli']));
				$utm_id = $_dbs->custom_escape_string($_POST['utm_id']);
				$utm_campaign = $_dbs->custom_escape_string($_POST['utm_campaign']);
				$utm_source = $_dbs->custom_escape_string($_POST['utm_source']);
				$utm_medium = $_dbs->custom_escape_string($_POST['utm_medium']);
				$utm_content = $_dbs->custom_escape_string($_POST['utm_content']);
				$utm_term = $_dbs->custom_escape_string($_POST['utm_term']);
				$fbclid = $_dbs->custom_escape_string($_POST['fbclid']);
				$gclid = $_dbs->custom_escape_string($_POST['gclid']);
				//----------------------------------------
				$add = array(
					"nombre"	=>	$nombre,
					"correo"	=>	$correo,
					"telefono"	=>	$telefono,
					"mensaje"	=>	$mensaje,
					"ip_cli"	=>	$ip_cli,
					"nav_cli"	=>	$nav_cli,
					"sist_cli"	=>	$sist_cli,
					"utm_id"	=>	$utm_id,
					"utm_campaign"	=>	$utm_campaign,
					"utm_source"	=>	$utm_source,
					"utm_medium"	=>	$utm_medium,
					"utm_content"	=>	$utm_content,
					"utm_term"	=>	$utm_term,
					"fbclid"	=>	$fbclid,
					"gclid"	=>	$gclid,
					"created_at"	=>	date('Y-m-d H:i:s')
				);
				//----------------------------------------
				$resp = $_dbs->db_add($add, $_tbl);
				if ($resp->result) {
					$html = null;
					//----------------------------------------
					$asunto = 'Formulario de contacto - VAC';
					//----------------------------------------
						require_once($ru0.DIRMOR.$cls['cl0'].'.php');
						$_cor = new $cls['cl0']();
						$dt = new stdClass();
						//----------------------------------------
						$__cuenta = '_norep';//esta linea es requerida
						//----------------------------------------
						$dt->u_email = 'info@vac.net.pe';
						$dt->u_name = 'Informes - Metodología VAC-PHP';
						//----------------------------------------
						$dt->asunto = $asunto;
						//----------------------------------------
						$html = $_cor->contacto($dt,$add);//llamamons al contenido del correo
						//----------------------------------------
						$dt->cuerpo = $html;
						$dt->fecha = $add['created_at'];
						//----------------------------------------
						$r_cor = $_cor->sendMail($ru0, $dt);
						//----------------------------------------
						$_SESSION['mensjEmail'] = $r_cor->inf;
					//----------------------------------------
				}
				$_SESSION['stat'] = $resp->inf;
				//----------------------------------------
				if (isset($_tbl->test) && $_tbl->test==true) {
					$_SESSION['sql'] = $resp->sql;
				}
			}else{
				$data = $_POST; // Cambiar a $_GET si prefieres obtener datos por GET
				// Generar nombre de archivo con marca de tiempo
				$file_name = 'fail/no_enviado_'.date('YmdHis').'.json';
				// Convertir datos a formato JSON
				$json_data = json_encode($data, JSON_PRETTY_PRINT);
				// Escribir en el archivo
				file_put_contents($file_name, $json_data);
				//----------------------------------------
				$_SESSION['stat'] = 'noadd';
				$_SESSION['SMSfalse2'] = 'No se puede enviar, porque ya exedió el límite de consultas por día.';
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