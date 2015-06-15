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
		case 'exibeEvento':
			$eventos = new FindEvent();
			$eventos->exibeEventos();
			break;
	}


	class FindEvent{
        function init(){
            if(isset($GLOBALS['menu']))
				$GLOBALS['menu']['buscar'] = 'Buscar Evento|componentes/FindEvent/FindEvent.php?acao=exibeEvento';
        }

		public function exibeEventos(){
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
						<h4>Buscar Eventos</h4>
						<p>
							Venda de Ingressos Online - Buscar Eventos <b><?= $sessao ?></b>
						</p>
						<hr>

						<form action="#" method="post">
							<div class="form-group">
								<?php
								if(!$sessao){
									echo '<p><a href="'.$sc->base_url.'componentes/Profile/Profile.php?acao=login">Clique aqui para fazer login</a> e melhorar sua busca.</p>';
								}
								?>
							</div>

							<div class="col-xs-7">
								<div class="form-group">
									<input type="text" name="login" value="" placeholder="Nome do Evento" class="form-control">
								</div>
								<div class="form-group">
									<input type="text" name="senha" value="" placeholder="Local do Evento" class="form-control">
								</div>

								<div class="form-group">
									<input type="submit" class="btn btn-block btn-lg btn-primary" value="Buscar Evento"/>
								</div>
							</div>
							<div class="col-xs-5">
								<div class="form-group">
									<input type="text" name="login" value="" placeholder="Buscar por Hashtag" class="form-control">
								</div>
								<div class="form-group">
									<input type="text" name="senha" value="" placeholder="Buscar por Código Promocional" class="form-control">
								</div>
                                <div class="form-group">
                                    <input type="date" name="login" value="" placeholder="Buscar por Data" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="senha" value="" placeholder="Buscar por Tipo de Evento" class="form-control">
                                </div>

								<div class="form-group">
									<input type="submit" class="btn btn-block btn-lg btn-default" value="Busca Avançada de Evento"/>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<?php

            $sc->pprint('loadjs');
		}
	}