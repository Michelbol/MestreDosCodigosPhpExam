<?php

namespace Tests\Palindrome;

use PHPUnit\Framework\TestCase;

class PalindromeTest extends TestCase
{
    public function testPalindromeFalse()
    {
        include_once("palindrome/index.php");
        $this->assertEquals('', palindrome('oihdasiosdaoiusadiuosad'));
        $this->assertEquals('', palindrome(''));
    }

    public function testPalindromeTrue()
    {
        include_once("palindrome/index.php");
        $word = 'Omississimo';
        $this->assertEquals($word, palindrome($word));
        $word = 'Osso';
        $this->assertEquals($word, palindrome($word));
        $word = 'Radar';
        $this->assertEquals($word, palindrome($word));
        $word = 'Reler';
        $this->assertEquals($word, palindrome($word));
        $word = 'Rir';
        $this->assertEquals($word, palindrome($word));
        $word = 'Socos';
        $this->assertEquals($word, palindrome($word));
        $word = 'Ovo';
        $this->assertEquals($word, palindrome($word));
        $word = 'Ralar';
        $this->assertEquals($word, palindrome($word));
        $word = 'Reviver';
        $this->assertEquals($word, palindrome($word));
        $word = 'Mirim';
        $this->assertEquals($word, palindrome($word));
        $word = 'Ele';
        $this->assertEquals($word, palindrome($word));
        $word = 'subinoonibus';
        $this->assertEquals($word, palindrome($word));

    }
}
