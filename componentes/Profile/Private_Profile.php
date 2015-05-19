<?php
	class Private_Profile{
        function init(){
            if(isset($GLOBALS['menu'])){
                $GLOBALS['menu'][] = 'Login';
                $GLOBALS['menu'][] = 'Cadastre-se';
            }
        }
        
		function __construct(){
			# code...
		}
	}