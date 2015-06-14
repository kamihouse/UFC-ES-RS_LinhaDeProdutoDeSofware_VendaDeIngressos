<?php
    require_once 'sistema/setup.php';
    require_once 'sistema/SetupComponente.php';

    $sc = new SetupComponente();
    $sc->pprint('head');
?>
<div class="container" xmlns="http://www.w3.org/1999/html">
    <div class="logo">
        <h1><simple class="hidden-sm hidden-xs">UFC RS - LPS</simple> <span>Venda de Ingressos</span><dt>2.0</dt></h1>
    </div>

    <div class="col-xs-12">
        <div class="row">
            <nav class="navbar navbar-inverse navbar-embossed" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">
                        <span class="sr-only">Toggle navigation</span>
                    </button>
                    <a class="navbar-brand" href="<?= $sc->base_url ?>">Bem Vindo &nbsp;&nbsp; </a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-collapse-01">
                    <ul class="nav navbar-nav navbar-left">
                        <?php
                            if(isset($_SESSION['nome'])){
                                echo '<li>';
                                echo '<a href="Componentes/Profile/Profile.php?acao=usuarioLogado">'. $_SESSION['nome'] .'<span class="navbar-unread">1</span></a>';
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
            <h4>Bem vindo ao sistema de Venda de Ingressos Online</h4>
            <p>
                Um trabalho para a disciplina de <b>Reuso de Software</b> 2015.1 do curso de <b>ES</b> da <b>Universidade Federal do Ceará</b> - Campus Quixadá.
            </p>

            <hr>
            <blockquote>
                <p>
                    <b>Instruções:</b><br>
                    Selecione o módulo que desejar no Menu superior <b>Módulos do Sistema</b> para acessar as features.<br>
                    Mais detalhes sobre essa aplicação, utilize o link abaixo que também está disponível com mais detalhes no menu <b>Sobre Nós</b>.
                </p>
                <small>Equipe: Venda de Ingressos</small>
            </blockquote>

            <hr>
            <p>
                <span class="fui-bookmark"></span> Repositório: <a href="https://github.com/kamihouse/UFC-ES-RS_LinhaDeProdutoDeSofware_VendaDeIngressos" target="_blank">UFC-ES-RS_LinhaDeProdutoDeSofware_VendaDeIngressos</a>
                <br>
                <small>Seguindo os conceitos de Linha de Produto de Software, desenvolvemos um conjunto básico de sistemas de <b>software de código aberto</b> que têm um determinado conjunto de funcionalidades em comum, que satisfazem as necessidades de um determinado segmento de mercado (venda de ingressos online) e que são desenvolvidos tendo a mesma base (core). Os componentes e o software como um todo são facilmente customizados.</small>
            </p>
        </div>
    </div>
</div>
<?php
    $sc->pprint('loadjs');