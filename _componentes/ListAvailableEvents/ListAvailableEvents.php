<?php
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
                $GLOBALS['menu'][]			= 'Lista de Eventos';
				$GLOBALS['menu']['listar']	= 'Eventos Disponíveis|Componentes/ListAvailableEvents/ListAvailableEvents.php?acao=listar';
        }
        
		function __construct(){
			# code...
		}


		public function exibeTelaListar(){
			$sessao = isset($_SESSION['nome']) ? $_SESSION['nome'] : null;

			$favorito = in_array("addToFavorites", $this->customizar) ? '<li><a href="ListAvailableEvents.php?acao=favoritos">Adicionar a Favoritos</a> - AddToFavorites</li>' : null;
			print('
                <!DOCTYPE html>
                <html>
                    <head>
                        <meta charset="utf-8">
                        <title>LPS - Venda de Ingressos - Eventos Disponíveis</title>
                        </head>
                    <body>
                        <h3><a href="../../">LPS - Venda de Ingressos</a> | Eventos Disponíveis</h3>
                        <hr>

                        <p>Eventos sugeridos para você: <b>'. $sessao .'</b></p>

						<ul>
							<li>Open Beer Festival - Premium Paulínia | Paulínia-SP
							<ul>
								<li>Comprar - MakeAnOrder</li>
								<li>99 - ShowNumberOfTicket</li>
								'. $favorito .'
								<li>Eventos Relacionados - FeaturedEvents</li>
							</ul>
							</li>
							<li>Energia na Véia Junina - Clube Juventus | Irecê-BA</li>
							<li>Dusk - Deep Love - Club 33 | São Paulo-SP</li>
							<li>Open Beer Festival - Paulínia | Paulínia-SP</li>
							<li>Véia Junina - Clube Juventus | Irecê-CE</li>
							<li>Deep Love - Club 33 | São Paulo-SP</li>
						</ul>
                    </body>
                </html>
            ');
		}
	}