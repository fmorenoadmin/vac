<?php
	/**
	 * 
	 */
	class ip_block extends database
	{
		private $table='ip_block';
		private $actio='ip_block.php';
		private $tid='id_ipb';
		//------------------------------
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
				$sql .= " status=1;";
				//--------------------------------
				$res = $this->db_exec($sql,false);
				//--------------------------------
				$inf = $res->cant;
				//--------------------------------
				$fc_close($this->connect());
				return $inf;
			}
		//------------------------------
			function verifIP($ip_cli=null){
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
				$sql="SELECT ip FROM ".$this->table." WHERE ip LIKE '".$ip_cli."' AND status=1;";
				//--------------------------------
				$res = $this->db_exec($sql,false);
				//--------------------------------
				$inf = $res->cant;
				//--------------------------------
				$fc_close($this->connect());
				return $inf;
			}
		//------------------------------
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
						$inf.='<th>Dirección IP</th>';
						$inf.='<th>Motivo</th>';
						$inf.='<th>Fecha</th>';
						$inf.='<th>Estado</th>';
					$inf.='</tr>';
				$inf.='</thead>';
				$inf.='<tbody>';			
					$sql="SELECT * FROM ".$this->table." WHERE status<>2 ORDER BY ".$this->tid." DESC LIMIT 5000;";
					//--------------------------------
					$res = $this->db_exec($sql);
					if ($res->result==true && $res->cant > 0) {
						$data->result = true;
						$data->mensaje = 'Registros encontrados.';
						//--------------------------------
						while ($row = $fc_assoc($res->res)) {
								$pid = base64_encode($row[$this->tid]);
								//-------------------------------------
								$datos2 = $pid;
								//-------------------------------------
								$inf .= '<tr>';
									$inf .= '<td>';
										if ($row['status']==1) {
											$inf .= "<a href='".ACTI.$this->actio."?pid=".$pid."&meth=unlock&url=".base64_encode($url)."' title='Clic para: Desbloquear esta IP' class='btn btn-icon btn-danger'>";
												$inf .= "<i class='fas fa-lock'></i> Desbloquear";
											$inf .= "</a> ";
										}else{
											$inf .= "<a href='".ACTI.$this->actio."?pid=".$pid."&meth=lock&url=".base64_encode($url)."' title='Clic para: Volver a Bloquear la IP' class='btn btn-icon btn-success'>";
												$inf .= "<i class='fas fa-unlock'></i> Bloquear";
											$inf .= "</a> ";
										}
										if ($rid==1 || $rid==2 || $rid==4) {
											$inf .= "<button type='button' class='btn btn-icon btn-danger' data-bs-toggle='modal' data-bs-target='#eliminar' onclick='eliminar(".'"'.$datos2.'"'.");' >";
												$inf .= "<i class='fas fa-trash-alt'></i>";
											$inf .= '</button>';
										}
									$inf .= '</td>';
									$inf .= '<td>'.$n.'</td>';
									$inf .= '<td>'.$row[$this->tid].'</td>';
									$inf .= '<td>'.$row['ip'].'</td>';
									$inf .= '<td>'.$row['detalle_block'].'</td>';
									$inf .= '<td>'.$row['created_at'].'</td>';
									$inf .= '<td>';
										if ($row['status']==1) {
											$inf .= '<i class="fas fa-check-circle"></i>';
										}else{
											$inf .= '<i class="fas fa-ban"></i>';
										}
									$inf .= '</td>';
								$inf .= '</tr>';
								//-------------------------------------
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
		//------------------------------
	}