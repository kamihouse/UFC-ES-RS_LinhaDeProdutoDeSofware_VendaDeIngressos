<?php
if(!isset($_SESSION)){
	session_start();
}

	class Public_Profile{
        function init(){
            
        }
        
		function __construct(){
			# code...
		}


		public function exibePerfilPublico(){

			print('
			<!DOCTYPE html>
                <html>
                    <head>
                        <meta charset="utf-8">
                        <title>LPS - Venda de Ingressos - Perfil Público</title>
                    </head>
                    <body>
                        <h3><a href="../../">LPS - Venda de Ingressos</a> | Perfil Público</h3>
                        <hr>
                        
                        <p><img src="http://images.all-free-download.com/images/graphiclarge/user_90302.jpg"></p>
                        <p>Nome Completo: '. $_SESSION['nome'] .'</p>
						<p>Sexo: '. $_SESSION['sexo'] .'</p>
						<p>Cidade: '. $_SESSION['cidade'] .'</p>
						<p>Telefone: '. $_SESSION['telefone'] .'</p>

						<hr>
                        <p>Voltar para <a href="Profile.php?acao=usuarioLogado">Perfil</a></p>
					</body>
				</html>
			');
		}
	}