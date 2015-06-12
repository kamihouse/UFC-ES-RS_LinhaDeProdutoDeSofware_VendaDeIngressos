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
                <h3><a href="<?= $sc->base_url ?>">LPS - Venda de Ingressos</a> | Promoções de Eventos</h3>
                <hr>

                <p>Todas as promoções estão listadas abaixo:</p>

                <ul>
                    <li><span style="color: red">30%</span> - Open Beer Festival - Premium Paulínia | Paulínia-SP</li>
                    <li><span style="color: red">10%</span> - Energia na Véia Junina - Clube Juventus | Irecê-BA</li>
                    <li><span style="color: red">40%</span> - Dusk - Deep Love - Club 33 | São Paulo-SP</li>
                </ul>
            <?php

			if(!$sessao){
				echo '<p><a href="../../Componentes/Profile/Profile.php?acao=login">Clique aqui para fazer login</a> e exibir as promoções para o seu perfil.</p>';
			}

            $sc->pprint('loadjs');
		}
	}