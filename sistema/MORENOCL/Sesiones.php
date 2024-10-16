<?php
	/**
	 * 
	 */
	class Sesiones
	{
		public static function setUID($uid,$tid,$tname,$name,$nomb,$apel,$user,$emai,$phon,$foto){
			$_SESSION['user_id'] = $uid;
			$_SESSION['tipo_id'] = $tid;
			$_SESSION['tipo_name'] = $tname;
			$_SESSION['user_name'] = $name;
			$_SESSION['user_nomb'] = $nomb;
			$_SESSION['user_apel'] = $apel;
			$_SESSION['user_user'] = $user;
			$_SESSION['user_emai'] = $emai;
			$_SESSION['user_phon'] = $phon;
			$_SESSION['user_foto'] = $foto;
		}
		//----------------------------------------------
		public static function accedUID($uid,$tid,$tname,$name,$nomb,$apel,$user,$emai,$phon,$dire,$foto){
			$_SESSION['ant_user_id'] = $_SESSION['user_id'];
			$_SESSION['ant_tipo_id'] = $_SESSION['tipo_id'];
			$_SESSION['ant_tipo_name'] = $_SESSION['tipo_name'];
			$_SESSION['ant_user_name'] = $_SESSION['user_name'];
			$_SESSION['ant_user_nomb'] = $_SESSION['user_nomb'];
			$_SESSION['ant_user_apel'] = $_SESSION['user_apel'];
			$_SESSION['ant_user_user'] = $_SESSION['user_user'];
			$_SESSION['ant_user_emai'] = $_SESSION['user_emai'];
			$_SESSION['ant_user_phon'] = $_SESSION['user_phon'];
			$_SESSION['ant_user_dire'] = $_SESSION['user_dire'];
			$_SESSION['ant_user_foto'] = $_SESSION['user_foto'];
			//------------------------------------------------------
			$_SESSION['user_id'] = $uid;
			$_SESSION['tipo_id'] = $tid;
			$_SESSION['tipo_name'] = $tname;
			$_SESSION['user_name'] = $name;
			$_SESSION['user_nomb'] = $nomb;
			$_SESSION['user_apel'] = $apel;
			$_SESSION['user_user'] = $user;
			$_SESSION['user_emai'] = $emai;
			$_SESSION['user_phon'] = $phon;
			$_SESSION['user_dire'] = $dire;
			$_SESSION['user_foto'] = $foto;
			$_SESSION['taller_id'] = $tall;
			$_SESSION['taller_name'] = $tall_name;
			$_SESSION['is_vac'] = $is_vac;
			$_SESSION['id_int'] = $id_int;
		}
		public static function regresar($uid){
			if ($_SESSION['user_id'] == $uid) {
				$_SESSION['user_id'] = $_SESSION['ant_user_id'];
				$_SESSION['tipo_id'] = $_SESSION['ant_tipo_id'];
				$_SESSION['tipo_name'] = $_SESSION['ant_tipo_name'];
				$_SESSION['user_name'] = $_SESSION['ant_user_name'];
				$_SESSION['user_nomb'] = $_SESSION['ant_user_nomb'];
				$_SESSION['user_apel'] = $_SESSION['ant_user_apel'];
				$_SESSION['user_user'] = $_SESSION['ant_user_user'];
				$_SESSION['user_emai'] = $_SESSION['ant_user_emai'];
				$_SESSION['user_phon'] = $_SESSION['ant_user_phon'];
				$_SESSION['user_dire'] = $_SESSION['ant_user_dire'];
				$_SESSION['user_foto'] = $_SESSION['ant_user_foto'];
				//----------------------------------------------------------
				unset($_SESSION['ant_user_id']);
				unset($_SESSION['ant_tipo_id']);
				unset($_SESSION['ant_tipo_name']);
				unset($_SESSION['ant_user_name']);
				unset($_SESSION['ant_user_nomb']);
				unset($_SESSION['ant_user_apel']);
				unset($_SESSION['ant_user_user']);
				unset($_SESSION['ant_user_emai']);
				unset($_SESSION['ant_user_phon']);
				unset($_SESSION['ant_user_dire']);
				unset($_SESSION['ant_user_foto']);
				$inf=true;
			}else{
				$inf=false;
			}
			return $inf;
		}
		//----------------------------------------------
		public static function updateINF($name,$user,$emai,$fnac,$phon,$dire,$foto){
			$_SESSION['user_name'] = $name;
			$_SESSION['user_user'] = $user;
			$_SESSION['user_emai'] = $emai;
			$_SESSION['user_fnac'] = $fnac;
			$_SESSION['user_phon'] = $phon;
			$_SESSION['user_dire'] = $dire;
			$_SESSION['user_foto'] = $foto;
		}
		//----------------------------------------------
		public static function unsetUID($uid,$name){
			if( ($_SESSION['user_id'] = $uid) and ( $_SESSION['user_name'] = $name ) )
				unset($_SESSION['user_id']);
				unset($_SESSION['user_name']);
		}
		//----------------------------------------------
		public static function issetUID(){
			if(isset($_SESSION['user_id']))
				return true;
			else return false;
		}
		//----------------------------------------------
		public static function getUID(){
			if(isset($_SESSION['user_id']))
				return $_SESSION['user_id'];
			else return false;
		}
		//----------------------------------------------
		public static function getTID(){
			if(isset($_SESSION['tipo_id']))
				return $_SESSION['tipo_id'];
			else return false;
		}
		//----------------------------------------------
		public static function getTNAME(){
			if(isset($_SESSION['tipo_name']))
				return $_SESSION['tipo_name'];
			else return false;
		}
		//----------------------------------------------
		public static function setUNAME($val){
			$_SESSION['user_name'] = $val;
		}
		public static function getUNAME(){
			if(isset($_SESSION['user_name']))
				return $_SESSION['user_name'];
			else return false;
		}
		//----------------------------------------------
		public static function setUNOMB($val){
			$_SESSION['user_nomb'] = $val;
		}
		public static function getUNOMB(){
			if(isset($_SESSION['user_nomb']))
				return $_SESSION['user_nomb'];
			else return false;
		}
		//----------------------------------------------
		public static function setUAPEL($val){
			$_SESSION['user_apel'] = $val;
		}
		public static function getUAPEL(){
			if(isset($_SESSION['user_apel']))
				return $_SESSION['user_apel'];
			else return false;
		}
		//----------------------------------------------
		public static function setUUSER($val){
			$_SESSION['user_user'] = $val;
		}
		public static function getUUSER(){
			if(isset($_SESSION['user_user']))
				return $_SESSION['user_user'];
			else return false;
		}
		//----------------------------------------------
		public static function setUEMAI($val){
			$_SESSION['user_emai'] = $val;
		}
		public static function getUEMAI(){
			if(isset($_SESSION['user_emai']))
				return $_SESSION['user_emai'];
			else return false;
		}
		//----------------------------------------------
		public static function setUPHON($val){
			$_SESSION['user_phon'] = $val;
		}
		public static function getUPHON(){
			if(isset($_SESSION['user_phon']))
				return $_SESSION['user_phon'];
			else return false;
		}
		//----------------------------------------------
		public static function setUDIRE($val){
			$_SESSION['user_dire'] = $val;
		}
		public static function getUDIRE(){
			if(isset($_SESSION['user_phon']))
				return $_SESSION['user_dire'];
			else return false;
		}
		//----------------------------------------------
		public static function setUFOTO($foto){
			$_SESSION['user_foto'] = $foto;
		}
		public static function getUFOTO(){
			if(isset($_SESSION['user_foto']))
				return $_SESSION['user_foto'];
			else return false;
		}
		//----------------------------------------------
		public static function setTALLID($valor){
			$_SESSION['taller_id'] = $valor;
		}
		public static function getTALLID(){
			if(isset($_SESSION['taller_id']))
				return $_SESSION['taller_id'];
			else return false;
		}
		//----------------------------------------------
		public static function setTALLNAME($valor){
			$_SESSION['taller_name'] = $valor;
		}
		public static function getTALLNAME(){
			if(isset($_SESSION['taller_name']))
				return $_SESSION['taller_name'];
			else return false;
		}
		//----------------------------------------------
		public static function setPID($pid){
			$_SESSION['persona_id'] = $pid;
		}
		public static function getPID(){
			if(isset($_SESSION['persona_id']))
				return $_SESSION['persona_id'];
			else return false;
		}
		//----------------------------------------------
		public static function setVALOR($valor){
			$_SESSION['valor_data'] = $valor;
		}
		public static function getVALOR(){
			if(isset($_SESSION['valor_data']))
				return $_SESSION['valor_data'];
			else return false;
		}
		//----------------------------------------------
		public static function setINTER($valor){
			$_SESSION['u_inte'] = $valor;
		}
		public static function getINTER(){
			if(isset($_SESSION['u_inte']))
				return $_SESSION['u_inte'];
			else return false;
		}
		//----------------------------------------------
		public static function setINIC($valor){
			$_SESSION['u_inic'] = $valor;
		}
		public static function getINIC(){
			if(isset($_SESSION['u_inic']))
				return $_SESSION['u_inic'];
			else return false;
		}
		//----------------------------------------------
		public static function setPROYEC($valor){
			$_SESSION['u_proy'] = $valor;
		}
		public static function getPROYEC(){
			if(isset($_SESSION['u_proy']))
				return $_SESSION['u_proy'];
			else return false;
		}
		//----------------------------------------------
		public static function setISVAC($valor){
			$_SESSION['is_vac'] = $valor;
		}
		public static function getISVAC(){
			if(isset($_SESSION['is_vac']))
				return $_SESSION['is_vac'];
			else return false;
		}
		//----------------------------------------------
		public static function setERROR($valor){
			$_SESSION['error'] = $valor;
		}
		public static function getERROR(){
			if(isset($_SESSION['error']))
				return $_SESSION['error'];
			else return false;
		}
		//----------------------------------------------
		public static function calLIQ_TE($id){
			$str = 'LGO-';
			//------------------------------
			if (strlen($id) == 1) {
				$str .= '0000000'.$id;
			}elseif (strlen($id) == 2) {
				$str .= '000000'.$id;
			}elseif (strlen($id) == 3) {
				$str .= '00000'.$id;
			}elseif (strlen($id) == 4) {
				$str .= '0000'.$id;
			}elseif (strlen($id) == 5) {
				$str .= '000'.$id;
			}elseif (strlen($id) == 6) {
				$str .= '00'.$id;
			}elseif (strlen($id) == 7) {
				$str .= '0'.$id;
			}elseif (strlen($id) == 8) {
				$str .= $id;
			}elseif (strlen($id) == 9) {
				$str = 'GO-'.$id;
			}elseif (strlen($id) == 10) {
				$str = 'GO'.$id;
			}elseif (strlen($id) == 11) {
				$str = 'L'.$id;
			}else{
				$str = $id;
			}
			//------------------------------
			return $str;
		}
	}