<?php
    require_once "../../sistema/SetupComponente.php";

    $sc = new SetupComponente();

	if(!isset($_SESSION)){
		session_start();
	}

	class FeaturedEvents{
        function init(){

        }

		public function exibeEventosRelacionados(){
			$sessao = isset($_SESSION['nome']) ? $_SESSION['nome'] : null;

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
						<h4>Eventos Disponíveis - Eventos Relacionados</h4>
						<p>
							Venda de Ingressos Online - Eventos relacionados <?= empty($sessao) ? '' : 'para <b>' . $sessao ?></b>
						</p>
						<hr>

						<img src="<?= base_url() ?>assets/img/icons/svg/pencils.svg" alt="Pensils">
						<br><br>
						<p><span class="fui-info-circle"></span> Infelizmente não há nenhum evento relacionado com este selecionado.
						<br>
						<small>Utilize o botão abaixo para voltar para os Eventos disponíveis.</small></p>

						<div class="row col-xs-3">
							<a href="<?= base_url() ?>Componentes/ListAvailableEvents/ListAvailableEvents.php?acao=listar" class="btn btn-block btn-lg btn-inverse">Voltar para Eventos</a>
						</div>

					</div>
				</div>
			</div>
			<?php
			$sc->pprint('loadjs');
		}
	}