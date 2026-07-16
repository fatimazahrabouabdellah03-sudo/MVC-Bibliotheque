<?php

if (file_exists(__DIR__ . '/.env')) {
    $env = parse_ini_file(__DIR__ . '/.env');

    foreach ($env as $key => $value) {
        putenv("$key=$value");
    }
}

require_once __DIR__ . "/config/Database.php";
require_once __DIR__ . "/controllers/BibliothequeController.php";

$controller = new BibliothequeController();
$controller->index();