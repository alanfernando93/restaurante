<?php

class FunctionsHelper extends AppHelper{

    function strCount($string, $size) {
        $wordSize = strlen($string);

        if ($wordSize > $size) {
            return substr($string, 0, $size) . " ...";
        }

        return $string;
    }

}