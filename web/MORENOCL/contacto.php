<?php
	/**
	 * 
	 */
	class contacto extends DataBase
	{
		private $table	='contacto';
		private $actio	='contacto.php';
		private $detail	='detalle/?p=';
		private $tid	="id";
		//----------------------------------
			function cantidad($ip){
				$fc_query=$this->db_query;$fc_error=$this->db_error;$fc_array=$this->db_array;$fc_object=$this->db_object;$fc_assoc=$this->db_assoc;$fc_num_r=$this->db_num_r;$fc_fre_r=$this->db_fre_r;$fc_close=$this->db_close;
				//---------------------------------------------------------
				$inf = 0;
				$hoy = date('Y-m-d');
				//---------------------------------------------------------
				$sql = "SELECT ".$this->tid." FROM ".$this->table." WHERE status=1 AND ip_cli LIKE '".$ip."' AND (created_at >= '".$hoy." 00:00:00' OR created_at <= '".$hoy." 23:59:59') ;";
				$res = $this->db_exec($sql,false);
				//--------------------------------
				$inf = $res->cant;
				//--------------------------------
				$fc_close($this->connect());
				return $inf;
			}
		//---------------------------------------
	}