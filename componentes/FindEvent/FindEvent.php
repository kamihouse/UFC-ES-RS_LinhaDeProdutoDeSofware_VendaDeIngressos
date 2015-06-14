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
			$eventos = new FindEvent();
			$eventos->exibeEventos();
			break;
	}


	class FindEvent{
        function init(){
            if(isset($GLOBALS['menu']))
				$GLOBALS['menu']['buscar'] = 'Buscar Evento|Componentes/FindEvent/FindEvent.php?acao=exibe';
        }

		public function exibeEventos(){
            global $sc;
			$sessao = isset($_SESSION['nome']) ? $_SESSION['nome'] : null;

            $sc->pprint('head');
			?>
                <h3><a href="<?= $sc->base_url ?>">LPS - Venda de Ingressos</a> | Encontrar Eventos</h3>
                <hr>

                <p>Busque os eventos que desejar abaixo: <b><?= $sessao ?></b></p>

                <form action="#" method="post">
                    <label for="login">Nome do Evento:</label>
                    <input type="text" name="login" />

                    <br><br>
                    <label for="senha">Local do Evento:</label>
                    <input type="text" name="senha" />

                    <br><br>
                    <input type="submit" value="Encontrar evento" />
                </form>
			<?php

			if(!$sessao){
				echo '<p><a href="../../Componentes/Profile/Profile.php?acao=login">Clique aqui para fazer login</a> e melhorar sua busca.</p>';
			}

            $sc->pprint('loadjs');
		}
	}