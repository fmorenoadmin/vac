<?php
	/**
	 * 
	 */
	class usuarios extends database
	{
		private $table	='usuarios';
		private $table0	='';
		private $table1	='tipos_usuarios';
		private $table2	='';
		private $actio	='usuarios.php';
		private $detail	='detalle/?p=';
		private $tid	="id_user";
		private $tid1	="id_tipo";
		private $tid2	="";
		//----------------------------------
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
		//----------------------------------
			function dtl($campo){
				$fc_query=$this->db_query;$fc_error=$this->db_error;$fc_array=$this->db_array;$fc_object=$this->db_object;$fc_assoc=$this->db_assoc;$fc_num_r=$this->db_num_r;$fc_fre_r=$this->db_fre_r;$fc_close=$this->db_close;
				//---------------------------------------------------------
				$inf=null;
				//---------------------------------------------------------
				$sql="SELECT ".$campo." FROM ".$this->table." WHERE ";
					switch ($rid) {
						case 1:
						case 2:
							$sql .= " status<>2 ";
						break;
						default:
							$sql .= " status=1 ";
						break;
					}
				$sql .= " ORDER BY ".$campo." ASC ;";
				$res = $this->db_exec($sql);
				if ($res->result==true && $res->cant > 0) {
					while ($row = $fc_assoc($res->res)){
						$inf.='<option value="'.$row[$campo].'" />';
					}
					//--------------------------------
					$fc_fre_r($res->res);
				}else{
					$inf.='<option value="No se ejecutó la consulta. Error: '.$res->error.'">';
				}
				//--------------------------------
				$fc_close($this->connect());
				return $inf;
			}
			function cbo($rid){
				$fc_query=$this->db_query;$fc_error=$this->db_error;$fc_array=$this->db_array;$fc_object=$this->db_object;$fc_assoc=$this->db_assoc;$fc_num_r=$this->db_num_r;$fc_fre_r=$this->db_fre_r;$fc_close=$this->db_close;
				//---------------------------------------------------------
				$inf="";
				//--------------------------------
				$inf.='<option value="'.base64_encode(0).'">Seleccione al Cliente/Proveedor:</option>';
				//--------------------------------
				$sql = "SELECT * FROM ".$this->table1." WHERE status=1 ;";
				//--------------------------------
				$res = $this->db_exec($sql);
				if ($res->result==true && $res->cant > 0) {
					while ($row = $fc_assoc($res->res)){
						$inf .= '<option value="'.base64_encode($row[$this->tid]).'">'.$row['nombre_tipo'].' - '.$row['id_int'].' - '.$row['nombre_comp'].'</option>';
					}
					//--------------------------------
					$fc_fre_r($res->res);
				}else{
					$inf .= '<option value="'.base64_encode(0).'">No se obtivo la información. Error: '.$res->error.'</option>';
				}
				//--------------------------------
				$fc_close($this->connect());
				return $inf;
			}
		//----------------------------------
			function listar($total,$pag,$rid,$uid,$url,$busq=false,$val=null,$test=false){
				$fc_query=$this->db_query;$fc_error=$this->db_error;$fc_array=$this->db_array;$fc_object=$this->db_object;$fc_assoc=$this->db_assoc;$fc_num_r=$this->db_num_r;$fc_fre_r=$this->db_fre_r;$fc_close=$this->db_close;
				//---------------------------------------------------------
				$data = new stdClass();
				$inf = null; $n=1; $cant = 10; $data->error = null;
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
						$inf.='<th>Foto</th>';
						$inf.='<th>Tipo de Usuario</th>';
						$inf.='<th>Nombre</th>';
						$inf.='<th>Correo</th>';
						$inf.='<th>Usuario</th>';
						$inf.='<th>Teléfono</th>';
						$inf.='<th>Creado</th>';
						$inf.='<th><i class="fas fa-users-cog"></i></th>';
					$inf.='</tr>';
				$inf.='</thead>';
				$inf.='<tbody style="width: 100%;">';
					$sql = "SELECT u.*, CONCAT(u.nombres_u, ' ', u.apellidos_u) AS nombre_comp, tu.nombre_t FROM ".$this->table." u INNER JOIN ".$this->table1." tu ON u.".$this->tid1."=tu.".$this->tid1." WHERE ";
						switch ($rid) {
							case 1:
							case 2:
								$sql .= " u.status<>2 ";
							break;
							default:
								$sql .= " u.status=1 ";
							break;
						}
						//--------------------------------
							if ($busq==true) {
								$sql .= " AND (u.id_user LIKE '%".$val."%' OR CONCAT(u.nombres_u, ' ', u.apellidos_u) LIKE '%".$val."%' OR tu.nombre_t LIKE '%".$val."%' OR u.telefono_u LIKE '%".$val."%' OR u.correo_u LIKE '%".$val."%' OR u.usuario_u LIKE '%".$val."%') ";
							}
							//--------------------------------
							$sql .= " ORDER BY u.".$this->tid." DESC ";
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
							$datos2 = base64_encode($row[$this->tid]).'||'.base64_encode(utf8_decode($row['nombre_comp']));
							//-------------------------------------
							$inf.='<tr>';
								$inf.='<td>'.$n.'</td>';
								$inf.='<td>'.$row[$this->tid].'</td>';
								$inf.='<td>';
									if (strlen($row['foto_u']) > 5) {
										$inf.='<img style="max-width: 100px; max-height: 100px;" src="'.IMG.'usuarios/'.$row['foto_u'].'" />';
									}else{
										$inf.='No imagen';
									}
								$inf.='</td>';
								$inf.='<td>'.$row['nombre_t'].'</td>';
								$inf.='<td>'.$row['nombre_comp'].'</td>';
								$inf.='<td>'.$row['correo_u'].'</td>';
								$inf.='<td>'.$row['usuario_u'].'</td>';
								$inf.='<td><a href="https://wa.me/'.$row['telefono_u'].'" target="_blank">'.$row['telefono_u'].'</a></td>';
								$inf.='<td>'.$row['created_at'].'</td>';
								$inf.='<td>';
									$inf .= '<a href="'.$this->detail.base64_encode($row[$this->tid]).'" target="_blank" class="btn btn-xs btn-warning" >';
										$inf .= '<i class="fa fa-edit" ></i>';
									$inf .= '</a> ';
									if ($rid==1 || $rid==2 || $rid==4) {
										switch ($status) {
											case 1:
												$inf.='<a href="'.ACTI.$this->actio.'?pid='.base64_encode($row[$this->tid]).'&meth=des&url='.base64_encode($url).'" class="btn btn-xs btn-block btn-outline-success btn-flat"><i class="fas fa-check-circle"></i></a> ';
											break;
											case 2:
												$inf.='<a href="'.ACTI.$this->actio.'?pid='.base64_encode($row[$this->tid]).'&meth=act&url='.base64_encode($url).'" class="btn btn-xs btn-block btn-outline-danger btn-flat"><i class="fas fa-times-circle"></i></a> ';
											break;
											default:
												$inf.='<a href="'.ACTI.$this->actio.'?pid='.base64_encode($row[$this->tid]).'&meth=act&url='.base64_encode($url).'" class="btn btn-xs btn-block btn-outline-warning btn-flat"><i class="fas fa-ban"></i></a> ';
											break;
										}
									}else{
										switch ($status) {
											case 1:
												$inf.='<span class="btn btn-xs btn-block btn-outline-success btn-flat"><i class="fas fa-check-circle"></i></span> ';
											break;
											case 2:
												$inf.='<span class="btn btn-xs btn-block btn-outline-danger btn-flat"><i class="fas fa-times-circle"></i></span> ';
											break;
											default:
												$inf.='<span class="btn btn-xs btn-block btn-outline-warning btn-flat"><i class="fas fa-ban"></i></span> ';
											break;
										}
									}
									if ($rid==1 || $rid==2) {
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
		//---------------------------------------
			function exportar($tip){
				$fc_query=$this->db_query;$fc_error=$this->db_error;$fc_array=$this->db_array;$fc_object=$this->db_object;$fc_assoc=$this->db_assoc;$fc_num_r=$this->db_num_r;$fc_fre_r=$this->db_fre_r;$fc_close=$this->db_close;
				//---------------------------------------------------------
				$inf=null;$n=1;$cant=10;
				//-------------------------------------
				$inf.='<thead>';
					$inf.='<tr>';
						$inf.='<th>#</th>';
						$inf.='<th>Foto</th>';
						$inf.='<th>Tipo de Usuario</th>';
						$inf.='<th>Nombre</th>';
						$inf.='<th>Correo</th>';
						$inf.='<th>Usuario</th>';
						$inf.='<th>Teléfono</th>';
						$inf.='<th>Creado</th>';
						$inf.='<th>Editado</th>';
						$inf.='<th>Eliminado</th>';
						$inf.='<th>Estado</th>';
						$inf.='<th>Imagen</th>';
					$inf.='</tr>';
				$inf.='</thead>';
				$inf.='<tbody>';
					$sql = "SELECT u.*, CONCAT(u.nombres_u, ' ', u.apellidos_u) AS nombre_comp, tu.nombre_t FROM ".$this->table." u INNER JOIN ".$this->table1." tu ON u.".$this->tid1."=tu.".$this->tid1." WHERE u.status=1 ;";
					$res = $this->db_exec($sql);
					if ($res->result==true && $res->cant > 0) {
						while ($row = $fc_assoc($res->res)) {
							$inf.='<tr>';
								$inf.='<td>'.$n.'</td>';
								$inf.='<td>';
									if (strlen($row['foto_u']) > 5) {
										if ($tip==1) {
											$inf.='<img style="max-width: 100px; max-height: 100px;" src="'.IMG.'usuarios/'.$row['foto_u'].'" />';
										}else{
											$imagenPath = __DIRIMG__ . 'usuarios/' . $row['foto_u'];
											$extension = pathinfo($imagenPath, PATHINFO_EXTENSION);
											//-------------------------------------
											if (in_array($extension, ['svg'])) {
												// Cargar imagen SVG
												$svg = file_get_contents($imagenPath);
												$inf .= '<img src="data:image/svg+xml;base64,' . base64_encode($svg) . '" style="max-width: 100px; max-height: 100px;" />';
											} elseif (in_array($extension, ['png', 'jpg', 'jpeg'])) {
												// Cargar imagen PNG o JPG y codificar en base64
												$imagenData = file_get_contents($imagenPath);
												$imagenBase64 = 'data:image/' . $extension . ';base64,' . base64_encode($imagenData);
												$inf .= '<img src="' . $imagenBase64 . '" style="max-width: 100px; max-height: 100px;" />';
											} else {
												// Manejar otros tipos de archivo o extensiones aquí
												$inf .= 'Tipo de archivo no compatible';
											}
											//$inf.='<img style="max-width: 100px; max-height: 100px;" src="'.__DIRIMG__.'cursos/'.$row['foto_u'].'" />';
										}
									}else{
										$inf.='No imagen';
									}
								$inf.='</td>';
								$inf.='<td>'.$row['nombre_t'].'</td>';
								$inf.='<td>'.$row['nombre_comp'].'</td>';
								$inf.='<td>'.$row['correo_u'].'</td>';
								$inf.='<td>'.$row['usuario_u'].'</td>';
								$inf.='<td><a href="https://wa.me/'.$row['telefono_u'].'" target="_blank">'.$row['telefono_u'].'</a></td>';
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
		//---------------------------------------
	}