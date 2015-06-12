<?php
    require_once 'sistema/setup.php';
    require_once 'sistema/SetupComponente.php';

    $sc = new SetupComponente();
    $sc->pprint('head');
?>
<div class="container">
    <div class="logo">
        <h1>UFC RS - LPS<span>Venda de Ingressos</span><dt>2.0</dt></h1>
    </div>

    <?php
        if(isset($_SESSION['nome'])){
            echo '<br>Olá <b>'. $_SESSION['nome'] .'</b> você já está logado. <a href="Componentes/Profile/Profile.php?acao=usuarioLogado">Clique Aqui</a> para ir para sua home page.' ;
        }
    ?>

    <div class="col-xs-12">
        <div class="row">
            <nav class="navbar navbar-inverse navbar-embossed" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">
                        <span class="sr-only">Toggle navigation</span>
                    </button>
                    <a class="navbar-brand" href="<?= $sc->base_url ?>">Bem Vindo &nbsp; </a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-collapse-01">
                    <ul class="nav navbar-nav navbar-left">
                        <?php
                            if(isset($_SESSION['nome'])){
                                echo '<li>';
                                echo '<a href="#fakelink">'. $_SESSION['nome'] .'<span class="navbar-unread">1</span></a>';
                                echo '</li>';
                            }
                        ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Módulos do Sistema<b class="caret"></b></a>
                            <span class="dropdown-arrow"></span>
                            <ul class="dropdown-menu">
                                <li><a href="<?= $sc->base_url ?>">Home</a></li>
                                <li class="divider"></li>
                                <?php
                                if(isset($GLOBALS['menu'])){
                                    foreach ($GLOBALS['menu'] as $item) {
                                        $menulink = explode('|', $item);
                                        echo '<li><a href="'. $menulink[1] .'">' . $menulink[0] . '</a></li>';
                                    }
                                }
                                ?>
                            </ul>
                        </li>
                        <li><a href="sobre.php">Sobre Nós</a></li>
                    </ul>
                    <form class="navbar-form navbar-right" action="#" role="search">
                        <div class="form-group">
                            <div class="input-group">
                                <input class="form-control" id="navbarInput-01" type="search" placeholder="Encontrar">
                        <span class="input-group-btn">
                          <button type="submit" class="btn"><span class="fui-search"></span></button>
                        </span>
                            </div>
                        </div>
                    </form>
                </div><!-- /.navbar-collapse -->
            </nav><!-- /navbar -->
        </div>

        <div class="row geral">
            <h4>Venda de Ingressos Online</h4>
            <p>
                Um trabalho para a disciplina de <b>Reuso de Software</b> 2015.1 da <b>Universidade Federal do Ceará</b> - Campus Quixadá.
            </p>
            <br>
            <blockquote>
                <p>
                    <b>Alunos:</b><br>
                    - Thiago Pereira<br>
                    - Matheus Souza<br>
                    - Natasha Silveira<br>
                    - Marcilio Valoir
                </p>
            </blockquote>

            <blockquote>
                <p>
                    <b>Professora:</b><br>
                    - Carla Ilane Moreira Bezerra
                </p>
            </blockquote>
        </div>
    </div>

    <hr>
</div>
<?php
    $sc->pprint('loadjs');