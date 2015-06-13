<?php
require_once "../../sistema/SetupComponente.php";

$sc = new SetupComponente();

if (!isset($_SESSION)) {
    session_start();
}

// Pega acao do usuário
$acao = isset($_GET['acao']) ? $_GET['acao'] : null;
$metodo = isset($_GET['metodo']) ? $_GET['metodo'] : null;

// Trata ação do usuário
switch ($acao) {
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


class Profile
{

    protected $mensagem = null;
    protected $customizar = array('publico', 'privado');


    function init()
    {
        if (isset($GLOBALS['menu'])) {
            $GLOBALS['menu']['login'] = 'Login|Componentes/Profile/Profile.php?acao=login';
            $GLOBALS['menu']['cadastro'] = 'Cadastre-se|Componentes/Profile/Profile.php?acao=cadastro';
        }
    }

    /**
     * Exibe a tela de login.
     */
    public function exibeTelaLogin()
    {
        // Acessando escopo fora da classe
        global $metodo;


        if ($metodo == 'submit') {
            $login = $_POST['login'];
            $senha = $_POST['senha'];

            if ($login == 'admin' AND $senha == 'admin') {
                // Registra sessão
                $_SESSION['login'] = 'admin';
                $_SESSION['nome'] = 'Thiago Pereira';
                $_SESSION['sexo'] = 'Masculino';
                $_SESSION['cidade'] = 'Quixadá - CE';
                $_SESSION['telefone'] = '(88) 9939-6187';
                $_SESSION['momento'] = date('d/m/Y H:i:s');
                $_SESSION['email'] = 'thiago@omradio.ml';
                $_SESSION['foto'] = 'gravatar.jpg';


                // Exibe tela para usuário logado
                header("Location: ./Profile.php?acao=usuarioLogado");

                exit();
            } if ($login == 'carla' AND $senha == 'carla') {
                // Registra sessão
                $_SESSION['login'] = 'carla';
                $_SESSION['nome'] = 'Carla Ilane M. Bezerra';
                $_SESSION['sexo'] = 'Feminino';
                $_SESSION['cidade'] = 'Fortaleza - CE';
                $_SESSION['telefone'] = '(89) 993-865-618';
                $_SESSION['momento'] = date('d/m/Y H:i:s');
                $_SESSION['email'] = 'carla@omradio.ml';
                $_SESSION['foto'] = 'gravatar1.jpg';


                    // Exibe tela para usuário logado
                    header("Location: ./Profile.php?acao=usuarioLogado");

                    exit();
            }
            else {
                $this->mensagem = '<span class="fui-info-circle"> <small>Verifique seu login e senha.</small></span>';
            }
        }

        global $sc;
        $sc->pprint('head');
        ?>
        <div class="container">
            <div class="logo">
                <h1>UFC RS - LPS<span>Venda de Ingressos</span>
                    <dt>2.0</dt>
                </h1>
            </div>

            <div class="col-xs-12">
                <div class="row">
                    <nav class="navbar navbar-inverse navbar-embossed" role="navigation">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                    data-target="#navbar-collapse-01">
                                <span class="sr-only">Toggle navigation</span>
                            </button>
                            <a class="navbar-brand" href="<?= $sc->base_url ?>">Bem Vindo &nbsp;&nbsp; </a>
                        </div>
                        <div class="collapse navbar-collapse" id="navbar-collapse-01">
                            <ul class="nav navbar-nav navbar-left">
                                <?php
                                if (isset($_SESSION['nome'])) {
                                    echo '<li>';
                                    echo '<a href="' . $sc->base_url . 'Componentes/Profile/Profile.php?acao=usuarioLogado">' . $_SESSION['nome'] . '<span class="navbar-unread">1</span></a>';
                                    echo '</li>';
                                }
                                ?>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Módulos do Sistema<b
                                            class="caret"></b></a>
                                    <span class="dropdown-arrow"></span>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?= $sc->base_url ?>">Home</a></li>
                                        <li class="divider"></li>
                                        <?php
                                        if (isset($GLOBALS['menu'])) {
                                            foreach ($GLOBALS['menu'] as $item) {
                                                $menulink = explode('|', $item);
                                                echo '<li><a href="' . $menulink[1] . '">' . $menulink[0] . '</a></li>';
                                            }
                                        }
                                        ?>
                                    </ul>
                                </li>
                                <li><a href="<?= $sc->base_url ?>sobre.php">Sobre Nós</a></li>
                            </ul>
                            <form class="navbar-form navbar-right" action="#" role="search">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input class="form-control" id="navbarInput-01" type="search"
                                               placeholder="Encontrar">
											<span class="input-group-btn">
											  <button type="submit" class="btn"><span class="fui-search"></span>
                                              </button>
											</span>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.navbar-collapse -->
                    </nav>
                    <!-- /navbar -->
                </div>

                <div class="row geral">
                    <h4>Login</h4>

                    <p>
                        Utilize seus dados pessoais abaixo para efetuar login e acessar nosso sistema
                    </p>

                    <form action="./Profile.php?acao=login&metodo=submit" method="post">
                        <div class="col-xs-4">
                            <div class="form-group">
                                <?= $this->mensagem ?>
                            </div>
                            <div class="form-group">
                                <input type="text" name="login" value="" placeholder="Login" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="password" name="senha" value="" placeholder="Senha" class="form-control">
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-block btn-lg btn-primary" value="Entrar"/>
                            </div>

                            <div class="form-group">
                                <a href="./Profile.php?acao=cadastro" class="btn btn-block btn-lg btn-default">Quero me
                                    Cadastrar</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <?php
        $sc->pprint('loadjs');
    }

    /**
     * Exibe a tela de Usuário já logado.
     */
    public function exibeTelaUsuarioLogado()
    {
        global $sc;
        $sc->pprint('head');
        ?>
        <div class="container">
            <div class="logo">
                <h1>UFC RS - LPS<span>Venda de Ingressos</span><dt>2.0</dt></h1>
            </div>

            <div class="col-xs-12">
                <div class="row">
                    <nav class="navbar navbar-inverse navbar-embossed" role="navigation">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                    data-target="#navbar-collapse-01">
                                <span class="sr-only">Toggle navigation</span>
                            </button>
                            <a class="navbar-brand" href="<?= $sc->base_url ?>">Bem Vindo &nbsp;&nbsp; </a>
                        </div>
                        <div class="collapse navbar-collapse" id="navbar-collapse-01">
                            <ul class="nav navbar-nav navbar-left">
                                <?php
                                if (isset($_SESSION['nome'])) {
                                    echo '<li>';
                                    echo '<a href="' . $sc->base_url . 'Componentes/Profile/Profile.php?acao=usuarioLogado">' . $_SESSION['nome'] . '<span class="navbar-unread">1</span></a>';
                                    echo '</li>';
                                }
                                ?>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Módulos do Sistema<b
                                            class="caret"></b></a>
                                    <span class="dropdown-arrow"></span>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?= $sc->base_url ?>">Home</a></li>
                                        <li class="divider"></li>
                                        <?php
                                        if (isset($GLOBALS['menu'])) {
                                            foreach ($GLOBALS['menu'] as $item) {
                                                $menulink = explode('|', $item);
                                                echo '<li><a href="' . $menulink[1] . '">' . $menulink[0] . '</a></li>';
                                            }
                                        }
                                        ?>
                                    </ul>
                                </li>
                                <li><a href="<?= $sc->base_url ?>sobre.php">Sobre Nós</a></li>
                            </ul>
                            <form class="navbar-form navbar-right" action="#" role="search">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input class="form-control" id="navbarInput-01" type="search"
                                               placeholder="Encontrar">
											<span class="input-group-btn">
											  <button type="submit" class="btn"><span class="fui-search"></span>
                                              </button>
											</span>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.navbar-collapse -->
                    </nav>
                </div>

                <div class="row geral">
                    <h4>Minha Conta</h4>
                    <p>
                        Abaixo estão suas informações pessoais registradas em nosso sistema, você pode modificar o que desesjar
                    </p>

                    <p>
                        <span class="fui-user"></span> <b>Usuário:</b> <?= $_SESSION['nome'] ?> - <a href="./Profile.php?acao=sair">Sair</a><br>
                        <span class="fui-calendar"></span> <b>Data login:</b> <?= $_SESSION['momento'] ?><br>
                    </p>
                    <hr>

                    <?php
                        if (in_array('publico', $this->customizar)):
                    ?>
                        <div class="col-xs-4">
                            <div class="demo-download">
                                <img src="<?= $sc->base_url ?>/assets/img/icons/svg/retina.svg">
                            </div>
                            <a href="./Profile.php?acao=exibePerfilPublico" class="btn btn-primary btn-lg btn-block">Exibir Perfil
                                Público</a>

                            <p class="demo-download-text">Entre aqui para visualizar seu perfil público em nosso sistema</p>
                        </div>
                    <?php
                        endif;
                    ?>


                    <?php
                        if (in_array('privado', $this->customizar)):
                    ?>
                        <div class="col-xs-4">
                            <div class="demo-download">
                                <img src="<?= $sc->base_url ?>/assets/img/icons/svg/book.svg">
                            </div>
                            <a href="./Profile.php?acao=exibePerfilPrivado" class="btn btn-danger btn-lg btn-block">Exibir Perfil
                                Privado</a>

                            <p class="demo-download-text">Entre aqui para visualizar seu perfil privado em nosso sistema</p>
                        </div>
                    <?php
                        endif;
                    ?>
                </div>
            </div>
        </div>
        <?php
        $sc->pprint('loadjs');
    }


    /**
     * Exibe a janela de mensagem de saída.
     */
    public function sair()
    {
        session_destroy();
        global $sc;
        $sc->pprint('head');
        ?>
        <META http-equiv="refresh" content="3;URL=<?= $sc->base_url ?>">

        <div class="container">
            <div class="logo">
                <h1>UFC RS - LPS<span>Venda de Ingressos</span>
                    <dt>2.0</dt>
                </h1>
            </div>

            <div class="col-xs-12">
                <div class="row">
                    <nav class="navbar navbar-inverse navbar-embossed" role="navigation">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                    data-target="#navbar-collapse-01">
                                <span class="sr-only">Toggle navigation</span>
                            </button>
                            <a class="navbar-brand" href="<?= $sc->base_url ?>">Bem Vindo &nbsp;&nbsp; </a>
                        </div>
                        <div class="collapse navbar-collapse" id="navbar-collapse-01">
                            <ul class="nav navbar-nav navbar-left">
                                <?php
                                if (isset($_SESSION['nome'])) {
                                    echo '<li>';
                                    echo '<a href="' . $sc->base_url . 'Componentes/Profile/Profile.php?acao=usuarioLogado">' . $_SESSION['nome'] . '<span class="navbar-unread">1</span></a>';
                                    echo '</li>';
                                }
                                ?>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Módulos do Sistema<b
                                            class="caret"></b></a>
                                    <span class="dropdown-arrow"></span>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?= $sc->base_url ?>">Home</a></li>
                                        <li class="divider"></li>
                                        <?php
                                        if (isset($GLOBALS['menu'])) {
                                            foreach ($GLOBALS['menu'] as $item) {
                                                $menulink = explode('|', $item);
                                                echo '<li><a href="' . $menulink[1] . '">' . $menulink[0] . '</a></li>';
                                            }
                                        }
                                        ?>
                                    </ul>
                                </li>
                                <li><a href="<?= $sc->base_url ?>sobre.php">Sobre Nós</a></li>
                            </ul>
                            <form class="navbar-form navbar-right" action="#" role="search">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input class="form-control" id="navbarInput-01" type="search"
                                               placeholder="Encontrar">
											<span class="input-group-btn">
											  <button type="submit" class="btn"><span class="fui-search"></span>
                                              </button>
											</span>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.navbar-collapse -->
                    </nav>
                    <!-- /navbar -->
                </div>

                <div class="row geral">
                    <h4>Logoff</h4>

                    <div class="col-xs-12">
                        <p>
                            Aguarde...<br>
                            Estamos encerrando sua sessão ativa...
                        </p>
                        <img src="<?= $sc->base_url ?>assets/img/loading.gif" />
                    </div>

                </div>
            </div>
        </div>
        <?php
        $sc->pprint('loadjs');
    }

    /**
     * Exibe a tela de cadastro de usuário
     */
    public function exibeTelaCadastro()
    {
        global $sc;
        $sc->pprint('head');
        ?>
        <div class="container">
            <div class="logo">
                <h1>UFC RS - LPS<span>Venda de Ingressos</span>
                    <dt>2.0</dt>
                </h1>
            </div>

            <div class="col-xs-12">
                <div class="row">
                    <nav class="navbar navbar-inverse navbar-embossed" role="navigation">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                    data-target="#navbar-collapse-01">
                                <span class="sr-only">Toggle navigation</span>
                            </button>
                            <a class="navbar-brand" href="<?= $sc->base_url ?>">Bem Vindo &nbsp;&nbsp; </a>
                        </div>
                        <div class="collapse navbar-collapse" id="navbar-collapse-01">
                            <ul class="nav navbar-nav navbar-left">
                                <?php
                                if (isset($_SESSION['nome'])) {
                                    echo '<li>';
                                    echo '<a href="' . $sc->base_url . 'Componentes/Profile/Profile.php?acao=usuarioLogado">' . $_SESSION['nome'] . '<span class="navbar-unread">1</span></a>';
                                    echo '</li>';
                                }
                                ?>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Módulos do Sistema<b
                                            class="caret"></b></a>
                                    <span class="dropdown-arrow"></span>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?= $sc->base_url ?>">Home</a></li>
                                        <li class="divider"></li>
                                        <?php
                                        if (isset($GLOBALS['menu'])) {
                                            foreach ($GLOBALS['menu'] as $item) {
                                                $menulink = explode('|', $item);
                                                echo '<li><a href="' . $menulink[1] . '">' . $menulink[0] . '</a></li>';
                                            }
                                        }
                                        ?>
                                    </ul>
                                </li>
                                <li><a href="<?= $sc->base_url ?>sobre.php">Sobre Nós</a></li>
                            </ul>
                            <form class="navbar-form navbar-right" action="#" role="search">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input class="form-control" id="navbarInput-01" type="search"
                                               placeholder="Encontrar">
											<span class="input-group-btn">
											  <button type="submit" class="btn"><span class="fui-search"></span>
                                              </button>
											</span>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.navbar-collapse -->
                    </nav>
                    <!-- /navbar -->
                </div>

                <div class="row geral">
                    <h4>Cadastro</h4>
                    <p>
                        Utilize seus dados pessoais abaixo para efetuar seu cadastro e acessar nosso sistema
                    </p>

                    <form action="./Profile.php?acao=cadastro&metodo=submit" method="post">
                        <div class="col-xs-4">
                            <div class="form-group">
                                <?= $this->mensagem ?>
                            </div>
                            <div class="form-group">
                                <input type="text" name="login" value="" placeholder="Login" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="password" name="senha" value="" placeholder="Senha" class="form-control">
                            </div>
                            <hr>
                            <div class="form-group">
                                <input type="password" name="nome" value="" placeholder="Nome Completo"
                                       class="form-control">
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-block btn-lg btn-primary" value="Cadastrar"/>
                            </div>
                            <div class="form-group">
                                <a href="./Profile.php?acao=login" class="btn btn-block btn-lg btn-info">Já possuo um Login</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
        $sc->pprint('loadjs');
    }
}