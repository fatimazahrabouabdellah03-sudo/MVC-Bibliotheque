<?php

$pdo = new PDO(
    "mysql:host=localhost;dbname=bibliotheque;charset=utf8",
    "root",
    "fatimazahra123@"
);

$pdo->setAttribute(
    PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION
);