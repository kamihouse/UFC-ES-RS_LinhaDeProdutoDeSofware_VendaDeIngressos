<?php
	class CustomerSupport{
        function init(){
            if(isset($GLOBALS['menu']))
                $GLOBALS['menu'][] = 'Suporte';
        }
        
		function __construct(){
			# code...
		}
	}