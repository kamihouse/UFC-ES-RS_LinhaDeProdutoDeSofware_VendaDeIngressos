<?php

class SetupComponente {

    public $root_dir;
    public $base_url;

    public function __construct(){
        $this->root_dir = explode('sistema', realpath(dirname(__FILE__)))[0];
        require_once $this->root_dir . 'base_url.php';
        $this->base_url = base_url();
    }

    private function get_include_contents($filename) {
        if (is_file($filename)) {
            ob_start();
            include $filename;
            return ob_get_clean();
        }
        return false;
    }

    public function pprint($tag){
        $path_template = $this->root_dir . 'sistema/template/';

        $response = '';

        switch($tag){
            case 'head':
                $response = $this->get_include_contents($path_template . 'head.php');
                break;
            case 'loadjs':
                $response = $this->get_include_contents($path_template . 'loadjs.php');
        }

        echo $response;
    }
} 