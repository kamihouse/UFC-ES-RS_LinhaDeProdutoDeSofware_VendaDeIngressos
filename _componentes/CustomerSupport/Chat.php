<?php
if(!isset($_SESSION)){
    session_start();
}

	class Chat{

		protected $mensagem = null;

        function init(){
            
        }
        
		function __construct(){
			# code...
		}


		public function exibeTelaChat(){

			print('
				<!DOCTYPE html>
                <html>
                    <head>
                        <meta charset="utf-8">
                        <title>Titulo - Suporte via Chat</title>
                    </head>
                    <body>
                        <h3><a href="../../">LPS - Venda de Ingressos</a> | Suporte via Chat</h3>
                        <hr>
                        <p>Esta é a opção de suporte via Chat.</p>
                        <form action="#" method="post">
                            '. $this->mensagem .'

                            <label for="mensagem">Janela de Chat:</label>
                            <br>
                            <textarea name="mensagem" rows="15" cols="50"></textarea>

							<br><br>
							<label for="duvida">Sua dúvida:</label>
                            <br>
                            <input type="text" name="login" />
							<br><br>
                            <input type="submit" value="Enviar Mensagem" />
                        </form>

                        <p><a href="./CustomerSupport.php?acao=suporte">Voltar para opções de suporte</a></p>
                    </body>
                </html>
			');
		}
	}