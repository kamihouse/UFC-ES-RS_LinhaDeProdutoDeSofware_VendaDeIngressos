<?php
if(!isset($_SESSION)){
    session_start();
}

	class BOT{

		protected $mensagem = null;

        function init(){
            
        }
        
		function __construct(){
			# code...
		}


		public function exibeTelaBot(){

			print('
				<!DOCTYPE html>
                <html>
                    <head>
                        <meta charset="utf-8">
                        <title>Titulo - Suporte via BOT</title>
                    </head>
                    <body>
                        <h3><a href="../../">LPS - Venda de Ingressos</a> | Suporte via Bot</h3>
                        <hr>
                        <p>Esta é a opção de suporte via BOT. (Aqui são realizadas as perguntas pelo usuário e nosso BOT tenta reponde-las.)</p>
                        <form action="#" method="post">
                            '. $this->mensagem .'
                            <label for="login">Sua dúvida:</label>
                            <br>
                            <input type="text" name="login" />
                            <br><br>
                            <input type="submit" value="Enviar Mensagem" />

							<br><br>
                            <label for="mensagem">Janela de Respostas:</label>
                            <br>
                            <textarea name="mensagem" rows="5"></textarea>


                        </form>

                        <p><a href="./CustomerSupport.php?acao=suporte">Voltar para opções de suporte</a></p>
                    </body>
                </html>
			');
		}
	}