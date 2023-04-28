<?php

namespace Djunehor\Number;

use Djunehor\Number\Locales\EnglishWordTransformer;
use Djunehor\Number\Locales\FrenchWordTransformer;
use Djunehor\Number\Locales\WordTransformer;
use InvalidArgumentException;

class WordToNumber
{
    private $wordTransformers = [
        'en' => EnglishWordTransformer::class,
        'fr' => FrenchWordTransformer::class,
    ];

    /**
     * @param string $language
     * @return WordTransformer
     * @throws InvalidArgumentException
     */
    public function getWordTransformer(string $language = 'en'): WordTransformer
    {
        if (!\array_key_exists($language, $this->wordTransformers)) {
            throw new InvalidArgumentException(sprintf(
                'Word transformer for "%s" language is not implemented.',
                $language
            ));
        }

        return new $this->wordTransformers[$language];
    }
}
