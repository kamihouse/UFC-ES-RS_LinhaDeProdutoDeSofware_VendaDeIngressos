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
        <ul>
            <?php
                if(isset($GLOBALS['menu'])){
                    foreach ($GLOBALS['menu'] as $item) {
                        echo '<li><a href="#">' . $item . '</a></li>';
                    }
                }
            ?>
        </ul>
    </body>
</html>