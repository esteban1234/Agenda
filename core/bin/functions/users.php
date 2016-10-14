<?php  
	

	function users(){
		$db = new Conexion();
		$sql = $db->query("SELECT * FROM users;");
		if($db->rows($sql) > 0){
			while($d = $db->runs($sql)){
				$users[$d['id']] = array(
					'id' => $d['id'],
					'user' => $d['users'],
					'pass' => $d['pass'],
					'email' => $d['email'],
					'permisos' => $d['permisos']
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


	function clientes(){
		$db = new Conexion();
		$sql = $db->query("SELECT MAX(NUM_FAC) AS NUM_FAC FROM totfac;");
		$d= $db->runs($sql);

		if ($d['NUM_FAC'] < 10)
		{
			$new = $d['NUM_FAC'] +1;
			$clientes= array('id' => '0000'.$new);	
		}

		if ($d['NUM_FAC'] >= 10)
		{
			$new = $d['NUM_FAC'] + 1;
			$clientes= array('id' => '000'.$new);	
		}
		

		if ($d['NUM_FAC'] >= 100)
		{
			$new = $d['NUM_FAC'] +1;
			$clientes= array('id' => '00'.$new);	
		}

		if ($d['NUM_FAC'] >= 1000)
		{
			$new = $d['NUM_FAC'] +1;
			$clientes= array('id' => '0'.$new);	
		}

		if ($d['NUM_FAC'] >= 10000)
		{
			$new = $d['NUM_FAC'] +1;
			$clientes= array('id' => $new);	
		}

		return $clientes;

		$db->liberar($sql);
		$db->close();
	}


	function pagos(){
		$db = new Conexion();
		$sql = $db->query("SELECT MAX(NUM_PAG) AS NUM_PAG FROM movpag;");
		$d= $db->runs($sql);

		if ($d['NUM_PAG'] < 10)
		{
			$new = $d['NUM_PAG'] +1;
			$clientes= array('id' => '0000'.$new);	
		}

		if ($d['NUM_PAG'] >= 10)
		{
			$new = $d['NUM_PAG'] + 1;
			$clientes= array('id' => '000'.$new);	
		}
		

		if ($d['NUM_PAG'] >= 100)
		{
			$new = $d['NUM_PAG'] +1;
			$clientes= array('id' => '00'.$new);	
		}

		if ($d['NUM_PAG'] >= 1000)
		{
			$new = $d['NUM_PAG'] +1;
			$clientes= array('id' => '0'.$new);	
		}

		if ($d['NUM_PAG'] >= 10000)
		{
			$new = $d['NUM_PAG'] +1;
			$clientes= array('id' => $new);	
		}

		return $clientes;

		$db->liberar($sql);
		$db->close();
	}

	function addcliente(){
		$db = new Conexion();
		$sql = $db->query("SELECT MAX(NUM_CLI) AS NUM_CLI FROM catacli;");
		$d= $db->runs($sql);

		if ($d['NUM_CLI'] < 10)
		{
			$new = $d['NUM_CLI'] +1;
			$clientes= array('id' => '0000'.$new);	
		}

		if ($d['NUM_CLI'] >= 10)
		{
			$new = $d['NUM_CLI'] + 1;
			$clientes= array('id' => '000'.$new);	
		}
		

		if ($d['NUM_CLI'] >= 100)
		{
			$new = $d['NUM_CLI'] +1;
			$clientes= array('id' => '00'.$new);	
		}

		if ($d['NUM_CLI'] >= 1000)
		{
			$new = $d['NUM_CLI'] +1;
			$clientes= array('id' => '0'.$new);	
		}

		if ($d['NUM_CLI'] >= 10000)
		{
			$new = $d['NUM_CLI'] +1;
			$clientes= array('id' => $new);	
		}

		return $clientes;

		$db->liberar($sql);
		$db->close();
	}



	function addAgente(){
		$db = new Conexion();
		$sql = $db->query("SELECT MAX(NUM_AGE) AS NUM_AGE FROM cataage;");
		$d= $db->runs($sql);

		if ($d['NUM_AGE'] < 10)
		{
			$new = $d['NUM_AGE'] +1;
			$agente= array('id' => '0000'.$new);	
		}

		if ($d['NUM_AGE'] >= 10)
		{
			$new = $d['NUM_AGE'] + 1;
			$agente= array('id' => '000'.$new);	
		}
		

		if ($d['NUM_AGE'] >= 100)
		{
			$new = $d['NUM_AGE'] +1;
			$agente= array('id' => '00'.$new);	
		}

		// if ($d['NUM_ZON'] >= 1000)
		// {
		// 	$new = $d['NUM_ZON'] +1;
		// 	$agente= array('id' => '0'.$new);	
		// }

		// if ($d['NUM_ZON'] >= 10000)
		// {
		// 	$new = $d['NUM_ZON'] +1;
		// 	$agente= array('id' => $new);	
		// }

		return $agente;

		$db->liberar($sql);
		$db->close();
	}

	function addZona(){
		$db = new Conexion();
		$sql = $db->query("SELECT MAX(NUM_ZON) AS NUM_ZON FROM catazon;");
		$d= $db->runs($sql);

		if ($d['NUM_ZON'] < 10)
		{
			$new = $d['NUM_ZON'] +1;
			$agente= array('id' => '0000'.$new);	
		}

		if ($d['NUM_ZON'] >= 10)
		{
			$new = $d['NUM_ZON'] + 1;
			$agente= array('id' => '000'.$new);	
		}
		

		if ($d['NUM_ZON'] >= 100)
		{
			$new = $d['NUM_ZON'] +1;
			$agente= array('id' => '00'.$new);	
		}

		// if ($d['NUM_ZON'] >= 1000)
		// {
		// 	$new = $d['NUM_ZON'] +1;
		// 	$agente= array('id' => '0'.$new);	
		// }

		// if ($d['NUM_ZON'] >= 10000)
		// {
		// 	$new = $d['NUM_ZON'] +1;
		// 	$agente= array('id' => $new);	
		// }

		return $agente;

		$db->liberar($sql);
		$db->close();
	}


	function por_int(){
		$db = new Conexion();
		$sql = $db->query("SELECT POR_INT FROM fecope");
		$d= $db->runs($sql);
		
		$por= array('id' => $d['POR_INT']);

		return $por;

		$db->liberar($sql);
		$db->close();
		}
	
?>