Tactician module for Zend Framework
===================================

Module to integrate Tactician with Zend Framework projects.

[![Build Status](https://img.shields.io/travis/RiskioFr/tactician-module.svg?style=flat-square)](http://travis-ci.org/RiskioFr/tactician-module)
[![Latest Stable Version](http://img.shields.io/packagist/v/riskio/tactician-module.svg?style=flat-square)](https://packagist.org/packages/riskio/tactician-module)
[![Build Status](https://img.shields.io/travis/RiskioFr/tactician-module.svg?style=flat-square)](http://travis-ci.org/RiskioFr/tactician-module)
[![Total Downloads](http://img.shields.io/packagist/dt/riskio/tactician-module.svg?style=flat-square)](https://packagist.org/packages/riskio/tactician-module)

## Requirements

* PHP 7.0+
* [league/tactician ^1.0](https://github.com/thephpleague/tactician)
* [league/tactician-container ^2.0](https://github.com/thephpleague/tactician-container)
* [zendframework/zend-servicemanager ^3.0](https://github.com/zendframework/zend-servicemanager)

## Installation

Tactician module only officially supports installation through Composer. For Composer documentation, please refer to
[getcomposer.org](http://getcomposer.org/).

You can install the module from command line:

```sh
$ composer require riskio/tactician-module
```

Enable the module by adding `TacticianModule` key to your `application.config.php` file.

## Default configuration

```php
<?php
use League\Tactician\Handler\CommandNameExtractor\ClassNameExtractor;
use League\Tactician\Handler\Locator\InMemoryLocator;
use League\Tactician\Handler\MethodNameInflector\InvokeInflector;

return [
    'tactician' => [
        'handler' => [
            'command_name_extractor' => ClassNameExtractor::class,
            'locator' => InMemoryLocator::class,
            'method_name_inflector' => InvokeInflector::class,
        ],
        'middlewares' => [],
        'command_map' => [],
    ],
];
```

## Testing

``` bash
$ vendor/bin/phpunit
```

## Credits

- [Nicolas Eeckeloo](https://github.com/neeckeloo)
- [Thomas Dutrion](https://github.com/tdutrion)
- [All Contributors](https://github.com/RiskioFr/idempotency-module/contributors)

## License

The MIT License (MIT). Please see [License File](https://github.com/RiskioFr/tactician-module/blob/master/LICENSE) for more information.
