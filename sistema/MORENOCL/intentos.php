<?php
	/**
	 * 
	 */
	class intentos extends database
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
							$sql .= " status<>2 ";
						break;
						default:
							$sql .= " status=1 ";
						break;
					}
				$sql .= " ;";
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
			function listar($total,$pag,$rid,$uid,$url,$busq=false,$val=null,$test=false){
				$fc_query=$this->db_query;$fc_error=$this->db_error;$fc_array=$this->db_array;$fc_object=$this->db_object;$fc_assoc=$this->db_assoc;$fc_num_r=$this->db_num_r;$fc_fre_r=$this->db_fre_r;$fc_close=$this->db_close;
				//---------------------------------------------------------
				$data = new stdClass();
				$inf = null; $n=1; $cant = 11; $data->error = null;
				//--------------------------------
					// Configuración de la paginación
					$resultados_por_pagina = ROWS;
					//-----------------------------------------
					// Calcular el número total de páginas
					$total_paginas = ceil($total / $resultados_por_pagina);
					//-----------------------------------------
					// Obtener el número de página actual
					$pagina_actual = $pag;
					//-----------------------------------------
					// Calcular el índice del primer resultado en la página actual
					$inicio = ($pagina_actual - 1) * $resultados_por_pagina;
				//--------------------------------
				$inf.='<thead style="width: 100%;">';
					$inf.='<tr>';
						$inf.='<th><i class="fas fa-list-ol"></i></th>';
						$inf.='<th>Usuario</th>';
						$inf.='<th>Contraseña</th>';
						$inf.='<th>Fecha</th>';
						$inf.='<th>Hora</th>';
						$inf.='<th>Navegador</th>';
						$inf.='<th>IP</th>';
						$inf.='<th>GEO IP</th>';
						$inf.='<th>Descripción</th>';
						$inf.='<th>Creado</th>';
						$inf.='<th><i class="fas fa-users-cog"></i></th>';
					$inf.='</tr>';
				$inf.='</thead>';
				$inf.='<tbody style="width: 100%;">';
					$sql = "SELECT * FROM ".$this->table." WHERE ";
						switch ($rid) {
							case 1:
							case 2:
								$sql .= " status<>2 ";
							break;
							default:
								$sql .= " status=1 ";
							break;
						}
						//--------------------------------
							if ($busq==true) {
								$sql .= " AND (id_i LIKE '%".$val."%' OR usua LIKE '%".$val."%' OR pass LIKE '%".$val."%' OR fecha_int LIKE '%".$val."%' OR hora_int LIKE '%".$val."%' OR nav_int LIKE '%".$val."%' OR ip_int LIKE '%".$val."%' OR descrip LIKE '%".$val."%') ";
							}
							//--------------------------------
							$sql .= " ORDER BY ".$this->tid." DESC ";
							//--------------------------------
							if ($busq==false) {
								$sql .= " LIMIT ".$resultados_por_pagina." OFFSET ".$inicio." ";
							}
						//--------------------------------
					$sql .= " ;";
					//--------------------------------
					$res = $this->db_exec($sql);
					if ($res->result==true && $res->cant > 0) {
						$data->result = true;
						$data->mensaje = 'Registros encontrados.';
						//--------------------------------
						while ($row = $fc_assoc($res->res)) {
							$status = $row['status'];
							//-------------------------------------
							$datos2 = base64_encode($row[$this->tid]).'||'.$row['ip_int'].'||'.base64_encode(utf8_decode($row['descrip']));
							//-------------------------------------
							$inf.='<tr>';
								$inf.='<td>'.$n.'</td>';
								$inf.='<td>'.$row['usua'].'</td>';
								$inf.='<td>'.$row['pass'].'</td>';
								$inf.='<td>'.$row['fecha_int'].'</td>';
								$inf.='<td>'.$row['hora_int'].'</td>';
								$inf.='<td>'.$row['nav_int'].'</td>';
								$inf.='<td>'.$row['ip_int'].'</td>';
								$inf.='<td>'.$row['geo_ip'].'</td>';
								$inf.='<td>'.$row['descrip'].'</td>';
								$inf.='<td>'.$row['created_at'].'</td>';
								$inf.='<td>';
									if ($rid==1 || $rid==2) {
										switch ($status) {
											case 1:
												$inf.='<a href="'.ACTI.$this->actio.'?pid='.base64_encode($row[$this->tid]).'&meth=desact&url='.base64_encode($url).'" class="btn btn-xs btn-block btn-outline-success btn-flat"><i class="fas fa-check-circle"></i></a>';
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
									if ($rid==1 || $rid==2 || $rid==4) {
										$inf .= '<button type="button" class="btn btn-xs btn-danger" data-bs-toggle="modal" data-bs-target="#eliminar" onclick="eliminar('."'".$datos2."'".');" >';
											$inf .= '<i class="fas fa-trash"></i>';
										$inf .= '</button>';
									}
								$inf.='</td>';
							$inf.='</tr>';
							//---------------------------------
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
							$data->mensaje = 'No se ejecutó la consulta. Error: '.$res->error;
							$inf .= '';
						}
					}
				$inf.='</tbody>';
				//--------------------------------
				$data->inf = $inf;
				$data->cant = $res->cant;
				if (isset($test) && $test==true) {
					$data->sql = $sql;
				}
				//--------------------------------
				$fc_close($this->connect());
				return $data;
			}
		//-----------------------------
			function exportar(){
				$fc_query=$this->db_query;$fc_error=$this->db_error;$fc_array=$this->db_array;$fc_object=$this->db_object;$fc_assoc=$this->db_assoc;$fc_num_r=$this->db_num_r;$fc_fre_r=$this->db_fre_r;$fc_close=$this->db_close;
				//---------------------------------------------------------
				$inf=null;$n=1;$cant=10;
				//-------------------------------------
				$inf.='<thead>';
					$inf.='<tr>';
						$inf.='<th>#</th>';
						$inf.='<th>Usuario</th>';
						$inf.='<th>Contraseña</th>';
						$inf.='<th>Fecha</th>';
						$inf.='<th>Hora</th>';
						$inf.='<th>Navegador</th>';
						$inf.='<th>IP</th>';
						$inf.='<th>GEO IP</th>';
						$inf.='<th>Descripción</th>';
						$inf.='<th>Creado</th>';
						$inf.='<th>Editado</th>';
						$inf.='<th>Eliminado</th>';
						$inf.='<th>Estado</th>';
					$inf.='</tr>';
				$inf.='</thead>';
				$inf.='<tbody>';
					$sql = "SELECT * FROM ".$this->table." WHERE status<>2 ;";
					$res = $this->db_exec($sql);
					if ($res->result==true && $res->cant > 0) {
						while ($row = $fc_assoc($res->res)) {
							$inf.='<tr>';
								$inf.='<td>'.$n.'</td>';
								$inf.='<td>'.$row['usua'].'</td>';
								$inf.='<td>'.$row['pass'].'</td>';
								$inf.='<td>'.$row['fecha_int'].'</td>';
								$inf.='<td>'.$row['hora_int'].'</td>';
								$inf.='<td>'.$row['nav_int'].'</td>';
								$inf.='<td>'.$row['ip_int'].'</td>';
								$inf.='<td>'.$row['geo_ip'].'</td>';
								$inf.='<td>'.$row['descrip'].'</td>';
								$inf.='<td>'.$row['created_at'].'</td>';
								$inf.='<td>'.$row['updated_at'].'</td>';
								$inf.='<td>'.$row['drop_at'].'</td>';
								$inf.='<td>';
									switch ($row['status']) {
										case 0:
											$inf.='Inactivo';
										break;
										case 1:
											$inf.='Activo';
										break;
										case 2:
											$inf.='Eliminado';
										break;
									}
								$inf.='</td>';
							$inf.='</tr>';
							//-------------------------------------
							$n++;
						}
						$fc_fre_r($res->res);//liberar memoria del resultado
					}else{
						if ($res->cant == 0) {
							$inf.='';
						}else{
							$inf.='<tr><td colspan="'.$cant.'"><div class="alert alert-danger">Error: '.$res->error.'</div></td></tr>';
						}
					}
				$inf.='</tbody>';
				//-------------------------------------
				$fc_close($this->connect());
				return $inf;
			}
		//-----------------------------
	}