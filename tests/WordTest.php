<?php

namespace Djunehor\Number\Test;

use Djunehor\Number\Locales\EnglishWordTransformer;
use Djunehor\Number\WordToNumber;
use NumberToWords\NumberToWords;
use PHPUnit\Framework\TestCase;

class WordTest extends TestCase
{
    private $wordTransformer;
    private $numberTransformer;

    public function setUp(): void
    {
        parent::setUp();
        $numberToWords = new NumberToWords();
        $this->numberTransformer = $numberToWords->getNumberTransformer('en');

        $wordToNumber = new WordToNumber();
        $this->wordTransformer = $wordToNumber->getWordTransformer();
    }

    public function testWordTransformerCanBeConstructed()
    {
        $this->assertInstanceOf(EnglishWordTransformer::class, $this->wordTransformer);
    }

    public function testExceptionOnTransformerNotFound()
    {
        $wordToNumber = new WordToNumber();
        $this->wordTransformer = $wordToNumber->getWordTransformer();
        try {
            $this->wordTransformer = $wordToNumber->getWordTransformer('yo');
        } catch (\InvalidArgumentException $exception) {
            $this->assertEquals('Word transformer for "yo" language is not implemented.', $exception->getMessage());
        }
    }


    public function testCanConvertWordToNumber()
    {
        for($i = 0; $i < 1000; $i++) {
            $number = rand(1, 1000000);
            $word = $this->numberTransformer->toWords($number);
            $wordToNumber = $this->wordTransformer->toNumber($word);
            $this->assertEquals($number, $wordToNumber);
        }
    }

    public function testCanConvertWordToNumberViaHelper()
    {
        for($i = 0; $i < 1000; $i++) {
            $number = rand(1, 1000000);
            $word = $this->numberTransformer->toWords($number);
            $wordToNumber = word_to_number($word);
            $this->assertEquals($number, $wordToNumber);
        }
    }

}
