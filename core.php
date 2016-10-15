<?php
// Nucleo de la Aplicacion

session_start();

#CONTANSTES DE CONEXION
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'agenda');

define('HTML_DIR', 'html/');
// define('APP_TITLE', 'Prestamigo');
// define('APP_URL', './');

#ESTRUCTURA
require 'core/models/class.Conexion.php';
