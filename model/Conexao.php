<?php

class Conexao {

    private static $servername = "localhost";
    private static $username = "pdo";
    private static $password = "Senha123";
    private static $dbname = "pdo_tecnologia";
    private static $erro = "";
    private static $conn = null;

    private static function connect() {
        try {
            self::$conn = new PDO("mysql:host=" . self::$servername .
                    ";dbname=" . self::$dbname,
                    self::$username,
                    self::$password);
            // set the PDO error mode to exception
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return true;
        } catch (PDOException $e) {
            self::$erro = "Falha na conexão com o banco de dados: " . $e->getMessage();
            self::$conn = null;
            return false;
        }
    }

    public static function getErro() {
        $message = self::$erro;
        self::$erro = "";
        return $message;
    }

    public static function isConnected() {
        if (self::$conn == null) {
            return self::connect();
        }
        return true;
    }

    public static function exec($sql) {
        try {
            self::$conn->exec($sql);
            return true;
        } catch (PDOException $ex) {
            self::$erro = "Erro ao executar: " . $ex->getMessage();
        } catch (Exception $ex) {
            self::$erro = "Erro genérico: " . $ex->getMessage();
        }
        return false;
    }

    public static function execWithReturn($sql) {
        if (self::isConnected()) {
            try {
                $result = self::$conn->query($sql);
                if ($result->rowCount() > 0) {
                    $result->setFetchMode(PDO::FETCH_ASSOC);
                    return $result->fetchAll();
                } else {
                    self::$erro = "Nenhum registro encontrado!";
                }
            } catch (PDOException $ex) {
                self::$erro = "Erro ao consultar: " . $ex->getMessage();
            } catch (Exception $ex) {
                self::$erro = "Erro genérico: " . $ex->getMessage();
            }
        }
        return false;
    }
    public function __destruct() {
        self::$conn = null;
    }    
}
