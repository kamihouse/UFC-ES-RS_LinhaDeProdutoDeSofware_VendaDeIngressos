<?php
    require_once "../../sistema/SetupComponente.php";

    $sc = new SetupComponente();

    if(!isset($_SESSION)){
        session_start();
    }

	class Email_Support{

		protected $mensagem = null;

        function init(){
            
        }

		public function exibeTelaEmail(){
            global $sc;
            $sc->pprint('head');
            ?>
            <div class="container">
				<div class="logo">
					<h1>UFC RS - LPS<span>Venda de Ingressos</span><dt>2.0</dt></h1>
				</div>

				<div class="col-xs-12">
                    <?php $sc->pprint('row_menu'); ?>
					<div class="row geral">
						<h4>Suporte - Email</h4>
						<p>
							Venda de Ingressos Online - Suporte via Email
						</p>
						<hr>

                        <div class="col-xs-12">
                            <p><img src="<?= $sc->base_url ?>assets/img/icons/svg/mail.svg"></p>
                            <p>Envie um email com sua dúvida para: <b>contato@suporte.com.br</b></p>

                            <div class="btn-group">
                                <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" type="button">Opções disponíveis <span class="caret"></span></button>
                                <ul role="menu" class="dropdown-menu">
                                    <li><a href="./CustomerSupport.php?acao=suporte">Voltar para opções de Suporte</a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?= $sc->base_url ?>componentes/Profile/Profile.php?acao=sair">Sair</a></li>
                                </ul>
                            </div>
                        </div>
					</div>
				</div>
			</div>
            <?php
            $sc->pprint('loadjs');
		}
	}