<?php

class Conexao {

    private static $servername = "localhost";
    private static $username = "pdo";
    private static $password = "Senha123";
    private static $dbname = "pdo_tecnologia";
    private $conn = null;

    public function getConn() {
        return $this->conn;
    }

    public function connect() {
        try {
            $this->conn = new PDO("mysql:host=" . self::$servername .
                    ";dbname=" . self::$dbname,
                    self::$username,
                    self::$password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Banco de dados conectado com sucesso!";
        } catch (PDOException $e) {
            echo "Falha na conexão com o banco de dados: " . $e->getMessage();
            $this->conn = null;
        }
    }

    public function exec($sql) {
        try {
            $this->conn->exec($sql);
            echo "Executado no banco de dados!";
        } catch (PDOException $ex) {
            echo "Erro ao executar: " . $ex->getMessage();
        } catch (Exception $ex) {
            echo "Erro genérico: " . $ex->getMessage();
        }
    }

    public function execWithReturn($sql) {
        try {
            $result = $this->conn->query($sql);
            if ($result->rowCount() > 0) {
                $result->setFetchMode(PDO::FETCH_ASSOC);
                echo "<pre>";
                print_r($result->fetchAll());
                echo "</pre>";
            } else {
                echo "Nenhum registro encontrado!";
            }
        } catch (PDOException $ex) {
            echo "Erro ao consultar: " . $ex->getMessage();
        } catch (Exception $ex) {
            echo "Erro genérico: " . $ex->getMessage();
        }
    }

}
