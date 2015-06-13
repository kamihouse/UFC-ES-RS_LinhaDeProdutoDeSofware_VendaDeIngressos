<?php
    require_once '../../sistema/SetupComponente.php';
    $sc = new SetupComponente();

    if(!isset($_SESSION)){
        session_start();
    }

	class Public_Profile{
        function init(){
            
        }

		public function exibePerfilPublico(){
            global $sc;
            $sc->pprint('head');
            ?>
            <div class="container">
                <div class="logo">
                    <h1>UFC RS - LPS<span>Venda de Ingressos</span><dt>2.0</dt></h1>
                </div>

                <div class="col-xs-12">
                    <div class="row">
                        <nav class="navbar navbar-inverse navbar-embossed" role="navigation">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse"
                                        data-target="#navbar-collapse-01">
                                    <span class="sr-only">Toggle navigation</span>
                                </button>
                                <a class="navbar-brand" href="<?= $sc->base_url ?>">Bem Vindo &nbsp;&nbsp; </a>
                            </div>
                            <div class="collapse navbar-collapse" id="navbar-collapse-01">
                                <ul class="nav navbar-nav navbar-left">
                                    <?php
                                    if (isset($_SESSION['nome'])) {
                                        echo '<li>';
                                        echo '<a href="' . $sc->base_url . 'Componentes/Profile/Profile.php?acao=usuarioLogado">' . $_SESSION['nome'] . '<span class="navbar-unread">1</span></a>';
                                        echo '</li>';
                                    }
                                    ?>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Módulos do Sistema<b
                                                class="caret"></b></a>
                                        <span class="dropdown-arrow"></span>
                                        <ul class="dropdown-menu">
                                            <li><a href="<?= $sc->base_url ?>">Home</a></li>
                                            <li class="divider"></li>
                                            <?php
                                            if (isset($GLOBALS['menu'])) {
                                                foreach ($GLOBALS['menu'] as $item) {
                                                    $menulink = explode('|', $item);
                                                    echo '<li><a href="' . $menulink[1] . '">' . $menulink[0] . '</a></li>';
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </li>
                                    <li><a href="<?= $sc->base_url ?>sobre.php">Sobre Nós</a></li>
                                </ul>
                                <form class="navbar-form navbar-right" action="#" role="search">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input class="form-control" id="navbarInput-01" type="search"
                                                   placeholder="Encontrar">
											<span class="input-group-btn">
											  <button type="submit" class="btn"><span class="fui-search"></span>
                                              </button>
											</span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.navbar-collapse -->
                        </nav>
                    </div>

                    <div class="row geral">
                        <h4>Meu perfil público</h4>
                        <p>
                            Abaixo estão as informações publicas que você compartilha em nosso sistema
                        </p>
                        <hr>

                        <div class="col-xs-4">
                            <img src="<?= $sc->base_url ?>assets/img/<?= $_SESSION['foto'] ?>" class="fotoPerfil"/>
                        </div>
                        <div class="col-xs-8">
                            <h3><?= $_SESSION['nome'] ?></h3>
                            <p><b>Sexo:</b> <?= $_SESSION['sexo'] ?></p>
                            <p><b>Cidade:</b> <?= $_SESSION['cidade'] ?></p>
                            <p><b>Telefone:</b> <?= $_SESSION['telefone'] ?></p>
                            <hr>
                            <div class="btn-group">
                                <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" type="button">Opções disponíveis <span class="caret"></span></button>
                                <ul role="menu" class="dropdown-menu">
                                    <li><a href="Profile.php?acao=usuarioLogado">Voltar para Minha Conta</a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?= $sc->base_url ?>Componentes/Profile/Profile.php?acao=sair">Sair</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <br>
                </div>
            </div>
			<?php
            $sc->pprint('loadjs');
		}
	}