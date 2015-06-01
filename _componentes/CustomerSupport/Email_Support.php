<?php
if(!isset($_SESSION)){
    session_start();
}

	class Email_Support{

		protected $mensagem = null;

        function init(){
            
        }
        
		function __construct(){
			# code...
		}


		public function exibeTelaEmail(){

			print('
				<!DOCTYPE html>
                <html>
                    <head>
                        <meta charset="utf-8">
                        <title>Titulo - Suporte via Email</title>
                    </head>
                    <body>
                        <h3><a href="../../">LPS - Venda de Ingressos</a> | Suporte via Email</h3>
                        <hr>
                        <p>Esta é a opção de suporte via Email.</p>

                        <p>Envie um email com sua dúvida para: <b>contato@suporte.com.br</b></p>

                        <p><a href="./CustomerSupport.php?acao=suporte">Voltar para opções de suporte</a></p>
                    </body>
                </html>
			');
		}
	}