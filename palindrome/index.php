<?php

function palindrome($word): string
{
    $sizeOfWord = strlen($word)-1;


    for ($i = 0; $i < $sizeOfWord; $i++) {
        if(strtolower($word[$i]) !== strtolower($word[$sizeOfWord-$i])){
            return '';
        }
        if(round($sizeOfWord/2) === (float) $i){
            return $word;
        }
    }
    return $word;
}