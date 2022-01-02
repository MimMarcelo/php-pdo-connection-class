<?php
require_once './model/Conexao.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>PHP com PDO</title>
    </head>
    <body>
        <?php
//        $conn = new Conexao();
//        echo "Conectado: " . Conexao::isConnected() . "<br>";
//        echo Conexao::getErro();
        echo "<pre>";
        //$sql1 = "INSERT INTO tecnologia (nome) VALUES ('HTML');";
        $sql = "SELECT * FROM tecnologia;";
//        $conn->exec($sql);

        /*if(Conexao::exec($sql1)){
            echo Conexao::getLastId();
        }
        else{
            echo Conexao::getErro();
        }*/
        if (Conexao::execWithReturn($sql)) {
            print_r(Conexao::getData());
        } else {
            echo Conexao::getErro();
        }
        echo "</pre>";
        ?>
    </body>
</html>
