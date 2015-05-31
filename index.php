<?php
    require_once 'sistema/setup.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Reuso de Software | Venda de Ingressos</title>
    </head>
    <body>
        <h3>LPS - Venda de Ingressos | Bem vindo</h3>
        <hr>
        <p>Selecione uma das opções abaixo:</p>
        <ul>
            <?php
                if(isset($GLOBALS['menu'])){
                    foreach ($GLOBALS['menu'] as $item) {
                        echo '<li><a href="'. $item .'">' . $item . '</a></li>';
                    }
                }
            ?>
        </ul>

        <hr>
        <pre>
            <?php
                var_dump($GLOBALS['link']);
            ?>
        </pre>
    </body>
</html>