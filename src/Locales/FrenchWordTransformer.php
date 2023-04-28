<?php

namespace Djunehor\Number\Locales;

class FrenchWordTransformer implements WordTransformer
{
    use DecimalTransformerLogic;

    public function toNumber(string $word): int
    {
        return $this->toNumberUsingReplacements(
            $word,
            [
                'zero' => '0',
                'aucun' => '0',
                'aucune' => '0',
                'un' => '1',
                'une' => '1',
                'deux' => '2',
                'trois' => '3',
                'quatre' => '4',
                'cinq' => '5',
                'six' => '6',
                'sept' => '7',
                'huit' => '8',
                'neuf' => '9',
                'dix' => '10',
                'onze' => '11',
                'douze' => '12',
                'treize' => '13',
                'quatorze' => '14',
                'quinze' => '15',
                'seize' => '16',
                'dix-sept' => '17',
                'dix-huit' => '18',
                'dix-neuf' => '19',
                'vingt' => '20',
                'trente' => '30',
                'quarante' => '40',
                'cinquante' => '50',
                'soixante' => '60',
                'soixante-dix' => '70',
                'quatre-vingt' => '80',
                'quatre-vingt-dix' => '90',
                'cent' => '100',
                'mille' => '1000',
                'million' => '1000000',
                'milliard' => '1000000000',
                'et' => '',
            ]
        );
    }
}
