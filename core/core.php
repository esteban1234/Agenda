<?php

$err = isset($_GET['error']) ? $_GET['error'] : null;

// Nucleo de la Aplicacion

session_start();

#CONTANSTES DE CONEXION
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'agenda');

define('HTML_DIR', 'html/');
define('APP_TITLE', 'Agenda');
// define('APP_URL', 'http://localhost/Github/prestamigo');

#ESTRUCTURA
require 'core/models/class.Conexion.php';
require 'core/bin/functions/Encrypt.php';
require 'core/bin/functions/users.php';

$users = users();
