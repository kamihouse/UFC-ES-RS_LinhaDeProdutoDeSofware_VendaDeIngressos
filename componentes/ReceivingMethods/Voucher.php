<?php
    require_once "../../sistema/SetupComponente.php";

    $sc = new SetupComponente();

    if(!isset($_SESSION)){
        session_start();
    }

	class Voucher{
        function init(){
            
        }

        public function imprime(){
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
                        <h4>Voucher - Impressão</h4>
                        <hr>
                        <div class="col-xs-8">
                            <img style="width: 100%;" src="<?= base_url() ?>assets/img/voucher.gif" alt=""/>
                        </div>
                        <div class="col-xs-4">
                            <a href="<?= base_url() ?>componentes/ListAvailableEvents/ListAvailableEvents.php?acao=listar" class="btn btn-block btn-lg btn-inverse">Voltar para Eventos</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $sc->pprint('loadjs');
        }
	}