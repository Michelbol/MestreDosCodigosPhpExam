<?php

function countA(string $word, int $size): string
{
    $quantityA = 0;
    $sizeOfWord = strlen($word);
    $returnWord = '';
    $wordCount = 0;

    for ($i = 0; $i < $size; $i++) {
        if($wordCount === $sizeOfWord){
            $wordCount = 0;
        }
        $letter = $word[$wordCount];
        $returnWord .= $letter;
        if($letter === 'a'){
            $quantityA++;
        }
        $wordCount++;
    }

    $stringLetter = singularLetter();
    $stringWord = singularWord();
    if($quantityA > 1 || $quantityA === 0){
        $stringLetter = pluralLetter();
        $stringWord = pluralWord();
    }

    return "Existem $quantityA $stringLetter 'a' na $stringWord $returnWord.";
}

function pluralLetter(): string
{
    return "letras";
}

function singularLetter(): string
{
    return "letra";
}

function singularWord(): string
{
    return 'string';
}

function pluralWord(): string
{
    return 'palavra';
}

