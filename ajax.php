<?php

if ($_POST) {
    require 'core/core.php';
    switch (isset($_GET['mode']) ? $_GET['mode'] : null) {
        case 'login':
            require 'core/bin/ajax/goSesion.php';
            break;

        case 'registro':
            require 'core/bin/ajax/goRegistroTarea.php';
            break;

        case 'opciones':
            require 'core/bin/ajax/goOPCIONES.php';
            break;

        default:
            header('location: ?view=admin');
            // include('core/controllers/sesionController.php');
            break;
    }
} else {
    header('location: ?view=admin');
    // include('core/controllers/sesionController.php');
    // mira we, vamos a trata de implementar una clase, para que esa nos sirva para actualiza, eliminar, y para otras cosas
}
