<?php
if (file_exists(__DIR__ . '/.env')) {
    $env = parse_ini_file(__DIR__ . '/.env');
    foreach ($env as $key => $value) {
        putenv("$key=$value");
    }
}

require_once "controllers/BibliothequeController.php";

$controller = new BibliothequeController();
$controller->index();