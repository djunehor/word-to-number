<?php

if (! function_exists('word_to_number')) {
    function word_to_number($word, $locale = 'en')
    {
        $wordToNumber = new \Djunehor\Number\WordToNumber();
        $transformer = $wordToNumber->getWordTransformer($locale);

        return $transformer->toNumber($word);
    }
}
