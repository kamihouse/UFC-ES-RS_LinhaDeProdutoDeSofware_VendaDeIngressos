<?php
	class FreeTicketsSortition{
        function init(){
            if(isset($GLOBALS['menu']))
                $GLOBALS['menu'][] = 'Promoções';
        }
        
		function __construct(){
			# code...
		}
	}