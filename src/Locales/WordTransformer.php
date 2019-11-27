<?php

namespace Djunehor\Number\Locales;

interface WordTransformer
{
    public function toNumber(string $word): int;
}
