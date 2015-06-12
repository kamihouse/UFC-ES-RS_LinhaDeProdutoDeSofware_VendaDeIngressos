<?php
    require_once "../../sistema/SetupComponente.php";
    $sc = new SetupComponente();

    if(!isset($_SESSION)){
        session_start();
    }


	class Private_Profile{

        protected $mensagem = null;

        function init(){

        }

		function __construct(){
			# code...
            //var_dump(get_defined_vars());
		}


        public function exibePerfilPrivado(){
            global $sc;
            $sc->pprint('head');
            ?>
                <h3><a href="<?= $sc->base_url ?>">LPS - Venda de Ingressos</a> | Perfil Privado</h3>
                <hr>

                <p><img src="http://images.all-free-download.com/images/graphiclarge/user_90302.jpg"></p>
                <p>Nome Completo: <?= $_SESSION['nome'] ?></p>
                <p>Sexo: <?= $_SESSION['sexo'] ?></p>
                <p>Cidade: <?= $_SESSION['cidade'] ?></p>
                <p>Telefone: <?= $_SESSION['telefone'] ?></p>

                <hr>
                <p>Voltar para <a href="Profile.php?acao=usuarioLogado">Perfil</a></p>
			<?php
            $sc->pprint('loadjs');
        }
	}