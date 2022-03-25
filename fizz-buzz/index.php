<?php
function fizzBuzz($number): string
{
    $isFiz = $number%3 === 0 ? 'Fizz' : '';
    $isBuzz = $number%5 === 0 ? 'Buzz' : '';

    return $isFiz.$isBuzz === '' ? $number : $isFiz.$isBuzz;
}
if(isset($argv[1])){
    echo fizzBuzz($argv[1]);
}
