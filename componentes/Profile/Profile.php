<?php
    require_once "../../sistema/SetupComponente.php";

    $sc = new SetupComponente();

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
				$GLOBALS['menu']['login']    = 'Login|Componentes/Profile/Profile.php?acao=login';
				$GLOBALS['menu']['cadastro'] = 'Cadastre-se|Componentes/Profile/Profile.php?acao=cadastro';
			}
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

            global $sc;
            $sc->pprint('head');
            ?>
                <h3><a href="<?= $sc->base_url ?>">LPS - Venda de Ingressos</a></h3>
                <hr>
			<?php

			if(isset($_SESSION['nome'])){
				echo '<br>Olá <b>'. $_SESSION['nome'] .'</b> você já está logado. <a href="./Profile.php?acao=usuarioLogado">Clique Aqui</a> para ir para sua home page.<br><br>' ;
			}

			?>
                <form action="./Profile.php?acao=login&metodo=submit" method="post">
                    <?= $this->mensagem ?>
                    <label for="login">Login:</label>
                    <input type="text" name="login" />

                    <label for="senha">Senha:</label>
                    <input type="text" name="senha" />

                    <input type="submit" value="Entrar" />
                </form>

                <p><a href="./Profile.php?acao=cadastro">Me Cadastrar</a></p>
            <?php
            $sc->pprint('loadjs');
		}

		/**
		 * Exibe a tela de Usuário já logado.
		 */
		public function exibeTelaUsuarioLogado(){
            global $sc;
            $sc->pprint('head');
			?>
                <h3><a href="<?= $sc->base_url ?>">LPS - Venda de Ingressos</a> | Bem vindo <?= $_SESSION['nome'] ?></h3>
                <hr>
                <p>
                    <b>Usuário:</b> <?= $_SESSION['nome'] ?><br>
                    <b>Data login:</b> <?= $_SESSION['momento'] ?><br>
                </p>
                <br>

                <p>
                    - Acesse as opções de Perfil abaixo:
                </p>

                <ul>
			<?php

			if(in_array('publico', $this->customizar)){
				echo '<li><a href="./Profile.php?acao=exibePerfilPublico">Exibir Perfil Público</a></li>';
			}

			if(in_array('privado', $this->customizar)){
				echo '<li><a href="./Profile.php?acao=exibePerfilPrivado">Exibir Perfil Privado</a></li>';
			}


			?>
                </ul>
                <p><a href="./Profile.php?acao=sair">Sair</a></p>
            <?php
            $sc->pprint('head');
		}


		/**
		 * Exibe a janela de mensagem de saída.
		 */
		public function sair(){
			session_destroy();
            global $sc;
            $sc->pprint('head');
			?>
                <h3><a href="<?= $sc->base_url ?>">LPS - Venda de Ingressos</a> | Login encerrado</h3>
                <hr>
                <p>Aguarde para ser redirecionado para a página principal</p>
            <?php
            $sc->pprint('loadjs');
		}

		/**
		 * Exibe a tela de cadastro de usuário
		 */
		public function exibeTelaCadastro(){
            global $sc;
            $sc->pprint('head');
            ?>
                <h3><a href="<?= $sc->base_url ?>">LPS - Venda de Ingressos</a> | Cadastro de Usuário</h3>
                <hr>
                <form action="./Profile.php?acao=login&metodo=submit" method="post">
                    <?= $this->mensagem ?>
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
            <?php
            $sc->pprint('loadjs');
		}
	}