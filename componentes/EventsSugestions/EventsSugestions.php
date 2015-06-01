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
			$eventos = new EventsSugestions();
			$eventos->exibeSugestoes();
			break;
	}

	class EventsSugestions{
        function init(){
            if(isset($GLOBALS['menu']))
				$GLOBALS['menu']['sugestao']	= 'Eventos para você|Componentes/EventsSugestions/EventsSugestions.php?acao=exibe';
        }
        
		function __construct(){
			# code...
		}

		public function exibeSugestoes(){
			$sessao = isset($_SESSION['nome']) ? $_SESSION['nome'] : null;
			$conteudo = ('
			<!DOCTYPE html>
			<html>
				<head>
					<meta charset="utf-8">
					<title>LPS - Venda de Ingressos - Sugestão de Evendos</title>
				</head>
				<body>
					<h3><a href="../../">LPS - Venda de Ingressos</a> | Sugestão de Eventos</h3>
					<hr>

					<p>Eventos sugeridos para você: <b>'. $sessao .'</b></p>

					<ul>
						<li>Open Beer Festival - Premium Paulínia | Paulínia-SP</li>
						<li>Energia na Véia Junina - Clube Juventus | Irecê-BA</li>
						<li>Dusk - Deep Love - Club 33 | São Paulo-SP</li>
					</ul>
				</body>
			</html>
			');

			if(isset($sessao)){
				print $conteudo;
			} else {
				print '
				<h3><a href="../../">LPS - Venda de Ingressos</a> | Sugestão de Eventos</h3>
				<p>Você precisa estar logado para visualizar nossas sugestões.</p>
				<p><a href="../../Componentes/Profile/Profile.php?acao=login">Clique aqui para fazer login</a></p>
				';
			}
		}
	}