<?php
	session_destroy();
	unset($_SESSION['app_id']);
	header('location: ?view=index');
?>
