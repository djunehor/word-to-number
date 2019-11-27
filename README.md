# Word To Number
[![CircleCI](https://circleci.com/gh/djunehor/word-to-number.svg?style=svg)](https://circleci.com/gh/djunehor/word-to-number)
[![Latest Stable Version](https://poser.pugx.org/djunehor/word-to-number/v/stable)](https://packagist.org/packages/djunehor/word-to-number)
[![Total Downloads](https://poser.pugx.org/djunehor/word-to-number/downloads)](https://packagist.org/packages/djunehor/word-to-number)
[![License](https://poser.pugx.org/djunehor/laravel-sms/license)](https://packagist.org/packages/djunehor/laravel-sms)
[![Build Status](https://scrutinizer-ci.com/g/djunehor/word-to-number/badges/build.png?b=master)](https://scrutinizer-ci.com/g/djunehor/word-to-number/build-status/master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/djunehor/word-to-number/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/djunehor/word-to-number/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/djunehor/word-to-number/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/djunehor/word-to-number/?branch=master)
[![StyleCI](https://github.styleci.io/repos/224523383/shield?branch=master)](https://github.styleci.io/repos/224523383)

This PHP package allows you convert numbers written in words to integers

- [Laravel Grammar](#word-to-number)
    - [Installation](#installation)
    - [Usage](#usage)
        - [Via Helper](#via-helper)
    - [Available Locales](#available-locales)
    - [Adding New Locale](#adding-new-locale)

## Installation
You can install the package via composer:

```shell
composer require djunehor/word-to-number
```

## Usage
```php
use Djunehor\Number\WordToNumber;

$wordToNumber = new WordToNumber();
$wordTransformer = $wordToNumber->getWordTransformer();
// you can specify locale via: $wordToNumber->getWordTransformer('en');
$number = $wordTransformer->toNumber($word);
```

### Via Helper
```php
$number = word_to_number($word);
//default locale is en

$number = word_to_number($word, 'yo');
// specify Yoruba locale
```

## Available Locales
|Language|Code|Test|
|:--------- | :-----------------: | :------: |
|English|en|Yes|

## Adding New Locale
- In `Locales` directory, create `YourLocaleTransformer` class that implements `WordTransformer`
- Ensure there's a `toNumber()` method that accepts string and returns int
- Add `YourLocaleTransformer::class` to `$wordTransformers` array in `WordToNumber`
- Ensure the class pass tests
- Update the Readme [Available Locales](#available-locales) section with your newly added locale
- Create a Pull Request
