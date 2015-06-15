<?php
	class ShowNumberOfTickets{
        function init(){

        }

        public function nTickets(){
            return rand(10, 1999);
        }
	}