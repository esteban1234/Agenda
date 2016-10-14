<?php  

	class Opciones{
		private $db;
		private $id;
		private $pago;
		private $row;
		private $numfac;
		
		

		public function __construct(){
			$this->db = new Conexion();	
		}

		public function cancela(){
			$this->id = intval($_GET['id']);
			$num = 'C';
			$q = "UPDATE totfac SET STA_TUS ='$num' WHERE NUM_FAC = '$this->id';";
			$this->db->query($q);
			header('location: ?view=adprestamo');
		}

		public function modificar(){
			$this->id = intval($_GET['id']);
			$num = 'C';
			$q = "UPDATE totfac SET STA_TUS ='$num' WHERE NUM_FAC = '$this->id';";
			$this->db->query($q);
			header('location: ?view=adprestamo');
		}

		public function eliminar(){
			$this->id = intval($_GET['id']);
			$q = "SELECT * FROM catacli WHERE NUM_CLI = '$this->id' AND SAL_CLI='0';";
			$consulta = $this->db->query($q);

			if($this->db->rows($consulta)>0)
			{
				
				$q2= "DELETE FROM catacli WHERE NUM_CLI = '$this->id';";
				$this->db->query($q2);

				echo "<script type=\"text/javascript\">alert(\"Eliminado Correctamente\");</script>";
			}
			else
			{

				echo "<script type=\"text/javascript\">alert(\"No se puede ELIMINAR, persona cuenta con prestamo\");</script>";
			}

			header('refresh: 0; url= ?view=insert');
		}


		public function eliminarZon(){
			$this->id = intval($_GET['id']);
			
				
			$q2= "DELETE FROM catazon WHERE NUM_ZON = '$this->id';";
			$this->db->query($q2);

			$q3 = "SELECT * FROM movpag WHERE NUM_PAG = '$this->id';";
			$e = $this->db->query($q3);

			if($this->db->query($q2))
			{
				echo "<script type=\"text/javascript\">alert(\"Zona Eliminada Correctamente\");</script>";
			}
			else
			{

				echo "<script type=\"text/javascript\">alert(\"No se puede ELIMINAR\");</script>";
			}

			header('refresh: 0; url= ?view=zon');
		}


		public function cancelapago(){
			$this->id = intval($_GET['id']);
			$num = 'C';
			$q = "UPDATE movpag SET REF_ERE ='Cancelado' WHERE NUM_PAG = '$this->id';";
			$this->db->query($q);

			$q2 = "SELECT * FROM movpag WHERE NUM_PAG = '$this->id';";
			$e = $this->db->query($q2);
			
			$this->row = $this->db->runs($e);
			$this->numfac = $this->row['NUM_FAC'];
			$this->pago = $this->row['IMP_PAG'];


			$q3 = "UPDATE totfac SET  SAL_DOF= SAL_DOF + $this->pago WHERE NUM_FAC = '$this->numfac';";
			$this->db->query($q3);

			$q3 = "UPDATE catacli SET  SAL_CLI= SAL_CLI + $this->pago, DES_CLI= DES_CLI + 1 WHERE NUM_FAC = '$this->numfac';";
			$this->db->query($q3);


			header('location: ?view=pago');
		}

		public function cancelCRE(){

			$this->id = intval($_GET['id']);
	
			$q = "SELECT * FROM totfac WHERE NUM_FAC = '$this->id' AND TOT_PAG=SAL_DOF;";
			$consulta = $this->db->query($q);
			
			if($this->db->rows($consulta)>0)
			{
				$q2 = "UPDATE totfac SET  REF_ERE='cancelado' WHERE NUM_FAC = '$this->id';";
				$this->db->query($q2);

				echo "<script type=\"text/javascript\">alert(\"CREDITO cancelado\");</script>";
			}
			else
			{
				echo "<script type=\"text/javascript\">alert(\"No se puede CANCELAR prestamo ya cuenta con pago\");</script>";
			}

			header('refresh: 0; url= ?view=adprestamo');
			 
		}
		
		
		public function __destruct(){
			$this->db->close();
		}
	}
?>