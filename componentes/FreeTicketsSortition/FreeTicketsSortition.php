<?php
    require_once '../../sistema/SetupComponente.php';
    require_once "../../sistema/setup.php";

    $sc = new SetupComponente();

	if(!isset($_SESSION)){
		session_start();
	}

	// Pega acao do usuário
	$acao   = isset($_GET['acao']) ? $_GET['acao'] : null;
	$metodo = isset($_GET['metodo']) ? $_GET['metodo'] : null;


	// Trata ação do usuário
	switch($acao){
		case 'exibe':
			$eventos = new FreeTicketsSortition();
			$eventos->exibePromocao();
			break;
	}


	class FreeTicketsSortition{
        function init(){
            if(isset($GLOBALS['menu']))
				$GLOBALS['menu']['promocoes'] 	= 'Promoções|Componentes/FreeTicketsSortition/FreeTicketsSortition.php?acao=exibe';
        }

		public function exibePromocao(){
            global $sc;
			$sessao = isset($_SESSION['nome']) ? $_SESSION['nome'] : null;

            $sc->pprint('head');
            ?>
			<div class="container">
				<div class="logo">
					<h1>UFC RS - LPS<span>Venda de Ingressos</span><dt>2.0</dt></h1>
				</div>

				<div class="col-xs-12">
                    <?php $sc->pprint('row_menu'); ?>
					<div class="row geral">
						<h4>Promoções</h4>
						<p>
							Venda de Ingressos Online - Promoções de Eventos <?= empty($sessao) ? '' : 'para <b>' . $sessao ?></b>
						</p>
						<hr>

						<?php
						if(!$sessao){
							echo '<p><span class="fui-info-circle"></span> <a href="../../Componentes/Profile/Profile.php?acao=login">Clique Aqui para fazer login</a> e exibir as promoções detalhadas para o seu perfil.</p>';
						}
						?>
						<div class="col-xs-4">
							<div class="tile">
								<img src="<?= $sc->base_url ?>/assets/img/icons/svg/compas.svg" class="tile-image big-illustration">
								<h3 class="tile-title"><span style="color: red;">30%</span> - 13/06/2015</h3>
								<p>Energia na Véia Junina - Clube Juventus</p>
								<a class="btn btn-primary btn-large btn-block" href="#">Visualizar este evento</a>
							</div>
						</div>
						<div class="col-xs-4">
							<div class="tile">
								<img src="<?= $sc->base_url ?>/assets/img/icons/svg/gift-box.svg" class="tile-image big-illustration">
								<h3 class="tile-title"><span style="color: red;">10%</span> - 14/06/2015</h3>
								<p>Uma noite no museu - Fortaleza Reggae Clube</p>
								<a class="btn btn-primary btn-large btn-block" href="#">Visualizar este evento</a>
							</div>
						</div>
						<div class="col-xs-4">
							<div class="tile">
								<img src="<?= $sc->base_url ?>/assets/img/icons/svg/paper-bag.svg" class="tile-image big-illustration">
								<h3 class="tile-title"><span style="color: red;">40%</span> - 17/06/2015</h3>
								<p>Dusk - The Deep Love - Social Club 33</p>
								<a class="btn btn-primary btn-large btn-block" href="#">Visualizar este evento</a>
							</div>
						</div>
					</div>
				</div>
			</div>
            <?php
            $sc->pprint('loadjs');
		}
	}