<?php
	/**
	 * 
	 */
	class registro extends database
	{
		private $table='registro';
		private $table2='usuarios';
		private $table3='tipos_usuarios';
		private $actio	='registro.php';
		private $tid	='id_r';
		private $tid2	='id_user';
		private $tid3	='id_tipo';
		//-----------------------------------
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
		//-----------------------------------
			function listar($total,$pag,$rid,$uid,$url,$busq=false,$val=null,$test=false){
				$fc_query=$this->db_query;$fc_error=$this->db_error;$fc_array=$this->db_array;$fc_object=$this->db_object;$fc_assoc=$this->db_assoc;$fc_num_r=$this->db_num_r;$fc_fre_r=$this->db_fre_r;$fc_close=$this->db_close;
				//---------------------------------------------------------
				$data = new stdClass();
				$inf = null; $n=1; $cant = 8; $data->error = null;
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
						$inf.='<th><i class="fas fa-id-badge"></i></th>';
						$inf.='<th>Nombre de Usuarios</th>';
						$inf.='<th>Fecha de Ingreso</th>';
						$inf.='<th>Hora de Ingreso</th>';
						$inf.='<th>Navegador Usado</th>';
						$inf.='<th>Dirección IP</th>';
						$inf.='<th>Estado</th>';
					$inf.='</tr>';
				$inf.='</thead>';
				$inf.='<tbody style="width: 100%;">';
					$sql = "SELECT r.*, CONCAT(u.nombres_u, ' ', u.apellidos_u) AS nombre_comp, u.id_tipo FROM ".$this->table." r INNER JOIN ".$this->table2." u ON r.".$this->tid2."=u.".$this->tid2." WHERE ";
						switch ($rid) {
							case 1:
							case 2:
								$sql .= " r.status<>2 ";
							break;
							default:
								$sql .= " r.status=1 ";
							break;
						}
						//--------------------------------
							if ($busq==true) {
								$sql .= " AND (id_r LIKE '%".$val."%' OR CONCAT(u.nombres_u, ' ', u.apellidos_u) LIKE '%".$val."%' OR fecha_ing LIKE '%".$val."%' OR hora_ing LIKE '%".$val."%' OR ip_ing LIKE '%".$val."%' OR geo_ip LIKE '%".$val."%') ";
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
							$datos2 = base64_encode($row[$this->tid]).'||'.$row['ip_ing'].'||'.base64_encode(utf8_decode($row['nombre_comp']));
							//-------------------------------------
							$inf.='<tr>';
								$inf.='<td>'.$n.'</td>';
								$inf.='<td>'.$row[$this->tid].'</td>';
								$inf.='<td>'.$row['nombre_comp'].'</td>';
								$inf.='<td>'.$row['fecha_ing'].'</td>';
								$inf.='<td>'.$row['hora_ing'].'</td>';
								$inf.='<td>'.$row['nav_ing'].'</td>';
								$inf.='<td>';
									$inf.=$row['ip_ing'].' - '.str_replace(',13z', ',21z', $row['geo_ip']);
								$inf.='</td>';
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
			function miregistro($rid,$uid){
				$fc_query=$this->db_query;$fc_error=$this->db_error;$fc_array=$this->db_array;$fc_object=$this->db_object;$fc_assoc=$this->db_assoc;$fc_num_r=$this->db_num_r;$fc_fre_r=$this->db_fre_r;$fc_close=$this->db_close;
				//---------------------------------------------------------
				$data = new stdClass();
				$inf = null; $n=1; $cant = 7; $data->error = null;
				//-----------------------------
				$inf.='<thead>';
					$inf.='<tr>';
						$inf.='<th>N°</th>';
						$inf.='<th>ID</th>';
						$inf.='<th>Nombre de Usuarios</th>';
						$inf.='<th>Fecha de Ingreso</th>';
						$inf.='<th>Hora de Ingreso</th>';
						$inf.='<th>Navegador Usado</th>';
						$inf.='<th>Dirección IP</th>';
					$inf.='</tr>';
				$inf.='</thead>';
				//-----------------------------------
				$inf.='<tbody>';
					$sql="SELECT r.*, CONCAT(u.nombres_u, ' ', u.apellidos_u) AS nombre_comp, u.id_tipo FROM ".$this->table." r INNER JOIN ".$this->table2." u ON r.".$this->tid1."=u.".$this->tid1." WHERE r.".$this->tid2."=".$uid." AND r.status=1 ORDER BY r.id DESC;";
					//--------------------------------
					$res = $this->db_exec($sql);
					if ($res->result==true && $res->cant > 0) {
						$data->result = true;
						$data->mensaje = 'Registros encontrados.';
						//--------------------------------
						while ($row = $fc_assoc($res->res)) {
							$inf.='<tr>';
								$inf.='<td>'.$n.'</td>';
								$inf.='<td>'.$row[$this->tid].'</td>';
								$inf.='<td>'.$row['nombres_user'].'</td>';
								$inf.='<td>'.$row['fecha_ing'].'</td>';
								$inf.='<td>'.$row['hora_ing'].'</td>';
								$inf.='<td>'.$row['nav_ing'].'</td>';
								$inf.='<td>';
									$inf.=$row['ip_ing'].' - '.str_replace(',13z', ',21z', $row['geo_ip']);
								$inf.='</td>';
							$inf.='</tr>';
							//-----------------------------------
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
				$fc_close($this->connect());
				return $data;
			}
			function listarMR($schu,$uid){
				$fc_query=$this->db_query;$fc_error=$this->db_error;$fc_array=$this->db_array;$fc_object=$this->db_object;$fc_assoc=$this->db_assoc;$fc_num_r=$this->db_num_r;$fc_fre_r=$this->db_fre_r;$fc_close=$this->db_close;
				//---------------------------------------------------------
				$data = new stdClass();
				$inf = null; $n=1; $cant = 7; $data->error = null;
				//-----------------------------
				$sql="SELECT fecha_ing FROM ".$this->table." WHERE id_user=".$uid." GROUP BY fecha_ing ORDER BY fecha_ing DESC ;";
				//--------------------------------
				$res = $this->db_exec($sql);
				if ($res->result==true && $res->cant > 0) {
					$data->result = true;
					$data->mensaje = 'Registros encontrados.';
					//--------------------------------
					while ($row = $fc_assoc($res->res)) {
						$fecha = $row['fecha_ing'];
						//--------------------------------
						$inf .= '<div class="time-label">';
							$inf .= '<span class="bg-danger">'.$fecha.'</span>';
						$inf .= '</div>';
						//-----------------------------------
		 				$sql1 = "SELECT r.ip_ing, r.nav_ing, r.fecha_ing, r.hora_ing, r.geo_ip FROM ".$this->table." r INNER JOIN ".$this->table2." u on r.id_user=u.id_user WHERE r.id_user=".$uid." AND r.fecha_ing = '".$fecha."' ORDER BY r.id DESC ;";
		 				$res1 = $this->db_exec($sql1);
		 				if ($res1->result==true && $res1->cant > 0) {
			 				while ($vec = $fc_assoc($res1->res)) {
								$inf .= '<div>';
									$inf .= '<i class="fas fa-sign-in-alt bg-primary"></i>';
									$inf .= '<div class="timeline-item">';
										$inf .= '<span class="time"><i class="fas fa-clock"></i> '.$vec['hora_ing'].'</span>';
										$inf .= '<h3 class="timeline-header"><a href="#">Ingresate al sistema</a> </h3>';
										$inf .= '<div class="timeline-body">';
											$inf .= 'Accediste al Sistema desde: '.$vec['nav_ing'].'. Con dirección IP: '.$vec['ip_ing'].' - '.$vec['geo_ip'];
										$inf .= '</div>';
									$inf .= '</div>';
								$inf .= '</div>';
			 				}
							//--------------------------------
							$fc_fre_r($res1->res);
		 				}
					}
					//--------------------------------
					$fc_fre_r($res->res);
				}else{
					$inf .= '<div class="time-label">';
						$inf .= '<span class="bg-danger">'.date('Y-m-d').'</span>';
					$inf .= '</div>';
					$inf .= '<div>';
						$inf .= '<i class="fas fa-sign-in-alt bg-primary"></i>';
						$inf .= '<div class="timeline-item">';
							$inf .= '<span class="time"><i class="fas fa-clock"></i> '.date('H:i:s').'</span>';
							$inf .= '<h3 class="timeline-header"><a href="#">No se encontró información. Error: '.$res->error.'</a> </h3>';
						 	$inf .= '<div class="timeline-body">';
								$inf .= 'Lo sentimos no hay información en este lugar para mostrar';
							$inf .= '</div>';
					 	$inf .= '</div>';
					$inf .= '</div>';
				}
				$inf .= '<div>';
					$inf .= '<i class="fas fa-clock bg-gray"></i>';
				$inf .= '</div>';
				//--------------------------------
				$data->inf = $inf;
				$data->sql = $sql;
				//--------------------------------
				$fc_close($this->connect());
				return $data;
			}
		//-----------------------------------
			function exportar(){
				$fc_query=$this->db_query;$fc_error=$this->db_error;$fc_array=$this->db_array;$fc_object=$this->db_object;$fc_assoc=$this->db_assoc;$fc_num_r=$this->db_num_r;$fc_fre_r=$this->db_fre_r;$fc_close=$this->db_close;
				//---------------------------------------------------------
				$inf=null;$n=1;$cant=10;
				//-------------------------------------
				$inf.='<thead>';
					$inf.='<tr>';
						$inf.='<th>#</th>';
						$inf.='<th>Nombre de Usuarios</th>';
						$inf.='<th>Fecha de Ingreso</th>';
						$inf.='<th>Hora de Ingreso</th>';
						$inf.='<th>Navegador Usado</th>';
						$inf.='<th>Dirección IP</th>';
						$inf.='<th>Creado</th>';
						$inf.='<th>Editado</th>';
						$inf.='<th>Eliminado</th>';
						$inf.='<th>Estado</th>';
					$inf.='</tr>';
				$inf.='</thead>';
				$inf.='<tbody>';
					$sql = "SELECT r.*, CONCAT(u.nombres_u, ' ', u.apellidos_u) AS nombre_comp, u.id_tipo FROM ".$this->table." r INNER JOIN ".$this->table2." u ON r.".$this->tid2."=u.".$this->tid2." WHERE r.status=1 ;";
					$res = $this->db_exec($sql);
					if ($res->result==true && $res->cant > 0) {
						while ($row = $fc_assoc($res->res)) {
							$inf.='<tr>';
								$inf.='<th>'.$n.'</th>';
								$inf.='<td>'.$row['nombre_comp'].'</td>';
								$inf.='<td>'.$row['fecha_ing'].'</td>';
								$inf.='<td>'.$row['hora_ing'].'</td>';
								$inf.='<td>'.$row['nav_ing'].'</td>';
								$inf.='<td>';
									$inf.=$row['ip_ing'].' - '.str_replace(',13z', ',21z', $row['geo_ip']);
								$inf.='</td>';
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
		//-----------------------------------
	}