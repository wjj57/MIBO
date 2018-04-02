<?php


if (!function_exists('putIntoQueue')) {

    function putJobIntoQueue($production , $queue)
    {
        $queue -> handle( $production ) ;
    }
}


