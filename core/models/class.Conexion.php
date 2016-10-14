<?php  
	
	class Conexion extends mysqli{

		public function __construct(){
			parent::__construct(DB_HOST,DB_USER,DB_PASS,DB_NAME);
			$this->connect_errno ? die('Error en la conexion a la BD') : null;
			$this->set_charset("utf8");
		}

		public function rows($query){
			return mysqli_num_rows($query);
		}

		public function liberar($query){
			return mysqli_free_result($query);
		}

		public function runs($query){
			return mysqli_fetch_array($query);
		}
	}
?>