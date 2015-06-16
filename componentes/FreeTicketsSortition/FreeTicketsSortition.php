<?php
    require_once '../../sistema/SetupComponente.php';

    $sc = new SetupComponente();

	if(!isset($_SESSION)){
		session_start();
	}

	// Pega acao do usuário
	$acao   = isset($_GET['acao']) ? $_GET['acao'] : null;
	$metodo = isset($_GET['metodo']) ? $_GET['metodo'] : null;


	// Trata ação do usuário
	switch($acao){
		case 'exibePromocao':
			$eventos = new FreeTicketsSortition();
			$eventos->exibePromocao();
			break;
		case 'queroParticipar':
			$eventos = new FreeTicketsSortition();
			$eventos->queroParticipar();
			break;
	}


	class FreeTicketsSortition{
        function init(){
            if(isset($GLOBALS['menu']))
				$GLOBALS['menu']['promocoes'] 	= 'Sorteio de Ingressos|componentes/FreeTicketsSortition/FreeTicketsSortition.php?acao=exibePromocao';
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
						<h4>Sorteio de Ingressos</h4>
						<p>
							Venda de Ingressos Online - Sorteio de Ingressos <?= empty($sessao) ? '' : 'para <b>' . $sessao ?></b>
						</p>
						<hr>

						<?php
						if(!$sessao){
							echo '<p><span class="fui-info-circle"></span> <a href="'.$sc->base_url.'componentes/Profile/Profile.php?acao=login">Clique Aqui para fazer login</a> e exibir as promoções detalhadas para o seu perfil.</p>';
						}
						?>
						<div class="col-xs-4">
							<div class="tile">
								<img src="<?= $sc->base_url ?>assets/img/icons/svg/compas.svg" class="tile-image big-illustration">
								<h3 class="tile-title"><span style="color: red;">30 tickets</span> - 13/06/2015</h3>
								<p>Energia na Véia Junina - Clube Juventus</p>
								<a class="btn btn-primary btn-large btn-block" href="<?= base_url() ?>componentes/FreeTicketsSortition/FreeTicketsSortition.php?acao=queroParticipar">Quero participar!</a>
							</div>
						</div>
						<div class="col-xs-4">
							<div class="tile">
								<img src="<?= $sc->base_url ?>assets/img/icons/svg/gift-box.svg" class="tile-image big-illustration">
								<h3 class="tile-title"><span style="color: red;">10 tickets</span> - 14/06/2015</h3>
								<p>Uma noite no museu - Fortaleza Reggae Clube</p>
								<a class="btn btn-primary btn-large btn-block" href="<?= base_url() ?>componentes/FreeTicketsSortition/FreeTicketsSortition.php?acao=queroParticipar">Quero participar!</a>
							</div>
						</div>
						<div class="col-xs-4">
							<div class="tile">
								<img src="<?= $sc->base_url ?>assets/img/icons/svg/paper-bag.svg" class="tile-image big-illustration">
								<h3 class="tile-title"><span style="color: red;">40 tickets</span> - 17/06/2015</h3>
								<p>Dusk - The Deep Love - Social Club 33</p>
								<a class="btn btn-primary btn-large btn-block" href="<?= base_url() ?>componentes/FreeTicketsSortition/FreeTicketsSortition.php?acao=queroParticipar">Quero participar!</a>
							</div>
						</div>
					</div>
				</div>
			</div>
            <?php
            $sc->pprint('loadjs');
		}


		public function queroParticipar(){
			global $sc;
			$sessao = isset($_SESSION['nome']) ? $_SESSION['nome'] : null;

			if(!isset($sessao)){
				$this->exibeTelaSolicitaLogin();
				die();
			}

			$sc->pprint('head');
			?>
			<div class="container">
				<div class="logo">
					<h1>UFC RS - LPS<span>Venda de Ingressos</span><dt>2.0</dt></h1>
				</div>

				<div class="col-xs-12">
					<?php $sc->pprint('row_menu'); ?>
					<div class="row geral">
						<h4>Sorteio de Ingressos</h4>
						<p>
							Venda de Ingressos Online - Sorteio de Ingressos <?= empty($sessao) ? '' : 'para <b>' . $sessao ?></b>
						</p>
						<hr>

						<img src="<?= base_url() ?>assets/img/icons/svg/clipboard.svg" alt="Pensils">
						<br><br>
						<p><span class="fui-info-circle"></span> A partir de agora você está concorrendo ao sorteio de ingressos do evento selecionado!
							<br>
							<small>Utilize o botão abaixo para voltar para Sorteio de Eventos.</small></p>

						<div class="row col-xs-3">
							<a href="<?= base_url() ?>componentes/FreeTicketsSortition/FreeTicketsSortition.php?acao=exibePromocao" class="btn btn-block btn-lg btn-inverse">Voltar para Sorteios</a>
						</div>

					</div>
				</div>
			</div>
			<?php
			$sc->pprint('loadjs');
		}


		public function exibeTelaSolicitaLogin(){
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
						<h4>Sorteio de Ingressos</h4>
						<p>
							Venda de Ingressos Online - Sorteio de Ingressos
						</p>
						<hr>

						<div class="col-xs-12">
							<p>
								<b><span class="fui-alert-circle"></span> Atenção!</b><br>
								Você precisa estar logado no sistema para adicionar esse evento aos seus favoritos.</p>

							<div class="row col-xs-4">
								<a href="<?= $sc->base_url ?>componentes/Profile/Profile.php?acao=login" class="btn btn-block btn-lg btn-default">Efeturar Login</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
			$sc->pprint('loadjs');
		}
	}