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
			$favorito = in_array("addToFavorites", $this->customizar) ? '<li><a href="ListAvailableEvents.php?acao=favoritos">Adicionar a Favoritos</a> - AddToFavorites</li>' : null;
            global $sc;
            $sc->pprint('head');
            ?>
                <div class="container">
                    <h3><a href="<?= $sc->base_url ?>">LPS - Venda de Ingressos</a> | Eventos Disponíveis</h3>
                    <hr>

                    <p>Eventos sugeridos para você: <b><?= $sessao ?></b></p>

                    <ul>
                        <li>Open Beer Festival - Premium Paulínia | Paulínia-SP
                        <ul>
                            <li>Comprar - MakeAnOrder</li>
                            <li>99 - ShowNumberOfTicket</li>
                            <?= $favorito ?>
                            <li>Eventos Relacionados - FeaturedEvents</li>
                        </ul>
                        </li>
                        <li>Energia na Véia Junina - Clube Juventus | Irecê-BA</li>
                        <li>Dusk - Deep Love - Club 33 | São Paulo-SP</li>
                        <li>Open Beer Festival - Paulínia | Paulínia-SP</li>
                        <li>Véia Junina - Clube Juventus | Irecê-CE</li>
                        <li>Deep Love - Club 33 | São Paulo-SP</li>
                    </ul>
                </div>
            <?php
            $sc->pprint('loadjs');
		}
	}