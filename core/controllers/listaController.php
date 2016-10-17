<?php

if (!isset($_SESSION['app_id'])) {
    include HTML_DIR . 'public/goLogin.php';
} else {
    include 'html/contenido/contenido.php';
}
