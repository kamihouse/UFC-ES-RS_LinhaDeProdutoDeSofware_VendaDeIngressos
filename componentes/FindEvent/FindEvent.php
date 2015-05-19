<?php
	class FindEvent{
        function init(){
            if(isset($GLOBALS['menu']))
                $GLOBALS['menu'][] = 'Buscar Evento';
        }
        
		function __construct(){
			# code...
		}
	}