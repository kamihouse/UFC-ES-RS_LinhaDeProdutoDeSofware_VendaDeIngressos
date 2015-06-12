<?php
    function base_url(){
        return 'http://'. $_SERVER['HTTP_HOST']. '/' . end(explode(DIRECTORY_SEPARATOR, __DIR__)) . '/';
    }
?>