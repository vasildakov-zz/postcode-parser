# UK Postcode Parser

[![Build Status](https://travis-ci.org/vasildakov/postcode-parser.svg?branch=master)](https://travis-ci.org/vasildakov/postcode-parser)
[![Coverage Status](https://coveralls.io/repos/github/vasildakov/postcode-parser/badge.svg?branch=master)](https://coveralls.io/github/vasildakov/postcode-parser?branch=master)
[![Latest Stable Version](https://poser.pugx.org/vasildakov/postcode-parser/v/stable)](https://packagist.org/packages/vasildakov/postcode-parser)
[![Total Downloads](https://poser.pugx.org/vasildakov/postcode-parser/downloads)](https://packagist.org/packages/vasildakov/postcode-parser)
[![License](https://poser.pugx.org/vasildakov/postcode-parser/license)](https://packagist.org/packages/vasildakov/postcode-parser)


## Installation

The preferred method of installation is via Packagist and Composer. Run the following command to install the package and add it as a requirement to your project's composer.json:

```bash
composer require vasildakov/postcode-parser
```

## Examples

```php
<?php
use VasilDakov\Postcode\Postcode;
use VasilDakov\Postcode\Parser;

$parser = new Parser(new Postcode('AA9A 9AA'));

var_dump($parser->outward()); // AA9A

var_dump($parser->inward()); // 9AA

```

## License

Code released under [the MIT license](https://github.com/vasildakov/postcode-parser/blob/master/LICENSE)
