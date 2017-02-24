Tactician module for ZF3
========================

Module to integrate Tactician with Zend Framework projects.

[![Build Status](https://img.shields.io/travis/RiskioFr/tactician-module.svg?style=flat)](http://travis-ci.org/RiskioFr/tactician-module)
[![Latest Stable Version](http://img.shields.io/packagist/v/riskio/tactician-module.svg?style=flat)](https://packagist.org/packages/riskio/tactician-module)
[![Total Downloads](http://img.shields.io/packagist/dt/riskio/tactician-module.svg?style=flat)](https://packagist.org/packages/riskio/tactician-module)

Requirements
------------

* PHP 7
* Zend Framework 3

Installation
------------

Tactician module only officially supports installation through Composer. For Composer documentation, please refer to
[getcomposer.org](http://getcomposer.org/).

You can install the module from command line:
```sh
$ php composer.phar require riskio/tactician-module:^1.0
```

Alternatively, you can also add manually the dependency in your `composer.json` file:
```json
{
    "require": {
        "riskio/tactician-module": "^1.0"
    }
}
```

Enable the module by adding `TacticianModule` key to your `application.config.php` file.

Default configuration
---------------------

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
