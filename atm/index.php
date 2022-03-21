<?php
function atm($withdrawAmount): string
{
    $types = [
        100,
        50,
        20,
        10,
        5,
        1
    ];
    if(is_float($withdrawAmount)){
        return 'Este valor não é válido';
    }
    if($withdrawAmount === 0){
        return 'Este valor não é válido';
    }
    $return = [];
    foreach ($types as $type){
        $return[$type] = intval($withdrawAmount/$type);
        $withdrawAmount = $withdrawAmount - ($return[$type] * $type);
    }
    return formatReturn($return);
}

function formatReturn($return){
    return "[100 => $return[100], 50 => $return[50], 20 => $return[20], 10 => $return[10], 5 => $return[5], 1 => $return[1]]";
}
