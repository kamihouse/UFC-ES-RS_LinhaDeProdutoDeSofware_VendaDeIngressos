<?php
    require_once 'sistema/setup.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="cache-control" content="no-cache" />
        <meta http-equiv="pragma" content="no-cache" />
        <meta http-equiv="expires" content="0" />

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
                        $menulink = explode('|', $item);
                        echo '<li><a href="'. $menulink[1] .'">' . $menulink[0] . '</a></li>';
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