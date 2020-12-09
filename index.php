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
        $conn = new Conexao();
        $conn->connect();
//        $sql = "INSERT INTO tecnologia (`nome`) VALUES ('JQuery');";
        $sql = "SELECT * FROM tecnologia;";
//        $conn->exec($sql);
        $conn->execWithReturn($sql);        
        $conn->execWithReturn($sql);        
        ?>
    </body>
</html>
