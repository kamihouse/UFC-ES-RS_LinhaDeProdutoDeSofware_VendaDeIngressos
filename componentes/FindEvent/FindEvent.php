<?php
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
                $GLOBALS['menu'][] = 'Buscar Evento';
				$GLOBALS['menu']['buscar'] = '*Buscar Evento|Componentes/FindEvent/FindEvent.php?acao=exibe';
        }
        
		function __construct(){
			# code...
		}


		public function exibeEventos(){
			$sessao = isset($_SESSION['nome']) ? $_SESSION['nome'] : null;

			print('
			<!DOCTYPE html>
			<html>
				<head>
					<meta charset="utf-8">
					<title>LPS - Venda de Ingressos - Encontrar Eventos</title>
				</head>
				<body>
					<h3><a href="../../">LPS - Venda de Ingressos</a> | Encontrar Eventos</h3>
					<hr>

					<p>Busque os eventos que desejar abaixo: <b>'. $sessao .'</b></p>

					<form action="#" method="post">
                            <label for="login">Nome do Evento:</label>
                            <input type="text" name="login" />

							<br><br>
                            <label for="senha">Local do Evento:</label>
                            <input type="text" name="senha" />

							<br><br>
                            <input type="submit" value="Encontrar evento" />
                        </form>
				</body>
			</html>
			');


			if(!$sessao){
				echo '<p><a href="../../Componentes/Profile/Profile.php?acao=login">Clique aqui para fazer login</a> e melhorar sua busca.</p>';
			}
		}
	}