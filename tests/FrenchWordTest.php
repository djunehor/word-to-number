<?php

namespace Djunehor\Number\Test;

use Djunehor\Number\Locales\FrenchWordTransformer;

class FrenchWordTest extends FuzzyWordTestBase
{
    protected function getLang(): string
    {
        return 'fr';
    }

    public function testWordTransformerCanBeConstructed()
    {
        $this->assertInstanceOf(FrenchWordTransformer::class, $this->wordTransformer);
    }
}