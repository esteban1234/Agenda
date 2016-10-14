<?php

	if(!empty($_POST['user']) and !empty($_POST['pass'])){
		$db = new Conexion();
		$data = $db->real_escape_string($_POST['user']);
		$pass = $_POST['pass'];
		$sql = $db->query("SELECT id FROM usuario WHERE (usuario ='$data') AND contrasena = '$pass' LIMIT 1;");
			if($db->rows($sql) > 0)
			{
				$_SESSION['app_id']= $db->runs($sql)[0];
				echo 1;
			}

			else{
				echo '
	               	<strong>Error Credenciales Incorrectos</strong><br/>.
	             	';
			}
		$db->liberar($sql);
		$db->close();
	}

	else{
			echo '
	              <strong>Error Campos vacios</strong><br/>.
	            ';
	}
?>
