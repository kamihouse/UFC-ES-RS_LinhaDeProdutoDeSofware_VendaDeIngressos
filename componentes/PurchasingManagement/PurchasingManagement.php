<?php
    require_once "../../sistema/SetupComponente.php";

    $sc = new SetupComponente();

    if(!isset($_SESSION)){
        session_start();
    }

    // Pega acao do usuário
    $acao = isset($_GET['acao']) ? $_GET['acao'] : null;
    $metodo = isset($_GET['metodo']) ? $_GET['metodo'] : null;

    // Trata ação do usuário
    switch ($acao) {
        case 'listaEspera':
            $listaEspera = new WaitList();
            $listaEspera->exibeLista();
            break;
        case 'compraRealizada':
            $compra = new MakeAnOrder();
            $compra->compraRealizada();
            break;
    }

	class PurchasingManagement{
        public $mensagem = null;
        public $customizar = array('Area', 'CategoryOfTickets', 'OrderCancellation', 'Payments', 'Seat', 'WaitList'); // Alterar aqui para os módulos que o cliente escolher
        public $metodosPagamento = array('Boleto Bancario', 'Cartão de Crédito', 'PagSeguro', 'Paypal');

        function init(){
            
        }

	}