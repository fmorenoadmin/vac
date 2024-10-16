<?php
	/**
	 * 
	 */
	class contacto extends database
	{
		private $table ='contacto';
		private $table1='seg_contacto';
		private $table2='usuarios';
		private $action='contacto.php?meth=';
		private $detail='detalle/?p=';
		private $tid = 'id';
		private $tid1= 'id_seg';
		private $tid2= 'id_user';
		//---------------------------------------
			function cantidad($rid){
				$fc_query=$this->db_query;$fc_error=$this->db_error;$fc_array=$this->db_array;$fc_object=$this->db_object;$fc_assoc=$this->db_assoc;$fc_num_r=$this->db_num_r;$fc_fre_r=$this->db_fre_r;$fc_close=$this->db_close;
				//---------------------------------------------------------
				$inf = 0;
				//---------------------------------------------------------
				$sql = "SELECT ".$this->tid." FROM ".$this->table." WHERE status<>2 ;";
				$res = $this->db_exec($sql,false);
				//--------------------------------
				$inf = $res->cant;
				//--------------------------------
				$fc_close($this->connect());
				return $inf;
			}
		//----------------------------------
			function listar($total,$pag,$rid,$uid,$url,$busq=null,$val=null){
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
				$inf.='<thead>';
					$inf.='<tr>';
						$inf.='<th>#</th>';
						$inf.='<th>Nombre</th>';
						$inf.='<th>Correo</th>';
						$inf.='<th>Teléfono</th>';
						$inf.='<th>Mensaje</th>';
						$inf.='<th>Creado</th>';
						$inf.='<th>Gestión</th>';
					$inf.='</tr>';
				$inf.='</thead>';
				$inf.='<tbody>';
					$sql = "SELECT * FROM ".$this->table." WHERE status <> 2 ";
						//--------------------------------
							if ($busq==true) {
								$sql .= " AND (id LIKE '%".$val."%' OR nombre LIKE '%".$val."%' OR correo LIKE '%".$val."%' OR telefono LIKE '%".$val."%' OR mensaje LIKE '%".$val."%') ";
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
								$inf.='<th scope="row">'.$n.'</th>';
								$inf.='<td>'.$row['nombre'].'</td>';
								$inf.='<td>'.$row['correo'].'</td>';
								$inf.='<td>'.$row['telefono'].'</td>';
								$inf.='<td>'.$row['mensaje'].'</td>';
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
									$inf.='<button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#eliminar" onclick="eliminar('."'".base64_encode($row[$this->tid])."||".base64_encode($row['nombre'])."||'".');"><i class="fa fa-trash"></i></button>';
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
		//----------------------------------
			function listarSeg($pid){
				$fc_query=$this->db_query;$fc_error=$this->db_error;$fc_array=$this->db_array;$fc_object=$this->db_object;$fc_assoc=$this->db_assoc;$fc_num_r=$this->db_num_r;$fc_fre_r=$this->db_fre_r;$fc_close=$this->db_close;
				//---------------------------------------------------------
				$inf=null;$n=1;$cant=7;
				//-------------------------------------
				$inf.='<thead>';
					$inf.='<tr>';
						$inf.='<th>#</th>';
						$inf.='<th>Respuesta</th>';
						$inf.='<th>Fecha de respuesta</th>';
						$inf.='<th>Empleado</th>';
						$inf.='<th>Gestión</th>';
					$inf.='</tr>';
				$inf.='</thead>';
				$inf.='<tbody>';
					$sql = "SELECT r.*, CONCAT(u.nombres_u, ' ', u.apellidos_u) AS empleado FROM ".$this->table1." r INNER JOIN ".$this->table2." u ON r.id_usuario=u.id_user WHERE r.status=1 AND r.".$this->tid."=".$pid." ORDER BY r.".$this->tid1." DESC;";
					$res = $this->db_exec($sql);
					if ($res->result==true && $res->cant > 0) {
						while ($row = $fc_assoc($res->res)) {
							$inf.='<tr>';
								$inf.='<th scope="row">'.$n.'</th>';
								$inf.='<td>'.$row['respuesta'].'</td>';
								$inf.='<td>'.$row['created_at'].'</td>';
								$inf.='<td>'.$row['empleado'].'</td>';
								$inf.='<td>';
									$inf.='<button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#dropSeg" onclick="dropSeg('."'".base64_encode($row[$this->tid1])."||".base64_encode(utf8_encode($row['respuesta']))."'".');"><i class="fa fa-trash"></i></button>';
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
				//-----------------------------
				$fc_close($this->connect());
				return $inf;
			}
		//----------------------------------
			function exportar(){
				$fc_query=$this->db_query;$fc_error=$this->db_error;$fc_array=$this->db_array;$fc_object=$this->db_object;$fc_assoc=$this->db_assoc;$fc_num_r=$this->db_num_r;$fc_fre_r=$this->db_fre_r;$fc_close=$this->db_close;
				//---------------------------------------------------------
				$inf=null;$n=1;$cant=10;
				//-------------------------------------
				$inf.='<thead>';
					$inf.='<tr>';
						$inf.='<th>#</th>';
						$inf.='<th>Nombre</th>';
						$inf.='<th>Correo</th>';
						$inf.='<th>Teléfono</th>';
						$inf.='<th>Mensaje</th>';
						$inf.='<th>Creado</th>';
						$inf.='<th>Editado</th>';
						$inf.='<th>Eliminado</th>';
						$inf.='<th>Estado</th>';
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
								$inf.='<td>'.$row['correo'].'</td>';
								$inf.='<td>'.$row['telefono'].'</td>';
								$inf.='<td>'.$row['mensaje'].'</td>';
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
		//----------------------------------
	}