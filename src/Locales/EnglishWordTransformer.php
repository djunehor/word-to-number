<?php

namespace Djunehor\Number\Locales;

class EnglishWordTransformer implements WordTransformer
{
    use DecimalTransformerLogic;

    public function toNumber(string $word): int
    {
        return $this->toNumberUsingReplacements(
            $word,
            [
                'zero' => '0',
                'none' => '0',
                'a' => '1',
                'one' => '1',
                'two' => '2',
                'three' => '3',
                'four' => '4',
                'five' => '5',
                'six' => '6',
                'seven' => '7',
                'eight' => '8',
                'nine' => '9',
                'ten' => '10',
                'eleven' => '11',
                'twelve' => '12',
                'thirteen' => '13',
                'fourteen' => '14',
                'fifteen' => '15',
                'sixteen' => '16',
                'seventeen' => '17',
                'eighteen' => '18',
                'nineteen' => '19',
                'twenty' => '20',
                'thirty' => '30',
                'forty' => '40',
                'fourty' => '40', // common misspelling
                'fifty' => '50',
                'sixty' => '60',
                'seventy' => '70',
                'eighty' => '80',
                'ninety' => '90',
                'hundred' => '100',
                'thousand' => '1000',
                'million' => '1000000',
                'billion' => '1000000000',
                'and' => '',
            ]
        );
    }
}
