<?php
	class ListAvailableEvents{
        function init(){
            if(isset($GLOBALS['menu']))
                $GLOBALS['menu'][] = 'Lista de Eventos';
        }
        
		function __construct(){
			# code...
		}
	}