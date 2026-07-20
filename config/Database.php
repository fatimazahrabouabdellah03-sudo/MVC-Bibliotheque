<?php

class Database
{
    private static ?Database $instance = null;
    private PDO $pdo;

    private function __construct()
    {
        try {
            $this->pdo = new PDO(
                "mysql:host=" . getenv('DB_HOST') .
                ";dbname=" . getenv('DB_NAME') .
                ";charset=utf8",
                getenv('DB_USER'),
                getenv('DB_PASSWORD')
            );

            $this->pdo->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );
        } catch (PDOException $e) {
            die(
                "Erreur de connexion : "
                . htmlspecialchars($e->getMessage())
            );
        }
    }

    public static function getInstance(): Database
    {
        if (self::$instance === null) {
            self::$instance = new Database();
        }

        return self::$instance;
    }

    public function getPdo(): PDO
    {
        return $this->pdo;
    }

    private function __clone() {}
}