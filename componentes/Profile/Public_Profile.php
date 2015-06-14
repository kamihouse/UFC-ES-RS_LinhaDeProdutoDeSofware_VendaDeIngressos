<?php
    require_once '../../sistema/SetupComponente.php';
    require_once "../../sistema/setup.php";

    $sc = new SetupComponente();

    if(!isset($_SESSION)){
        session_start();
    }

	class Public_Profile{
        function init(){
            
        }

		public function exibePerfilPublico(){
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
                        <h4>Meu perfil público</h4>
                        <p>
                            Abaixo estão as informações publicas que você compartilha em nosso sistema
                        </p>
                        <hr>

                        <div class="col-xs-4">
                            <img src="<?= $sc->base_url ?>assets/img/<?= $_SESSION['foto'] ?>" class="fotoPerfil"/>
                        </div>
                        <div class="col-xs-8">
                            <h3><?= $_SESSION['nome'] ?></h3>
                            <p><b>Sexo:</b> <?= $_SESSION['sexo'] ?></p>
                            <p><b>Cidade:</b> <?= $_SESSION['cidade'] ?></p>
                            <p><b>Telefone:</b> <?= $_SESSION['telefone'] ?></p>
                            <hr>
                            <div class="btn-group">
                                <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" type="button">Opções disponíveis <span class="caret"></span></button>
                                <ul role="menu" class="dropdown-menu">
                                    <li><a href="Profile.php?acao=usuarioLogado">Voltar para Minha Conta</a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?= $sc->base_url ?>Componentes/Profile/Profile.php?acao=sair">Sair</a></li>
                                </ul>
                            </div>
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