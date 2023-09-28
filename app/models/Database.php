<?php

namespace App\Models;

use PDO;
use PDOException;

class Database
{
    private static $conn = null;

    /**
     * Estabelece a conexão com o banco de dados
     * @return PDO|false Executa a conexão com o banco de dados
     */
    private static function connect()
    {
        require_once('../config/database.php');

        try {
            if (self::$conn == null) {
                self::$conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
            echo "Erro de conexão. Por favor, tente novamente."; // Em caso de erro, lança uma exceção com a mensagem de erro
        }

        return self::$conn;
    }

    /**
     * Obtém a conexão com o banco de dados
     * @return PDO Retorna a conexão com o banco de dados
     */
    public static function getConnection()
    {
        return self::connect();
    }
}
