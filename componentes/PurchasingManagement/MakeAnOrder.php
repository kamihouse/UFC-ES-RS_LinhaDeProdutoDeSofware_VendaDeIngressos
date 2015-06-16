<?php
    require_once "../../sistema/SetupComponente.php";

    $sc = new SetupComponente();

	if(!isset($_SESSION)){
		session_start();
	}

	class MakeAnOrder{
        function init(){
            
        }

        public function comprar(){
            $sessao = isset($_SESSION['nome']) ? $_SESSION['nome'] : null;
            $pm = new PurchasingManagement();
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
                        <h4>Eventos Disponíveis - Comprar</h4>
                        <p>
                            Venda de Ingressos Online - Comprar Evento <?= empty($sessao) ? '' : 'por <b>' . $sessao ?></b>
                        </p>
                        <hr>

                        <div class="col-xs-2">
                            <img src="<?= base_url() ?>assets/img/icons/svg/paper-bag.svg" alt="Pocket">
                        </div>

                        <div class="row col-xs-7">
                            <?php
                                if(in_array('CategoryOfTickets', $pm->customizar)){
                                    $aux = new CategoryOfTickets();
                                    ?>
                                        <h6 class="demo-panel-title">Selecione o tipo de seu ingresso: </h6>
                                    <?php
                                    $aux->imprimeCategorias();
                                }
                            ?>
                            <div class="row col-xs-7">
                                <h6 class="demo-panel-title">Selecione o tipo de pagamento: </h6>
                                <?php
                                    foreach($pm->metodosPagamento as $metodo){
                                        echo '<a href="'. base_url() .'componentes/PurchasingManagement/PurchasingManagement.php?acao=compraRealizada'. ($metodo == "Boleto Bancario" ? '&metodo=bb' : '') .'" class="btn btn-block btn-lg btn-inverse">'. $metodo .'</a>';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $sc->pprint('loadjs');
        }

		public function compraRealizada(){
			$sessao = isset($_SESSION['nome']) ? $_SESSION['nome'] : null;

			global $sc;

            global $metodo;

            $sc->pprint('head');

            if(!isset($sessao) AND $metodo != 'bb'){
                $this->exibeTelaSolLogin();
                die();
            }
			?>
			<div class="container">
				<div class="logo">
					<h1>UFC RS - LPS<span>Venda de Ingressos</span><dt>2.0</dt></h1>
				</div>

				<div class="col-xs-12">
					<?php $sc->pprint('row_menu'); ?>
					<div class="row geral">
						<h4>Eventos Disponíveis - Compra realizada</h4>
						<p>
							Venda de Ingressos Online - Comprar Evento <?= empty($sessao) ? '' : 'por <b>' . $sessao ?></b>
						</p>
						<hr>

						<div class="col-xs-2">
							<img src="<?= base_url() ?>assets/img/icons/svg/paper-bag.svg" alt="Pocket">
						</div>

						<div class="col-xs-6">
							<p>
                                <span class="fui-info-circle"></span> Evento comprado com sucesso!
							    <small>(Utilize o botão abaixo para voltar para os Eventos)</small>
                            </p>
                            <div class="row col-xs-7">
                                <a href="<?= base_url() ?>componentes/ListAvailableEvents/ListAvailableEvents.php?acao=listar" class="btn btn-block btn-lg btn-inverse">Voltar para Eventos</a>
                                <a href="<?= base_url() ?>componentes/ReceivingMethods/ReceivingMethods.php?acao=imprimeVoucher" class="btn btn-block btn-lg btn-success">Imprimir Voucher</a>
                            </div>
						</div>
					</div>
				</div>
			</div>
			<?php
			$sc->pprint('loadjs');
		}


        public function exibeTelaSolLogin(){
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
                        <h4>Compra de Ingressos</h4>
                        <p>
                            Venda de Ingressos Online
                        </p>
                        <hr>

                        <div class="col-xs-12">
                            <p>
                                <b><span class="fui-alert-circle"></span> Atenção!</b><br>
                                Você precisa estar logado para realizar esta operação.</p>

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