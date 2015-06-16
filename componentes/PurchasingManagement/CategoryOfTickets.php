<?php
    require_once "../../sistema/SetupComponente.php";

    $sc = new SetupComponente();

    if(!isset($_SESSION)){
        session_start();
    }

	class CategoryOfTickets{
        public $mensagem = null;
        public $customizar = array('Area' => 'Pista', 'Seat' => 'Front'); // Alterar aqui para os módulos que o cliente escolher

        function init(){
            
        }

        public function imprimeCategorias(){

            foreach($this->customizar as $categoria){
                ?>
                    <label class="radio">
                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" data-toggle="radio" class="custom-radio"><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span>
                        <?= $categoria ?>
                    </label>
                <?php
            }
        }
	}