<?php

function fibonacci($number): int
{
    $soma = [];
    for ($i = 0; $i <= $number; $i++){
        if($i === 0){
            $soma[$i] = 0;
        }elseif ($i === 1){
            $soma[$i] = 1;
        }else{
            $soma[$i] = $soma[$i-2]+$soma[$i-1];
        }
    }
    return $soma[$number];
}