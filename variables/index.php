<?php

use Variables\Variable;

include_once('Variable.php');

function answerVariables(): string
{
    $result = '';
    $options['A'] = 'escudeiro';
    $options['B'] = '1mestre';
    $options['C'] = '_cavaleiro';
    $options['D'] = '__codigo';
    $options['E'] = 'mestre@codigo';
    $options['F'] = 'mestre1';
    $options['G'] = 'escudeiro-1';
    $options['H'] = 'mestreDosCodigos';
    $options['I'] = 'db1_';
    foreach ($options as $index => $option){
        $variable = new Variable($option);
        if(!$variable->validate()){
            $result .= "$index ";
        }
    }
    $result = trim($result);
    echo $result;
    return $result;
}

answerVariables();