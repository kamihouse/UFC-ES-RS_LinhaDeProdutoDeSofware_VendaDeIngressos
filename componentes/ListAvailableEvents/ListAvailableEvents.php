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
			$eventos = new AddToFavorites();
			$eventos->exibeTelaFavoritos();
			break;
        case 'relacionados':
            $relacionados = new FeaturedEvents();
            $relacionados->exibeEventosRelacionados();
            break;
        case 'comprar':
            $comprar = new MakeAnOrder();
            $comprar->comprar();
            break;
	}

	class ListAvailableEvents{
		protected $mensagem = null;
		protected $customizar = array('AddToFavorites', 'FeaturedEvents', 'MakeAnOrder', 'ShowNumberOfTicket'); // Alterar aqui para os módulos que o cliente escolher

        function init(){
            if(isset($GLOBALS['menu']))
				$GLOBALS['menu']['listar']	= 'Eventos Disponíveis|componentes/ListAvailableEvents/ListAvailableEvents.php?acao=listar';
        }

		public function exibeTelaListar(){
			$sessao = isset($_SESSION['nome']) ? $_SESSION['nome'] : null;
			$favorito = in_array("AddToFavorites", $this->customizar) ? '<a class="btn btn-info btn-large btn-block" href="ListAvailableEvents.php?acao=favoritos">Adicionar aos Favoritos</a>' : null;
            $relacionado = in_array("FeaturedEvents", $this->customizar) ? '<a class="btn btn-inverse btn-large btn-block" href="ListAvailableEvents.php?acao=relacionados">Eventos Relacionados</a>' : null;
            $comprar = in_array("MakeAnOrder", $this->customizar) ? '<a class="btn btn-primary btn-large btn-block" href="ListAvailableEvents.php?acao=comprar">Comprar</a>' : null;

            if(in_array("ShowNumberOfTicket", $this->customizar)){
                $aux = new ShowNumberOfTickets();
            }

            global $sc;
            $sc->pprint('head');
            ?>
            <div class="container">
                <div class="logo">
                    <h1>UFC RS - LPS<span>Venda de Ingressos</span><dt>2.0</dt></h1>
                </div>

                <div class="col-xs-12">
                    <?php $sc->pprint('row_menu'); ?>
                    <div class="row geral">
                        <h4>Eventos Disponíveis</h4>
                        <p>
                            Venda de Ingressos Online - Eventos disponíveis <?= empty($sessao) ? '' : 'para <b>' . $sessao ?></b>
                        </p>
                        <hr>

                        <div class="col-xs-4">
                            <div class="tile">
                                <img src="<?= $sc->base_url ?>assets/img/icons/svg/gift-box.svg" class="tile-image big-illustration">
                                <h3 class="tile-title">14/06/2015</h3>
                                <p>Uma noite no museu - Fortaleza Reggae Clube</p>
                                <?= isset($aux) ? '<h5>'.$aux->nTickets().'&nbsp;<small style="color: inherit; font-size: .56em">Ingressos disponíveis</small></h5>' : '' ?>

                                <a class="btn btn-default btn-large btn-block" href="#">Visualizar este evento</a>
                                <?= $favorito ?>
                                <?= $relacionado ?>
                                <?= $comprar ?>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="tile">
                                <img src="<?= $sc->base_url ?>assets/img/icons/svg/toilet-paper.svg" class="tile-image big-illustration">
                                <h3 class="tile-title">17/06/2015</h3>
                                <p>Dusk - The Deep Love - Social Club 33</p>
                                <?= isset($aux) ? '<h5>'.$aux->nTickets().'&nbsp;<small style="color: inherit; font-size: .56em">Ingressos disponíveis</small></h5>' : '' ?>

                                <a class="btn btn-default btn-large btn-block" href="#">Visualizar este evento</a>
                                <?= $favorito ?>
                                <?= $relacionado ?>
                                <?= $comprar ?>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="tile">
                                <img src="<?= $sc->base_url ?>assets/img/icons/svg/calendar.svg" class="tile-image big-illustration">
                                <h3 class="tile-title">24/06/2015</h3>
                                <p>100% convertable to HTML/CSS layout.</p>
                                <?= isset($aux) ? '<h5>'.$aux->nTickets().'&nbsp;<small style="color: inherit; font-size: .56em">Ingressos disponíveis</small></h5>' : '' ?>

                                <a class="btn btn-default btn-large btn-block" href="#">Visualizar este evento</a>
                                <?= $favorito ?>
                                <?= $relacionado ?>
                                <?= $comprar ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $sc->pprint('loadjs');
		}
	}