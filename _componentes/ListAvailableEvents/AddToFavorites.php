<?php
    require_once "../../sistema/SetupComponente.php";

    $sc = new SetupComponente();

	if(!isset($_SESSION)){
		session_start();
	}

	class AddToFavorites{
        function init(){
            
        }

		public function exibeTelaFavoritos(){
            global $sc;
			$sessao = isset($_SESSION['nome']) ? $_SESSION['nome'] : null;

            if(!isset($sessao)){
                $this->exibeTelaSolicitaLogin();
                die();
            }

            $sc->pprint('head');
			?>
            <div class="container">
                <div class="logo">
                    <h1>UFC RS - LPS<span>Venda de Ingressos</span><dt>2.0</dt></h1>
                </div>

                <div class="col-xs-12">
                    <?php $sc->pprint('row_menu'); ?>
                    <div class="row geral">
                        <h4>Eventos Disponíveis - Add Favoritos</h4>
                        <p>
                            Venda de Ingressos Online - Adicionar aos Favoritos <?= empty($sessao) ? '' : 'para <b>' . $sessao ?></b>
                        </p>
                        <hr>

                        <img src="<?= base_url() ?>assets/img/icons/svg/book.svg" alt="Pensils">
                        <br><br>
                        <p><span class="fui-check-circle"></span> Evento adicionado aos <b>Favoritos</b> com sucesso!<br>
                        Obrigado por adicionar este eventos à seus Favoritos. Utilize o botão abaixo para voltar para página anterior.</p>

                        <hr>
                        <div class="row col-xs-3">
                            <a href="ListAvailableEvents.php?acao=listar" class="btn btn-block btn-lg btn-inverse">Voltar para Eventos</a>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            $sc->pprint('loadjs');
		}


        public function exibeTelaSolicitaLogin(){
            global $sc;
            $sessao = isset($_SESSION['nome']) ? $_SESSION['nome'] : null;

            $sc->pprint('head');
            ?>
            <div class="container">
                <div class="logo">
                    <h1>UFC RS - LPS<span>Venda de Ingressos</span><dt>2.0</dt></h1>
                </div>

                <div class="col-xs-12">
                    <?php $sc->pprint('row_menu'); ?>
                    <div class="row geral">
                        <h4>Eventos Disponíveis - Add Favoritos</h4>
                        <p>
                            Venda de Ingressos Online - Adicionar aos Favoritos
                        </p>
                        <hr>

                        <div class="col-xs-12">
                            <p>
                                <b><span class="fui-alert-circle"></span> Atenção!</b><br>
                                Você precisa estar logado no sistema para adicionar esse evento aos seus favoritos.</p>

                            <div class="row col-xs-4">
                                <a href="<?= $sc->base_url ?>componentes/Profile/Profile.php?acao=login" class="btn btn-block btn-lg btn-default">Efeturar Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $sc->pprint('loadjs');
        }
	}