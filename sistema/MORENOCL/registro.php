<?php
	/**
	 * 
	 */
	class registro extends database
	{
		private $table='registro';
		private $table2='usuarios';
		private $table3='tipos_usuarios';
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
					case 4:
					break;
					default:	$sql .= "id_created=".$_SESSION['user_id']." AND ";	break;
				}
				$sql .= " status = 1 ;";
				$res = $this->db_exec($sql,false);
				//--------------------------------
				$inf = $res->cant;
				//--------------------------------
				$fc_close();
				return $inf;
			}
		//-----------------------------------
			function listar($rid,$uid,$url){
				$fc_query=$this->db_query;$fc_error=$this->db_error;$fc_array=$this->db_array;$fc_object=$this->db_object;$fc_assoc=$this->db_assoc;$fc_num_r=$this->db_num_r;$fc_fre_r=$this->db_fre_r;$fc_close=$this->db_close;
				//---------------------------------------------------------
				$data = new stdClass();
				$inf = null; $n=1; $cant = 7; $data->error = null;
				//-----------------------------
				$month = date('Y-m');
				$mes_ant = date('Y-m', strtotime("{$month} - 1 month"));
				$aux = date('Y-m-d', strtotime("{$month} + 1 month"));
				$last_day = date('Y-m-d', strtotime("{$aux} - 1 day"));
				//-----------------------------------
				$inf.='<thead>';
					$inf.='<tr>';
						$inf.='<th><i class="fas fa-list-ol"></i></th>';
						$inf.='<th><i class="fas fa-id-badge"></i></th>';
						$inf.='<th>Nombre de Usuarios</th>';
						$inf.='<th>Fecha de Ingreso</th>';
						$inf.='<th>Hora de Ingreso</th>';
						$inf.='<th>Navegador Usado</th>';
						$inf.='<th>Dirección IP</th>';
					$inf.='</tr>';
				$inf.='</thead>';
				//-----------------------------------
				$inf.='<tbody>';
					$sql = "SELECT r.*, CONCAT(u.nombres_u, ' ', u.apellidos_u) AS nombre_comp, u.id_tipo FROM ".$this->table." r INNER JOIN ".$this->table2." u ON r.".$this->tid2."=u.".$this->tid2." WHERE r.status=1 AND u.status=1 ";
					switch ($rid) {
						case 1:
							$sql .= "";
						break;
						case 2:
							$sql .= " AND u.id_tipo NOT IN (1) ";
						break;
						case 4:
							$sql .= " AND u.id_tipo NOT IN (1) ";
						break;
						default:
							$sql .= " AND r.".$this->tid1."=".$uid." ";
						break;
					}
					$sql .= " AND (r.fecha_ing >= '".$mes_ant.'-01'."' AND r.fecha_ing <= '".date('Y-m-d')."') ORDER BY ".$this->tid." DESC ;";
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
								$inf.='<td>'.$row['nombre_comp'].'</td>';
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
				$fc_close();
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
				$fc_close();
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
				$fc_close();
				return $data;
			}
		//-----------------------------------
	}