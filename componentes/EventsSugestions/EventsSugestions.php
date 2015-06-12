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
		case 'exibe':
			$eventos = new EventsSugestions();
			$eventos->exibeSugestoes();
			break;
	}

	class EventsSugestions{
        function init(){
            if(isset($GLOBALS['menu']))
				$GLOBALS['menu']['sugestao']	= 'Eventos para você|Componentes/EventsSugestions/EventsSugestions.php?acao=exibe';
        }

		public function exibeSugestoes(){
			$sessao = isset($_SESSION['nome']) ? $_SESSION['nome'] : null;
            global $sc;

            $sc->pprint('head');

			if(isset($sessao)){
                ?>
                    <h3><a href="<?= $sc->base_url ?>">LPS - Venda de Ingressos</a> | Sugestão de Eventos</h3>
                    <hr>

                    <p>Eventos sugeridos para você: <b><?= $sessao ?></b></p>

                    <ul>
                        <li>Open Beer Festival - Premium Paulínia | Paulínia-SP</li>
                        <li>Energia na Véia Junina - Clube Juventus | Irecê-BA</li>
                        <li>Dusk - Deep Love - Club 33 | São Paulo-SP</li>
                    </ul>
                <?php
            } else {
                ?>
                    <h3><a href="<?= $sc->base_url ?>">LPS - Venda de Ingressos</a> | Sugestão de Eventos</h3>
                    <p>Você precisa estar logado para visualizar nossas sugestões.</p>
                    <p><a href="<?= $sc->base_url ?>Componentes/Profile/Profile.php?acao=login">Clique aqui para fazer login</a></p>
                <?php
			}

            $sc->pprint('loadjs');
		}
	}