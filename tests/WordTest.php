<?php

namespace Djunehor\Number\Test;

use Djunehor\Number\Locales\EnglishWordTransformer;

class WordTest extends FuzzyWordTestBase
{
    protected function getLang(): string
    {
        return 'en';
    }

    public function testWordTransformerCanBeConstructed()
    {
        $this->assertInstanceOf(EnglishWordTransformer::class, $this->wordTransformer);
    }
}
