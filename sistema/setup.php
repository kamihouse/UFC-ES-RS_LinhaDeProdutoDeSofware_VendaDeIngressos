<?php
    // desabilita warnings
    error_reporting(E_ERROR);
    
	// retorna uma lista de arquivos e/ou diretorios pertencentes ao diretorio atual
	function ls(){
		return preg_grep('/^([^.])/', scandir(getcwd()));
	}
    
    $path_componentes = 'componentes';
    // muda para o diretorio $path_componentes
	chdir($path_componentes);
    
    // menu para interface
    $menu = array();

	$diretorios = ls();
	foreach ($diretorios as $d) {
		chdir($d);
		$arquivos = ls();
		foreach ($arquivos as $a) {
			require_once $a;
			$classe = explode('.', $a)[0];
			exec($classe::init());
		}
		chdir('..');
	}
    
    unset($d);
    //unset($arquivos);
    unset($a);
    unset($classe);
    
    /*
	echo '<pre>';
    var_dump($GLOBALS);
	var_dump(get_required_files());
	//var_dump(get_declared_classes());
    */