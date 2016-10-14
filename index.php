<?php  
	require('core/core.php');
	// echo Encrypt('123456');
	// $_SESSION['app_id'];

	if(isset($_GET['view'])){
		// strtolower convierte de mayuscula a minuscula
	if(file_exists('core/controllers/'. strtolower($_GET['view']).'Controller.php')){
			include('core/controllers/'. strtolower($_GET['view']).'Controller.php');
		}
		else{
			include('core/controllers/errorController.php');
		}	 
	}

	else{
		include('core/controllers/indexController.php');
	}

?>