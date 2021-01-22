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
//        $sql1 = "INSERT INTO tecnologia (`nome`) VALUES ('JQuery');";
        $sql = "SELECT * FROM tecnologia;";
//        $conn->exec($sql);
        print_r(Conexao::execWithReturn($sql));
        echo Conexao::getErro();
        
        if(!Conexao::exec($sql1)){
            echo Conexao::getErro();
        }
        print_r(Conexao::execWithReturn($sql));
        echo "</pre>";
        ?>
    </body>
</html>
