<?php
    require_once 'sistema/SetupComponente.php';

    $sc = new SetupComponente();
    $sc->pprint('head');
?>
<div class="container">
    <div class="logo">
        <h1>UFC RS - LPS<span>Venda de Ingressos</span><dt>2.0</dt></h1>
    </div>

    <div class="col-xs-12">
        <?php $sc->pprint('row_menu'); ?>
        <div class="row geral">
            <h4>Venda de Ingressos Online</h4>
            <p>
                Um trabalho para a disciplina de <b>Reuso de Software</b> 2015.1 da <b>Universidade Federal do Ceará</b> - Campus Quixadá.
            </p>
            <br>
            <blockquote>
                <p>
                    <b><span class="fui-clip"></span> Alunos:</b><br>
                    - Thiago Pereira<br>
                    - Matheus Souza<br>
                    - Natasha Silveira<br>
                    - Marcilio Valoir
                </p>
            </blockquote>

            <blockquote>
                <p>
                    <b><span class="fui-star-2"></span> Professora:</b><br>
                    - Carla Ilane Moreira Bezerra
                </p>
            </blockquote>

            <blockquote>
                <p>
                    <b><span class="fui-bookmark"></span> Repositório:</b><br>
                    <a href="https://github.com/kamihouse/UFC-ES-RS_LinhaDeProdutoDeSofware_VendaDeIngressos" target="_blank">UFC-ES-RS_LinhaDeProdutoDeSofware_VendaDeIngressos</a>
                </p>
            </blockquote>
        </div>
    </div>
</div>
<?php
    $sc->pprint('loadjs');