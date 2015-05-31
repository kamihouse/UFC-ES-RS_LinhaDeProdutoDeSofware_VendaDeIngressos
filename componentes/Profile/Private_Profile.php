<?php
    // Pega acao do usuário
    $acao   = isset($_GET['acao']) ? $_GET['acao'] : null;
    $metodo = isset($_GET['metodo']) ? $_GET['metodo'] : null;

    // Trata ação do usuário
    switch($acao){
        case 'login':
            $login = new Private_Profile();
            $login->exibeTelaLogin();
            break;
        case 'usuarioLogado':
            $login = new Private_Profile();
            $login->exibeTelaUsuarioLogado();
            break;
        case 'cadastro':
            $login = new Private_Profile();
            $login->exibeTelaCadastro();
            break;
        case 'sair':
            $login = new Private_Profile();
            $login->sair();
            break;
    }


	class Private_Profile{

        protected $mensagem = null;

        function init(){
            if(isset($GLOBALS['menu'])){
                $GLOBALS['menu'][]           = 'Login';
                $GLOBALS['menu'][]           = 'Cadastre-se';
                $GLOBALS['menu']['login']    = '*Login|Componentes/Profile/Private_Profile.php?acao=login';
                $GLOBALS['menu']['cadastro'] = '*Cadastre-se|Componentes/Profile/Private_Profile.php?acao=cadastro';
            }
        }

		function __construct(){
			# code...
            //var_dump(get_defined_vars());
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
                    //Exibe tela para usuário logado
                    header("Location: ./Private_Profile.php?acao=usuarioLogado");

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
                        <form action="./Private_Profile.php?acao=login&metodo=submit" method="post">
                            '. $this->mensagem .'
                            <label for="login">Login:</label>
                            <input type="text" name="login" />

                            <label for="senha">Senha:</label>
                            <input type="text" name="senha" />

                            <input type="submit" value="Entrar" />
                        </form>

                        <p><a href="./Private_Profile.php?acao=cadastro">Me Cadastrar</a></p>
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
                        <title>Titulo - Bem vindo!</title>
                    </head>
                    <body>
                        <h3><a href="../../">LPS - Venda de Ingressos</a> | Bem vindo</h3>
                        <hr>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, accusantium ad at dolor dolore esse illo
                        ipsum laudantium minus molestiae officia porro provident, reprehenderit similique sit unde veritatis vero voluptas.</p>

                        <p><a href="./Private_Profile.php?acao=sair">Sair</a></p>
                    </body>
                </html>
            ');

        }


        /**
         * Exibe a janela de mensagem de saída.
         */
        public function sair(){

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
                        <form action="./Private_Profile.php?acao=login&metodo=submit" method="post">
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