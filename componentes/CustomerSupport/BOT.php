<?php
    require_once "../../sistema/SetupComponente.php";

    $sc = new SetupComponente();

    if(!isset($_SESSION)){
        session_start();
    }

	class BOT{
		protected $mensagem = null;

        function init(){
            
        }

		public function exibeTelaBot(){
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
                        <h4>Suporte - BOT</h4>
                        <p>
                            Venda de Ingressos Online - Suporte via BOT
                        </p>
                        <hr>

                        <div class="col-xs-3">
                            <p><img src="<?= $sc->base_url ?>assets/img/icons/svg/clocks.svg"></p>
                            <div class="btn-group">
                                <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" type="button">Opções disponíveis <span class="caret"></span></button>
                                <ul role="menu" class="dropdown-menu">
                                    <li><a href="./CustomerSupport.php?acao=suporte">Voltar para opções de Suporte</a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?= $sc->base_url ?>componentes/Profile/Profile.php?acao=sair">Sair</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-xs-9">
                            <h6>Janela de Chat com BOT</h6>
                            <form action="#" method="post">
                                <div class="form-group">
                                    <?= $this->mensagem ?>
                                </div>

                                <div class="form-group">
                                    <textarea name="mensagem" class="form-control" placeholder="Mensagens" rows="7">Carregando mensagens dos BOTs...</textarea>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="conteudo" value="" placeholder="Sua mensagem" class="form-control">
                                </div>

                                <input type="submit" class="btn btn-block btn-lg btn-primary" value="Enviar Mensagem" />
                            </form>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <br>
                </div>
            </div>
            <?php
            $sc->pprint('loadjs');
		}
	}