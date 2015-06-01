<?php
if(!isset($_SESSION)){
	session_start();
}

	// Pega acao do usuário
	$acao   = isset($_GET['acao']) ? $_GET['acao'] : null;
	$metodo = isset($_GET['metodo']) ? $_GET['metodo'] : null;

	// Trata ação do usuário
	switch($acao){
		case 'suporte':
			$suporte = new CustomerSupport();
			$suporte->exibeTelaSuporte();
			break;
		case 'bot':
			include_once 'BOT.php';
			$suporte = new BOT();
			$suporte->exibeTelaBot();
			break;
		case 'email':
			include_once 'Email_Support.php';
			$suporte = new Email_Support();
			$suporte->exibeTelaEmail();
			break;
		case 'chat':
			include_once 'Chat.php';
			$suporte = new Chat();
			$suporte->exibeTelaChat();
			break;
	}

	class CustomerSupport{

		protected $mensagem = null;
		protected $customizar = array('bot', 'email', 'chat'); // Alterar aqui para os módulos que o cliente escolher

        function init(){
            if(isset($GLOBALS['menu']))
				$GLOBALS['menu']['suporte']	= 'Suporte|Componentes/CustomerSupport/CustomerSupport.php?acao=suporte';
        }
        
		function __construct(){
			# code...
		}


		public function exibeTelaSuporte(){

			print('
			<!DOCTYPE html>
                <html>
                    <head>
                        <meta charset="utf-8">
                        <title>Titulo - Suporte</title>
                    </head>
                    <body>
                        <h3><a href="../../">LPS - Venda de Ingressos</a> | Suporte</h3>
                        <hr>
						<p>Selecione a opção de suporte que deseja utilizar abaixo.</p>
                        <ul>
			');

			if(in_array('bot', $this->customizar)){
				echo '<li><a href="./CustomerSupport.php?acao=bot">BOT</a></li>';
			}

			if(in_array('email', $this->customizar)){
				echo '<li><a href="./CustomerSupport.php?acao=email">Email</a></li>';
			}

			if(in_array('chat', $this->customizar)){
				echo '<li><a href="./CustomerSupport.php?acao=chat">Chat</a></li>';
			}

			print('
						</ul>
                    </body>
                </html>
			');
		}
	}