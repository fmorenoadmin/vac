<?php
	if(isset($_SESSION)){}else{ session_start(); }
	//-----------------------------------------------
	$rut='../';
	//-----------------------------------------------
	$cls = array(
		"dbs"	=>	'database',
		"seg"	=>	'Seguridad',
		"ses"	=>	'Sesiones',
		"ipb"	=>	'ip_block',
		"cl1"	=>	'usuarios',
		"reg"	=>	'registro',
		"int"	=>	'intentos',
	);
	$di1 = $cls['cl1'].'/';
	//-----------------------------------------------
	$dt = new stdClass();
	$_tbl = new stdClass();
	$_tbl->tname = 'public.'.$cls['cl1'];
	$_tbl->tid = 'id_user';
	$_tbl->pid = 0;
	//-----------------------------------------------
	require_once($rut.'config/constant.php');
	require($rut.$cls['seg'].'.php');
	$_seg = new $cls['seg']();
	//-----------------------------------------------
	// Obtener la dirección IP real del visitante cuando se usa CloudFlare
	if (isset($_SERVER['HTTP_CF_CONNECTING_IP'])) {
		$ip_cli = $_SERVER['HTTP_CF_CONNECTING_IP'];
	} elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ip_cli = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
		$ip_cli = $_SERVER['REMOTE_ADDR'];
	}
	if ($ip_cli == '127.0.0.1') {
		$ip = '181.65.56.161';
	}else{
		$ip=$ip_cli;
	}
	$nav = $_seg->getBrowser($_SERVER['HTTP_USER_AGENT']).' / '.$_seg->getPlatform($_SERVER['HTTP_USER_AGENT']);
	//-----------------------------------------------
	//formato
	$fecha=date('Y-m-d');
	$hora=date('H:i:s');
	$fechayhora=date('Y-m-d H:i:s'); $tall=0; $tall_name='nombre_tall';
	$buscar = array("'", ";", '"', "\'", '\"', ' ', ';', ':');
	//-----------------------------------------------
	function validar($user,$pass){
		$er=1;
		if(is_null($user)){ $er=0; }
		if(is_null($pass)){ $er=0; }
		return $er;
	}
	//-----------------------------------------------
	function getinfoIP($ip){
		$data = null;
		//------------------------------
		$data = file_get_contents("http://ip-api.com/json/".$ip);
		$json = json_decode($data, true);
		//------------------------------
		return $json;
	}
	//-----------------------------------------------
	if (isset($_POST['entrar'])) {
		require($rut.DIRMOR.$cls['dbs'].'.php');
		require($rut.DIRMOR.$cls['ses'].'.php');
		require($rut.DIRMOR.$cls['ipb'].'.php');
		require($rut.DIRMOR.$cls['int'].'.php');
		require($rut.DIRMOR.$cls['reg'].'.php');
		$_dbs = new $cls['dbs']();
		$_s = new $cls['ses']();
		$_ipb = new $cls['ipb']();
		$_int = new $cls['int']();
		$_reg = new $cls['reg']();
		//-----------------------------------------------
		$user = $_dbs->custom_escape_string($_POST['user']);
		$pass = str_replace("'", '´', $_POST['pass']);
		//-----------------------------------------------
		$dt = getinfoIP($ip);
		$geoIP = $dt['city'].'/'.$dt['regionName'].'/'.$dt['country'].' | Lat:'.$dt['lat'].' Long:'.$dt['lon'].' <a href="https://www.google.com/maps/@'.$dt['lat'].','.$dt['lon'].',21z" target="_blank"><i class="fas fa-eye"></i></a>';
		//-----------------------------------------------
		$num = $_ipb->verifIP($ip);
		if ($num >= 1) {
			$_s->setERROR("bloqued");
			header("Location: ".$rut."error/");
			exit();
		}else{
			$cant_int=$_int->cant_intentos($ip);
			//---------------------------------------
			if ($ip == '190.116.0.98' || $ip == '190.116.0.107') {
				$local = 3;
			}else{
				$local = 3;
			}
			//---------------------------------------
			if ($cant_int >= 0 && $cant_int < $local) {
				if (validar($user,$pass)==1) {
					$sql = "SELECT u.*, tu.nombre_t FROM usuarios u INNER JOIN tipos_usuarios tu ON u.id_tipo=tu.id_tipo WHERE (u.usuario_u LIKE '".$user."' OR u.correo_u LIKE '".$user."') LIMIT 1;";
					//---------------------------------------
						switch (DB_TYPE) {
							case 'mysqli_':
								$result = mysqli_query($_dbs->connect(SCHU),$sql) OR $_SESSION['Mysqli_Error'] = mysqli_error($_dbs->connect(SCHU));
								$r_cant = $result->num_rows;
								$assoc = 'mysqli_fetch_assoc';
							break;
							case 'pg_':
								$result = pg_query($_dbs->connect(SCHU),$sql) OR $_SESSION['Mysqli_Error'] = pg_last_error($_dbs->connect(SCHU));
								$r_cant = pg_num_rows($result);
								$assoc = 'pg_fetch_assoc';
							break;
							default:
								$result = sqlsrv_query($_dbs->connect(SCHU),$sql) OR $_SESSION['Mysqli_Error'] = sqlsrv_last_error($_dbs->connect(SCHU));
								$r_cant = sqlsrv_num_rows($result);
								$assoc = 'sqlsrv_fetch_assoc';
							break;
						}
					//---------------------------------------
					if ($result) {
						if($r_cant > 0){
							while ($row = $assoc($result)) {
								$id_user = $row['id_user'];
								$id_tipo = $row['id_tipo'];
								$nombre_tipo = $row['nombre_t'];
								$nombre_comp = $row['nombres_u'].' '.$row['apellidos_u'];
								$nombres_u = $row['nombres_u'];
								$apellidos_u = $row['apellidos_u'];
								$usuario_u = $row['usuario_u'];
								$correo_u = $row['correo_u'];
								$contrasenia = $row['contrasenia_u'];
								$telefono_u = $row['telefono_u'];
								$estado = $row['status'];
								$foto_u = $row['foto_u']; if (is_null($foto_u)) { $foto_u="user.png"; }
								$nomb = $nombre_comp;//si es cliente razon social
							}
							//-----------------------------------------------
							$n_user = str_replace($buscar, '', $usuario_u);
							$a_name = $n_user.'_'.date('YmdHis').'_'.$ip;
							//-----------------------------------------------
							setcookie('a_name', $a_name, time() + (86400 * 30), "/"); // 86400 = 1 day 259200 - 3 day
							//-----------------------------------------------
							if($estado==1){
								if (password_verify($pass, $contrasenia)) {
									//-----------------------------------------------
									$_s->setUID(
										$id_user,
										$id_tipo,
										$nombre_tipo,
										$nombre_comp,
										$nombres_u,
										$apellidos_u,
										$usuario_u,
										$correo_u,
										$telefono_u,
										$foto_u
									);
									//-----------------------------------------------
									if ($id_user > 0) {
										$_json = new stdClass();
										//-----------------------------------------------
										$_json->tname = $cls['reg'];
										$_json->tid = 'id_r';
										$_json->pid = 0;
										$_json->success = 'add';
										$_json->danger = 'no'.$_json->success;
										//-----------------------------------------------
										$_reg = array(
											"id_user"	=>	$id_user,
											"fecha_ing"	=>	$fecha,
											"hora_ing"	=>	$hora,
											"nav_ing"	=>	$nav,
											"ip_ing"	=>	$ip,
											"geo_ip"	=>	$geoIP,
										);
										//-----------------------------------------------
										$result1 = $_dbs->db_add($_reg,$_json);
										if ($result1->result) {
											$_SESSION['error']="insertado";
											//-----------------------------------------------
											header("Location: ".HOME);
											exit();
										}else{
											$_SESSION['error']="error ".error_reporting(E_ALL);
											//-----------------------------------------------
											header('Location: ../');
											exit();
										}  
									}else{
										header('Location: ../');
										exit();
									}
								}else{
									$_json = new stdClass();
									//-----------------------------------------------
									$_json->tname = $cls['int'];
									$_json->tid = 'id_i';
									$_json->pid = 0;
									$_json->success = 'add';
									$_json->danger = 'no'.$_json->success;
									//-----------------------------------------------
									$_reg = array(
										"usua"	=>	$user.((isset($_COOKIE['a_name'])) ? ' - '.$_COOKIE['a_name'] : NULL),
										"pass"	=>	$pass,
										"fecha_int"	=>	$fecha,
										"hora_int"	=>	$hora,
										"nav_int"	=>	$nav,
										"ip_int"	=>	$ip,
										"geo_ip"	=>	$geoIP,
										"descrip"	=>	"La contraseña es incorecta.",
									);
									//-----------------------------------------------
									$_dbs->db_add($_reg,$_json);
									//-----------------------------------------------
									$_s->setERROR(2);
									//-----------------------------------------------
									header("Location: ../");
									exit();
								}
							}else{
								$_json = new stdClass();
								//-----------------------------------------------
								$_json->tname = $cls['int'];
								$_json->tid = 'id_i';
								$_json->pid = 0;
								$_json->success = 'add';
								$_json->danger = 'no'.$_json->success;
								//-----------------------------------------------
								$_reg = array(
									"usua"	=>	$user.((isset($_COOKIE['a_name'])) ? ' - '.$_COOKIE['a_name'] : NULL),
									"pass"	=>	$pass,
									"fecha_int"	=>	$fecha,
									"hora_int"	=>	$hora,
									"nav_int"	=>	$nav,
									"ip_int"	=>	$ip,
									"geo_ip"	=>	$geoIP,
									"descrip"	=>	"El usuario está suspendido.",
								);
								//-----------------------------------------------
								$_dbs->db_add($_reg,$_json);
								//-----------------------------------------------
								$_s->setERROR(3);
								//-----------------------------------------------
								header("Location: ../");
								exit();
							}
						}else{
							$_json = new stdClass();
							//-----------------------------------------------
							$_json->tname = $cls['int'];
							$_json->tid = 'id_i';
							$_json->pid = 0;
							$_json->success = 'add';
							$_json->danger = 'no'.$_json->success;
							//-----------------------------------------------
							$_reg = array(
								"usua"	=>	$user.((isset($_COOKIE['a_name'])) ? ' - '.$_COOKIE['a_name'] : NULL),
								"pass"	=>	$pass,
								"fecha_int"	=>	$fecha,
								"hora_int"	=>	$hora,
								"nav_int"	=>	$nav,
								"ip_int"	=>	$ip,
								"geo_ip"	=>	$geoIP,
								"descrip"	=>	"No se encontró al usuario.",
							);
							//-----------------------------------------------
							$_dbs->db_add($_reg,$_json);
							//-----------------------------------------------
							$_s->setERROR(4);
							header("Location: ../");
							//-----------------------------------------------
							exit();
						}
					}else{
						$_json = new stdClass();
						//-----------------------------------------------
						$_json->tname = $cls['int'];
						$_json->tid = 'id_i';
						$_json->pid = 0;
						$_json->success = 'add';
						$_json->danger = 'no'.$_json->success;
						//-----------------------------------------------
						$_reg = array(
							"usua"	=>	$user.((isset($_COOKIE['a_name'])) ? ' - '.$_COOKIE['a_name'] : NULL),
							"pass"	=>	$pass,
							"fecha_int"	=>	$fecha,
							"hora_int"	=>	$hora,
							"nav_int"	=>	$nav,
							"ip_int"	=>	$ip,
							"geo_ip"	=>	$geoIP,
							"descrip"	=>	"No se ejecutó la consulta.",
						);
						//-----------------------------------------------
						$_dbs->db_add($_reg,$_json);
						//-----------------------------------------------
						$_s->setERROR(5);
						//-----------------------------------------------
						header('Location: ../');
						exit();
					}
				}else{
					$_json = new stdClass();
					//-----------------------------------------------
					$_json->tname = $cls['int'];
					$_json->tid = 'id_i';
					$_json->pid = 0;
					$_json->success = 'add';
					$_json->danger = 'no'.$_json->success;
					//-----------------------------------------------
					$_reg = array(
						"usua"	=>	$user.((isset($_COOKIE['a_name'])) ? ' - '.$_COOKIE['a_name'] : NULL),
						"pass"	=>	$pass,
						"fecha_int"	=>	$fecha,
						"hora_int"	=>	$hora,
						"nav_int"	=>	$nav,
						"ip_int"	=>	$ip,
						"geo_ip"	=>	$geoIP,
						"descrip"	=>	"Uno de los campos está vacío.",
					);
					//-----------------------------------------------
					$_dbs->db_add($_reg,$_json);
					//-----------------------------------------------
					$_s->setERROR(6);
					//-----------------------------------------------
					header('Location: ../');
					exit();
				}
			}else{
				$detalle="Intentos maximos por el usuario: ".$user.((isset($_COOKIE['a_name'])) ? ' - '.$_COOKIE['a_name'] : NULL)." y la contraseña: ".$pass.", desde: ".$nav.". Se bloqueò la IP.";
				$_json = new stdClass();
				//-----------------------------------------------
				$_json->tname = $cls['ipb'];
				$_json->tid = 'id_ipb';
				$_json->pid = 0;
				$_json->success = 'add';
				$_json->danger = 'no'.$_json->success;
				//-----------------------------------------------
				$_reg = array(
					"ip"	=>	$ip,
					"motivo"	=>	$detalle,
				);
				//-----------------------------------------------
				$_dbs->db_add($_reg,$_json);
				//-----------------------------------------------
				$_s->setERROR('MaxIntforUser');
				header("Location: ../error/");
				exit();
			}
		}
	}else{
		include_once($rut.'error/401.shtml');
	}