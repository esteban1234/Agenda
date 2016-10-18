<?php


	function users(){
		$db = new Conexion();
		$sql = $db->query("SELECT * FROM usuario;");
		if($db->rows($sql) > 0){
			while($d = $db->runs($sql)){
				$users[$d['id']] = array(
					'id' => $d['id'],
					'user' => $d['usuario'],
					'pass' => $d['contrasena']
				);
			}
		}
		else
		{
			$users = false;
		}

		return $users;

		$db->liberar($sql);
		$db->close();
	}
?>
