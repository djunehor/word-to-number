<?php

namespace Djunehor\Number\Test;

use Djunehor\Number\Locales\WordTransformer;
use Djunehor\Number\WordToNumber;
use NumberToWords\Exception\InvalidArgumentException;
use NumberToWords\NumberToWords;
use NumberToWords\NumberTransformer\NumberTransformer;
use PHPUnit\Framework\TestCase;

abstract class FuzzyWordTestBase extends TestCase
{
    /** @var WordTransformer */
    protected $wordTransformer;
    /** @var NumberTransformer */
    protected $numberTransformer;

    protected function getLang(): string
    {
        return 'en';
    }

    /**
     * @throws InvalidArgumentException
     */
    public function setUp(): void
    {
        $numberToWords = new NumberToWords();
        $this->numberTransformer = $numberToWords->getNumberTransformer($this->getLang());

        $wordToNumber = new WordToNumber();
        $this->wordTransformer = $wordToNumber->getWordTransformer($this->getLang());
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
        for ($i = 0; $i < 10000; $i++) {
            $number = rand(1, 1000000);
            $word = $this->numberTransformer->toWords($number);
            $wordToNumber = $this->wordTransformer->toNumber($word);
            $this->assertEquals($number, $wordToNumber);
        }
    }

    public function testCanConvertWordToNumberViaHelper()
    {
        for ($i = 0; $i < 10000; $i++) {
            $number = rand(1, 1000000);
            $word = $this->numberTransformer->toWords($number);
            $wordToNumber = word_to_number($word, $this->getLang());
            $this->assertEquals($number, $wordToNumber);
        }
    }
}
