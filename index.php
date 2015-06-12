<?php
    require_once 'sistema/setup.php';
    require_once 'sistema/SetupComponente.php';

    $sc = new SetupComponente();
    $sc->pprint('head');
?>
    <h3><a href="<?= $sc->base_url ?>">LPS - Venda de Ingressos</a> | Bem vindo</h3>
    <hr>

    <?php
        if(isset($_SESSION['nome'])){
            echo '<br>Olá <b>'. $_SESSION['nome'] .'</b> você já está logado. <a href="Componentes/Profile/Profile.php?acao=usuarioLogado">Clique Aqui</a> para ir para sua home page.' ;
        }
    ?>

    <p><br>Escolha as opções no menu abaixo:</p>
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
<?php
    $sc->pprint('loadjs');