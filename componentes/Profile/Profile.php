<?php
if(!isset($_SESSION)){
	session_start();
}

	// Pega acao do usuário
	$acao   = isset($_GET['acao']) ? $_GET['acao'] : null;
	$metodo = isset($_GET['metodo']) ? $_GET['metodo'] : null;

	// Trata ação do usuário
	switch($acao){
		case 'login':
			$login = new Profile();
			$login->exibeTelaLogin();
			break;
		case 'usuarioLogado':
			$login = new Profile();
			$login->exibeTelaUsuarioLogado();
			break;
		case 'cadastro':
			$login = new Profile();
			$login->exibeTelaCadastro();
			break;
		case 'sair':
			$login = new Profile();
			$login->sair();
			break;

		case 'exibePerfilPublico':
			include_once 'Public_Profile.php';
			$login = new Public_Profile();
			$login->exibePerfilPublico();
			break;
		case 'exibePerfilPrivado':
			include_once 'Private_Profile.php';
			$login = new Private_Profile();
			$login->exibePerfilPrivado();
			break;
	}


	class Profile{

		protected $mensagem = null;
		protected $customizar = array('publico', 'privado');

        function init(){
			if(isset($GLOBALS['menu'])){
				$GLOBALS['menu'][]           = 'Login';
				$GLOBALS['menu']['login']    = '*Login|Componentes/Profile/Profile.php?acao=login';
				$GLOBALS['menu'][]           = 'Cadastre-se';
				$GLOBALS['menu']['cadastro'] = '*Cadastre-se|Componentes/Profile/Profile.php?acao=cadastro';
			}
        }
        
		function __construct(){
			# code...
		}


		/**
		 * Exibe a tela de login.
		 */
		public function exibeTelaLogin(){
			// Acessando escopo fora da classe
			global $metodo;


			if($metodo == 'submit'){
				$login = $_POST['login'];
				$senha = $_POST['senha'];

				if($login == 'admin' AND $senha == 'admin'){
					// Registra sessão
					$_SESSION['login']      = 'admin';
					$_SESSION['nome']       = 'Thiago Pereira';
					$_SESSION['sexo']    	= 'Masculino';
					$_SESSION['cidade']    	= 'Quixadá';
					$_SESSION['telefone']   = '(88) 9939-6187';
					$_SESSION['momento']    = date('d/m/Y H:i:s');


					// Exibe tela para usuário logado
					header("Location: ./Profile.php?acao=usuarioLogado");

					exit();
				} else {
					$this->mensagem = '<p>Erro de autenticação, verifique seu login e senha.</p>';
				}
			}

			print('
                <!DOCTYPE html>
                <html>
                    <head>
                        <meta charset="utf-8">
                        <title>Titulo - Login</title>
                    </head>
                    <body>
                        <h3><a href="../../">LPS - Venda de Ingressos</a></h3>
                        <hr>
                        <form action="./Profile.php?acao=login&metodo=submit" method="post">
                            '. $this->mensagem .'
                            <label for="login">Login:</label>
                            <input type="text" name="login" />

                            <label for="senha">Senha:</label>
                            <input type="text" name="senha" />

                            <input type="submit" value="Entrar" />
                        </form>

                        <p><a href="./Profile.php?acao=cadastro">Me Cadastrar</a></p>
                    </body>
                </html>
            ');
		}


		/**
		 * Exibe a tela de Usuário já logado.
		 */
		public function exibeTelaUsuarioLogado(){

			print('
                <!DOCTYPE html>
                <html>
                    <head>
                        <meta charset="utf-8">
                        <title>Titulo - Bem vindo</title>
                    </head>
                    <body>
                        <h3><a href="../../">LPS - Venda de Ingressos</a> | Bem vindo '. $_SESSION['nome'] .'</h3>
                        <hr>
                        <p>
                            <b>Usuário:</b> '. $_SESSION['nome'] .'<br>
                            <b>Data login:</b> '. $_SESSION['momento'] .'<br>
                        </p>
                        <br>

                        <p>
                            - Acesse as opções de Perfil abaixo:
                        </p>

                        <ul>
			');

			if(in_array('publico', $this->customizar)){
				echo '<li><a href="./Profile.php?acao=exibePerfilPublico">Exibir Perfil Público</a></li>';
			}

			if(in_array('privado', $this->customizar)){
				echo '<li><a href="./Profile.php?acao=exibePerfilPrivado">Exibir Perfil Privado</a></li>';
			}


			print('
						</ul>
                        <p><a href="./Profile.php?acao=sair">Sair</a></p>
                    </body>
                </html>
            ');

		}


		/**
		 * Exibe a janela de mensagem de saída.
		 */
		public function sair(){
			session_destroy();

			print('
                <!DOCTYPE html>
                <html>
                    <head>
                        <meta charset="utf-8">
                        <title>Titulo - Sessão encerrada com sucesso</title>

                        <META http-equiv="refresh" content="3; URL=../../">
                    </head>
                    <body>
                        <h3>LPS - Venda de Ingressos | Login encerrado</h3>
                        <hr>
                        <p>Aguarde para ser redirecionado para a página principal</p>
                    </body>
                </html>
            ');
		}


		/**
		 * Exibe a tela de cadastro de usuário
		 */
		public function exibeTelaCadastro(){

			print('
                <!DOCTYPE html>
                <html>
                    <head>
                        <meta charset="utf-8">
                        <title>Titulo - Cadastro de Usuário</title>
                        </head>
                    <body>
                        <h3><a href="../../">LPS - Venda de Ingressos</a> | Cadastro de Usuário</h3>
                        <hr>
                        <form action="./Profile.php?acao=login&metodo=submit" method="post">
                            '. $this->mensagem .'
                            <label for="login">Login:</label>
                            <input type="text" name="login" />
                            <br>
                            <label for="senha">Senha:</label>
                            <input type="text" name="senha" />
                            <br>
                            <label for="nome">Nome Completo:</label>
                            <input type="text" name="nome" />
                            <br>
                            <input type="submit" value="Cadastrar" />
                        </form>
                    </body>
                </html>
            ');
		}
	}