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
        case 'imprimeVoucher':
            $voucher = new Voucher();
            $voucher->imprime();
            break;
    }
	class ReceivingMethods{
        function init(){
            
        }

	}