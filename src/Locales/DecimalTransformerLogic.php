<?php

namespace Djunehor\Number\Locales;

use SplStack;

trait DecimalTransformerLogic
{
    protected function toNumberUsingReplacements(string $word, array $replacements = []): int
    {
        $data = strtolower(trim($word));

        // Replace all number words with an equivalent numeric value
        $data = strtr($data, $replacements);

        // Coerce all tokens to numbers
        $parts = array_map(
            function ($val) {
                return floatval($val);
            },
            preg_split('/[\s-]+/', $data)
        );

        $stack = new SplStack; // Current work stack
        $sum = 0; // Running total
        $last = null;

        foreach ($parts as $part) {
            if (! $stack->isEmpty()) {
                // We're part way through a phrase
                if ($stack->top() > $part) {
                    // Decreasing step, e.g. from hundreds to ones
                    if ($last >= 1000) {
                        // If we drop from more than 1000 then we've finished the phrase
                        $sum += $stack->pop();
                        // This is the first element of a new phrase
                        $stack->push($part);
                    } else {
                        // Drop down from less than 1000, just addition
                        // e.g. "seventy one" -> "70 1" -> "70 + 1"
                        $stack->push($stack->pop() + $part);
                    }
                } else {
                    // Increasing step, e.g ones to hundreds
                    $stack->push($stack->pop() * $part);
                }
            } else {
                // This is the first element of a new phrase
                $stack->push($part);
            }

            // Store the last processed part
            $last = $part;
        }

        return $sum + $stack->pop();
    }
}
