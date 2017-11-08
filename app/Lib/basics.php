<?php

App::uses('Acordion', 'Lib');
App::uses('Crud', 'Lib');
App::uses('Paginator', 'Lib');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (!function_exists('strCount')) {

    function strCount($string, $size) {
        $wordSize = strlen($string);

        if ($wordSize > $size) {
            return substr($string, 0, $size) . " ...";
        }

        return $string;
    }

}