# kontakt.io-api

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what
PSRs you support to avoid any confusion with users and contributors.

## Install

Via Composer

``` bash
$ composer require speicher210/kontakt.io-api
```

## Usage

``` php
require_once 'vendor/autoload.php';

\Doctrine\Common\Annotations\AnnotationRegistry::registerLoader('class_exists');

$client = new \Speicher210\KontaktIO\Client('YOUR_API_KEY');
$serializer = \JMS\Serializer\SerializerBuilder::create()->build();

$deviceResource = new \Speicher210\KontaktIO\Resource\Device($client, $serializer);
$device = $deviceResource->getDevice('01gz');
print_r($device);
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ vendor/bin/phpunit
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email instead of using the issue tracker.

## Credits

- [Dragos Protung][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/speicher210/kontakt.io-api.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/speicher210/kontakt.io-api/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/speicher210/kontakt.io-api.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/speicher210/kontakt.io-api.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/speicher210/kontakt.io-api.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/speicher210/kontakt.io-api
[link-travis]: https://travis-ci.org/Speicher210/kontakt.io-api
[link-scrutinizer]: https://scrutinizer-ci.com/g/speicher210/kontakt.io-api/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/speicher210/kontakt.io-api
[link-downloads]: https://packagist.org/packages/speicher210/kontakt.io-api
[link-author]: https://github.com/dragosprotung
[link-contributors]: ../../contributors
