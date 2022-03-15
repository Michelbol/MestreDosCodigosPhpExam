<?php

function answerTroubleArray(): string
{
    $options['A'] = ['e'];
    $options['B'] = ['e', 'a', 'b', 'c', 'd'];
    $options['C'] = 'error';
    $options['D'] = ['a', 'b', 'c', 'd', 'e'];
    $options['E'] = null;

    $execution = troubleArray();

    try {
        $result = 'C';
        foreach ($options as $index => $option){
            if($execution === $option){
                $result = $index;
            }
        }
    }catch (Exception $e){
        $result = 'C';
    }
    echo $result;
    return $result;
}

function troubleArray(){
    array("a", "b", "c", "d");
    $a[] = "e";
    return $a;
}
answerTroubleArray();