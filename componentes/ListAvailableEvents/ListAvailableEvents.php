<?php
    require_once "../../sistema/SetupComponente.php";
    $sc = new SetupComponente();

	if(!isset($_SESSION)){
		session_start();
	}

	// Pega acao do usuário
	$acao   = isset($_GET['acao']) ? $_GET['acao'] : null;
	$metodo = isset($_GET['metodo']) ? $_GET['metodo'] : null;

	// Trata ação do usuário
	switch($acao){
		case 'listar':
			$login = new ListAvailableEvents();
			$login->exibeTelaListar();
			break;
		case 'favoritos':
			include_once("AddToFavorites.php");
			$eventos = new AddToFavorites();
			$eventos->exibeTelaFavoritos();
			break;

	}

	class ListAvailableEvents{
		protected $mensagem = null;
		protected $customizar = array('addToFavorites', 'featuredEvents', 'makeAnOrder', 'showNumberOfTicket'); // Alterar aqui para os módulos que o cliente escolher

        function init(){
            if(isset($GLOBALS['menu']))
				$GLOBALS['menu']['listar']	= 'Eventos Disponíveis|Componentes/ListAvailableEvents/ListAvailableEvents.php?acao=listar';
        }

		public function exibeTelaListar(){
			$sessao = isset($_SESSION['nome']) ? $_SESSION['nome'] : null;
			$favorito = in_array("addToFavorites", $this->customizar) ? '<a class="btn btn-info btn-large btn-block" href="ListAvailableEvents.php?acao=favoritos">Adicionar aos Favoritos</a>' : null;

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
                        <h4>Eventos Disponíveis</h4>
                        <p>
                            Venda de Ingressos Online - Eventos disponíveis <?= empty($sessao) ? '' : 'para <b>' . $sessao ?></b>
                        </p>
                        <hr>

                        <div class="col-xs-4">
                            <div class="tile">
                                <img src="<?= $sc->base_url ?>/assets/img/icons/svg/gift-box.svg" class="tile-image big-illustration">
                                <h3 class="tile-title">14/06/2015</h3>
                                <p>Uma noite no museu - Fortaleza Reggae Clube</p>

                                <a class="btn btn-default btn-large btn-block" href="#">Visualizar este evento</a>
                                <?= $favorito ?>
                                <a class="btn btn-default btn-large btn-block" href="#">Eventos Relacionados</a>
                                <a class="btn btn-primary btn-large btn-block" href="#">Comprar</a>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="tile">
                                <img src="<?= $sc->base_url ?>/assets/img/icons/svg/toilet-paper.svg" class="tile-image big-illustration">
                                <h3 class="tile-title">17/06/2015</h3>
                                <p>Dusk - The Deep Love - Social Club 33</p>
                                <a class="btn btn-default btn-large btn-block" href="#">Visualizar este evento</a>
                                <?= $favorito ?>
                                <a class="btn btn-default btn-large btn-block" href="#">Eventos Relacionados</a>
                                <a class="btn btn-primary btn-large btn-block" href="#">Comprar</a>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="tile">
                                <img src="<?= $sc->base_url ?>/assets/img/icons/svg/calendar.svg" class="tile-image big-illustration">
                                <h3 class="tile-title">24/06/2015</h3>
                                <p>100% convertable to HTML/CSS layout.</p>
                                <a class="btn btn-default btn-large btn-block" href="#">Visualizar este evento</a>
                                <?= $favorito ?>
                                <a class="btn btn-default btn-large btn-block" href="#">Eventos Relacionados</a>
                                <a class="btn btn-primary btn-large btn-block" href="#">Comprar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $sc->pprint('loadjs');
		}
	}