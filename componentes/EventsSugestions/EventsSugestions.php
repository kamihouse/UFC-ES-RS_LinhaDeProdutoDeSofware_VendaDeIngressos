<?php
	class EventsSugestions{
        function init(){
            if(isset($GLOBALS['menu']))
                $GLOBALS['menu'][] = 'Eventos para você';
        }
        
		function __construct(){
			# code...
		}
	}