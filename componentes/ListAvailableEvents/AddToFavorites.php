<?php
    require_once "../../sistema/SetupComponente.php";
    $sc = new SetupComponente();

	if(!isset($_SESSION)){
		session_start();
	}

	class AddToFavorites{
        function init(){
            
        }

		public function exibeTelaFavoritos(){
            global $sc;
			$sessao = isset($_SESSION['nome']) ? $_SESSION['nome'] : null;

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
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">
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
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Módulos do Sistema<b class="caret"></b></a>
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
                        <h4>Eventos Disponíveis - Add Favoritos</h4>
                        <p>
                            Venda de Ingressos Online - Adicionar aos Favoritos <?= empty($sessao) ? '' : 'para <b>' . $sessao ?></b>
                        </p>
                        <hr>

                        <p><b>Evento adicionado aos favoritos com sucesso!</b></p>

                        <hr>
                        <div class="row col-xs-4">
                            <a href="ListAvailableEvents.php?acao=listar" class="btn btn-block btn-lg btn-inverse">Voltar para Eventos Sugeridos</a>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            $sc->pprint('loadjs');
		}
	}