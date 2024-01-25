<?php
	/**
	 * 
	 */
	class intentos extends DataBase
	{
		private $table='intentos';
		private $actio='intentos.php';
		private $tid = 'id_i';
		//-----------------------------
			function cantidad($rid){
				$fc_query=$this->db_query;$fc_error=$this->db_error;$fc_array=$this->db_array;$fc_object=$this->db_object;$fc_assoc=$this->db_assoc;$fc_num_r=$this->db_num_r;$fc_fre_r=$this->db_fre_r;$fc_close=$this->db_close;
				//---------------------------------------------------------
				$inf = 0;
				//---------------------------------------------------------
				$sql = "SELECT ".$this->tid." FROM ".$this->table." WHERE ";
				switch ($rid) {
					case 1:
					case 2:
					case 4:
					break;
					default:	$sql .= "id_created=".$_SESSION['user_id']." AND ";	break;
				}
				$sql .= " status = 1 ;";
				$res = $this->db_exec($sql,false);
				//--------------------------------
				$inf = $res->cant;
				//--------------------------------
				$fc_close($this->connect());
				return $inf;
			}
			function cant_intentos($ip_cli=null){
				$fc_query=$this->db_query;$fc_error=$this->db_error;$fc_array=$this->db_array;$fc_object=$this->db_object;$fc_assoc=$this->db_assoc;$fc_num_r=$this->db_num_r;$fc_fre_r=$this->db_fre_r;$fc_close=$this->db_close;
				//---------------------------------------------------------
				$inf = 0;
				// Obtener la dirección IP real del visitante cuando se usa CloudFlare
				if (isset($_SERVER['HTTP_CF_CONNECTING_IP'])) {
					$ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
				} elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
					$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
				} else {
					$ip = $_SERVER['REMOTE_ADDR'];
				}
				if ($ip_cli == $ip) {
				}else{
					$ip_cli = $ip;
				}
				//---------------------------------------------------------
				$sql = "SELECT ".$this->tid." FROM ".$this->table." WHERE status=1 AND ip_int LIKE '".$ip_cli."';";
				$res = $this->db_exec($sql,false);
				//--------------------------------
				$inf = $res->cant;
				//--------------------------------
				$fc_close($this->connect());
				return $inf;
			}
		//-----------------------------
			function listar($rid,$uid,$url){
				$fc_query=$this->db_query;$fc_error=$this->db_error;$fc_array=$this->db_array;$fc_object=$this->db_object;$fc_assoc=$this->db_assoc;$fc_num_r=$this->db_num_r;$fc_fre_r=$this->db_fre_r;$fc_close=$this->db_close;
				//---------------------------------------------------------
				$data = new stdClass();
				$inf = null; $n=1; $cant = 11; $data->error = null;
				//---------------------------
				$inf.='<thead>';
					$inf.='<tr>';
						$inf.='<th><i class="fas fa-users-cog"></i></th>';
						$inf.='<th><i class="fas fa-list-ol"></i></th>';
						$inf.='<th><i class="fas fa-id-badge"></i></th>';
						$inf.='<th>Usuario usado</th>';
						$inf.='<th>Contraseña usada</th>';
						$inf.='<th>Día del Intento</th>';
						$inf.='<th>Hora del Intento</th>';
						$inf.='<th>Navegador Usado</th>';
						$inf.='<th>Dirección IP</th>';
						$inf.='<th>Geolocaliación IP</th>';
						$inf.='<th>Estado</th>';
					$inf.='</tr>';
				$inf.='</thead>';
				$inf.='<tbody>';
					$sql="SELECT * FROM ".$this->table." WHERE ";
					switch ($rid) {
						case 1:		$sql .= " status<>2 ";											break;
						case 2:		$sql .= " status<>2 AND usua NOT LIKE '%fmoreno_admin%' ";		break;
						case 4:		$sql .= " status<>2 AND usua NOT LIKE '%fmoreno_admin%' ";		break;
						default:	$sql .= " status=1 AND id_created=".$_SESSION['user_id']." ";	break;
					}
					$sql .= " ORDER BY ".$this->tid." DESC;";
					//--------------------------------
					$res = $this->db_exec($sql);
					if ($res->result==true && $res->cant > 0) {
						$data->result = true;
						$data->mensaje = 'Registros encontrados.';
						//--------------------------------
						while ($row = $fc_assoc($res->res)) {
							$id = $row[$this->tid];
							$status = $row['status'];
							//-----------------------------------------
							$inf.='<tr>';
								$inf.='<td>';
									$inf.='<a href="'.ACTI.$this->actio.'?pid='.base64_encode($row['ip_int']).'&block=bloq&url='.base64_encode($url).'" title="Clic para bloquear IP" class="btn btn-xs btn-danger"><i class="fas fa-lock"></i></a>';
								$inf.='</td>';
								$inf.='<td>'.$n.'</td>';
								$inf.='<td>'.$id.'</td>';
								$inf.='<td>'.$row['usua'].'</td>';
								$inf.='<td>'.$row['pass'].'</td>';
								$inf.='<td>'.$row['fecha_int'].'</td>';
								$inf.='<td>'.$row['hora_int'].'</td>';
								$inf.='<td>'.$row['nav_int'].'</td>';
								$inf.='<td>';
									$inf.=$row['ip_int'];
								$inf.='<td>'.$row['geo_ip'].'</td>';
								$inf.='</td>';
								$inf.='<td>';
									if ($rid==1 || $rid==2 || $rid==4) {
										switch ($status) {
											case 1:
												$inf.='<a href="'.ACTI.$this->actio.'?pid='.base64_encode($row[$this->tid]).'&meth=des&url='.base64_encode($url).'" class="btn btn-xs btn-block btn-outline-success btn-flat"><i class="fas fa-check-circle"></i></a>';
											break;
											case 2:
												$inf.='<a href="'.ACTI.$this->actio.'?pid='.base64_encode($row[$this->tid]).'&meth=act&url='.base64_encode($url).'" class="btn btn-xs btn-block btn-outline-danger btn-flat"><i class="fas fa-times-circle"></i></a>';
											break;
											default:
												$inf.='<a href="'.ACTI.$this->actio.'?pid='.base64_encode($row[$this->tid]).'&meth=act&url='.base64_encode($url).'" class="btn btn-xs btn-block btn-outline-warning btn-flat"><i class="fas fa-ban"></i></a>';
											break;
										}
									}else{
										switch ($status) {
											case 1:
												$inf.='<span class="btn btn-xs btn-block btn-outline-success btn-flat"><i class="fas fa-check-circle"></i></span>';
											break;
											case 2:
												$inf.='<span class="btn btn-xs btn-block btn-outline-danger btn-flat"><i class="fas fa-times-circle"></i></span>';
											break;
											default:
												$inf.='<span class="btn btn-xs btn-block btn-outline-warning btn-flat"><i class="fas fa-ban"></i></span>';
											break;
										}
									}
								$inf.='</td>';
							$inf.='</tr>';
							//-----------------------------------------
							$n++;
						}
						//--------------------------------
						$fc_fre_r($res->res);
					}else{
						if ($res->cant == 0) {
							$data->result = false;
							$data->mensaje = 'No hay registros.';
							$inf .= '';
						}else{
							$data->result = false;
							$data->mensaje = 'No se ejecutó la consulta. Error: '.$data->error;
							$inf .= '';
						}
					}
				$inf .= '</tbody>';
				//--------------------------------
				$data->inf = $inf;
				$data->sql = $sql;
				//--------------------------------
				$fc_close();
				return $data;
			}
		//-----------------------------
	}