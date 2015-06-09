<?php
	if(!isset($_SESSION)){
		session_start();
	}

	class AddToFavorites{
        function init(){
            
        }
        
		function __construct(){
			# code...
		}

		public function exibeTelaFavoritos(){
			$sessao = isset($_SESSION['nome']) ? $_SESSION['nome'] : null;
			print('
                <!DOCTYPE html>
                <html>
                    <head>
                        <meta charset="utf-8">
                        <title>LPS - Venda de Ingressos - Adicionado aos Favoritos</title>
                        </head>
                    <body>
                        <h3><a href="../../">LPS - Venda de Ingressos</a> | Adicionado aos Favoritos</h3>
                        <hr>

                        <p>Add aos favoritos: <b>'. $sessao .'</b></p>

						<p><b>Evento adicionado aos favoritos com sucesso!</b></p>

						<p><a href="ListAvailableEvents.php?acao=listar">Voltar para Eventos Sugeridos</a></p>
                    </body>
                </html>
            ');

		}
	}