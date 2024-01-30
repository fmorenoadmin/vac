<?php
	/**
	 * 
	 */
	class cursos extends database
	{
		private $table ='cursos';
		private $action='cursos.php?meth=';
		private $detail='detalle/?p=';
		private $tid= 'id';
		//---------------------------------------
			function cantidad($rid){//DEVUELVE LA CANTIDAD DE REGISTRO QUE HAY EN LA TABLA
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
			function listar($total,$pag,$rid,$uid,$url,$busq=null,$val=null,$test=false){//DEVUELVE EL CUERPO HTML A LA ACCION
				$fc_query=$this->db_query;$fc_error=$this->db_error;$fc_array=$this->db_array;$fc_object=$this->db_object;$fc_assoc=$this->db_assoc;$fc_num_r=$this->db_num_r;$fc_fre_r=$this->db_fre_r;$fc_close=$this->db_close;
				//---------------------------------------------------------
				$data = new stdClass();
				$inf = null; $n=1; $cant = 6; $data->error = null;
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
				$inf.='<thead>';
					$inf.='<tr>';
						$inf.='<th>#</th>';
						$inf.='<th>Imagen</th>';
						$inf.='<th>Nombre</th>';
						$inf.='<th>Descripción</th>';
						$inf.='<th>Creado</th>';
						$inf.='<th>Gestión</th>';
					$inf.='</tr>';
				$inf.='</thead>';
				$inf.='<tbody>';
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
								$sql .= " AND (id LIKE '%".$val."%' OR nombre LIKE '%".$val."%' OR descrip LIKE '%".$val."%' OR imagen LIKE '%".$val."%') ";
							}
							//--------------------------------
							$sql .= " ORDER BY ".$this->tid." DESC ";
							//--------------------------------
							if ($busq==false) {
								$sql .= " LIMIT ".$resultados_por_pagina." OFFSET ".$inicio." ";
							}
						//--------------------------------
					$sql .= " ;";
					$res = $this->db_exec($sql);
					if ($res->result==true && $res->cant > 0) {
						while ($row = $fc_assoc($res->res)) {
							$inf.='<tr>';
								$inf.='<td scope="row">'.$n.'</td>';
								$inf.='<td>';
									if (strlen($row['imagen']) > 5) {
										$inf.='<img style="max-width: 100px; max-height: 100px;" src="'.IMG.'cursos/'.$row['imagen'].'" />';
									}else{
										$inf.='No imagen';
									}
								$inf.='</td>';
								$inf.='<td>'.$row['nombre'].'</td>';
								$inf.='<td>'.$row['descrip'].'</td>';
								$inf.='<td>'.$row['created_at'].'</td>';
								$inf.='<td>';
									$inf.='<a href="'.$this->detail.base64_encode($row[$this->tid]).'" class="btn btn-outline-warning" title="Editar">';
										$inf.='<i class="fa fa-edit"></i>';
									$inf.='</a>';
									switch ($row['status']) {
										case 0:
											$inf.='<a href="'.ACTI.$this->action.'act&pid='.base64_encode($row[$this->tid]).'&url='.base64_encode($url).'" class="btn btn-outline-warning" title="Clic para Activar">';
												$inf.='<i class="fa fa-ban"></i>';
											$inf.='</a>';
										break;
										case 1:
											$inf.='<a href="'.ACTI.$this->action.'desact&pid='.base64_encode($row[$this->tid]).'&url='.base64_encode($url).'" class="btn btn-outline-success" title="Clic para Desactivar">';
												$inf.='<i class="fa fa-check"></i>';
											$inf.='</a>';
										break;
										default:
											$inf.='<a href="'.ACTI.$this->action.'act&pid='.base64_encode($row[$this->tid]).'&url='.base64_encode($url).'" class="btn btn-outline-danger" title="Clic para Activar">';
												$inf.='<i class="fa fa-times"></i>';
											$inf.='</a>';
										break;
									}
									$inf.='<button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#eliminar" onclick="eliminar('."'".base64_encode($row[$this->tid])."||".base64_encode(utf8_encode($row['nombre']))."||'".');"><i class="fa fa-trash"></i></button>';
								$inf.='</td>';
							$inf.='</tr>';
							//----------------------------------
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
			function cliente(){
				$fc_query=$this->db_query;$fc_error=$this->db_error;$fc_array=$this->db_array;$fc_object=$this->db_object;$fc_assoc=$this->db_assoc;$fc_num_r=$this->db_num_r;$fc_fre_r=$this->db_fre_r;$fc_close=$this->db_close;
				//---------------------------------------------------------
				$inf=null;$n=1;
				//---------------------
				$inf.='<div class="hero-slider">';
					$sql = "SELECT nombre, imagen FROM ".$this->table." WHERE status=1;";
					$res = $this->db_exec($sql);
					if ($res->result==true && $res->cant > 0) {
						while ($row = $fc_assoc($res->res)) {
							$inf.='<div class="slide-item">';
								$inf.='<a class="fresco" href="'.IMG.'cursos/'.$row['imagen'].'" data-fresco-group="projects">';
									$inf.='<img src="'.IMG.'cursos/'.$row['imagen'].'" alt="'.$row['nombre'].'">';
								$inf.='</a>';
							$inf.='</div>';
						}
						$fc_fre_r($res->res);//liberar memoria del resultado
					}else{
						$inf.='<div class="alert alert-danger">Error: '.$res->error.'</div>';
					}
				$inf.='</div>';
				//---------------------
				$inf.='<div class="hero-text-slider">';
					$sql = "SELECT id, nombre FROM ".$this->table." WHERE status=1;";
					$res = $this->db_exec($sql);
					if ($res->result==true && $res->cant > 0) {
						while ($row = $fc_assoc($res->res)) {
							$inf.='<div class="text-item">';
								$inf.='<h2>'.$row['nombre'].'</h2>';
								$inf.='<p><a href="'.$this->detail.base64_encode($row[$this->tid]).'" class="btn btn-outline-info">Ver Curso</a></p>';
							$inf.='</div>';
						}
						$fc_fre_r($res->res);
					}else{
						if ($res->cant == 0) {
							$inf.='';
						}else{
							$inf.='<div class="alert alert-danger">Error: '.$res->error.'</div>';
						}
					}
				$inf.='</div>';
				//---------------------
				$fc_close($this->connect());
				return $inf;
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
						$inf.='<th>Nombre</th>';
						$inf.='<th>Descripción</th>';
						$inf.='<th>Creado</th>';
						$inf.='<th>Editado</th>';
						$inf.='<th>Eliminado</th>';
						$inf.='<th>Estado</th>';
						$inf.='<th>Imagen</th>';
					$inf.='</tr>';
				$inf.='</thead>';
				$inf.='<tbody>';
					$sql = "SELECT * FROM ".$this->table." WHERE status=1 ;";
					$res = $this->db_exec($sql);
					if ($res->result==true && $res->cant > 0) {
						while ($row = $fc_assoc($res->res)) {
							$inf.='<tr>';
								$inf.='<th>'.$n.'</th>';
								$inf.='<td>'.$row['nombre'].'</td>';
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
								$inf.='<td>';
									if (strlen($row['imagen']) > 5) {
										if ($tip==1) {
											$inf.='<img style="max-width: 100px; max-height: 100px;" src="'.IMG.'cursos/'.$row['imagen'].'" />';
										}else{
											$imagenPath = __DIRIMG__ . 'cursos/' . $row['imagen'];
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
											//$inf.='<img style="max-width: 100px; max-height: 100px;" src="'.__DIRIMG__.'cursos/'.$row['imagen'].'" />';
										}
									}else{
										$inf.='No imagen';
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