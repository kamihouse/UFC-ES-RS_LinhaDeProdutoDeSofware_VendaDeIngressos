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
						<h4>Suporte</h4>
						<p>
							Selecione as opção de suporte disponíveis abaixo em nosso sistema que você deseja utilizar
						</p>

						<hr>

						<?php
						if (in_array('bot', $this->customizar)):
						?>
							<div class="col-xs-4">
								<div class="demo-download">
									<img src="<?= $sc->base_url ?>/assets/img/icons/svg/clocks.svg">
								</div>
								<a href="./CustomerSupport.php?acao=bot" class="btn btn-primary btn-lg btn-block">BOT</a>

								<p class="demo-download-text">Clique para Suporte via BOT</p>
							</div>
						<?php
						endif;
						?>

						<?php
						if (in_array('email', $this->customizar)):
						?>
							<div class="col-xs-4">
								<div class="demo-download">
									<img src="<?= $sc->base_url ?>/assets/img/icons/svg/mail.svg">
								</div>
								<a href="./CustomerSupport.php?acao=email" class="btn btn-primary btn-lg btn-block">Email</a>

								<p class="demo-download-text">Clique para Suporte via Email</p>
							</div>
						<?php
						endif;
						?>

						<?php
						if (in_array('chat', $this->customizar)):
							?>
							<div class="col-xs-4">
								<div class="demo-download">
									<img src="<?= $sc->base_url ?>/assets/img/icons/svg/clipboard.svg">
								</div>
								<a href="./CustomerSupport.php?acao=chat" class="btn btn-primary btn-lg btn-block">Chat</a>
								<p class="demo-download-text">Clique para Suporte via Chat</p>
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
	}