<?php


	if($_POST){
		require('core/core.php');
		switch (isset($_GET['mode']) ? $_GET['mode'] : null) {
			case 'login':
					require('core/bin/ajax/goSesion.php');
				break;

			default:
					header('location: ?view=admin');
				// include('core/controllers/sesionController.php');
				break;
		}
	}

	else{
			header('location: ?view=admin');
			// include('core/controllers/sesionController.php');
	}
?>
