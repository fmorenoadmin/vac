<?php
	/**
	 * 
	 */
	class cursos extends database
	{
		private $table ='cursos';
		private $action='cursos.php?met=';
		private $detail='detalle/?p=';
		private $tid= 'id';
		//---------------------------------------
		function listar(){
			$fc_query=$this->db_query;$fc_error=$this->db_error;$fc_array=$this->db_array;$fc_object=$this->db_object;$fc_assoc=$this->db_assoc;$fc_num_r=$this->db_num_r;$fc_fre_r=$this->db_fre_r;$fc_close=$this->db_close;//convierte las funciones de la base de datos en variables
			//---------------------------------------------------------
			$inf=null;$n=1;
			//---------------------
			$inf.='<div class="hero-slider" style="max-height: 560px !important;">';
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
			$inf.='<div class="hero-text-slider" style="max-height: 200px !important;">';
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
	}