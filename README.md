# Word To Number

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
