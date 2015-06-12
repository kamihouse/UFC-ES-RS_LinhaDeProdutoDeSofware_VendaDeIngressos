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
                <h3><a href="<?= $sc->base_url ?>">LPS - Venda de Ingressos</a> | Adicionado aos Favoritos</h3>
                <hr>

                <p>Add aos favoritos: <b><?= $sessao ?></b></p>

                <p><b>Evento adicionado aos favoritos com sucesso!</b></p>

                <p><a href="ListAvailableEvents.php?acao=listar">Voltar para Eventos Sugeridos</a></p>
            <?php
            $sc->pprint('loadjs');
		}
	}