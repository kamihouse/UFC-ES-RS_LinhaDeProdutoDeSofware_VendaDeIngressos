<?php
	class WaitList{
        function init(){
            
        }
        
		public function exibeLista(){
            $sessao = isset($_SESSION['nome']) ? $_SESSION['nome'] : null;

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
                        <h4>Eventos Disponíveis - Lista de Espera</h4>
                        <p>
                            Venda de Ingressos Online - Lista de Espera <?= empty($sessao) ? '' : 'para <b>' . $sessao ?></b>
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
	}