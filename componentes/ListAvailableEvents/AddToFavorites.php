<?php
    require_once "../../sistema/SetupComponente.php";
    require_once "../../sistema/setup.php";

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
                    <?php $sc->pprint('row_menu'); ?>
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