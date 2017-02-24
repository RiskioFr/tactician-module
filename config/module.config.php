<?php
use League\Tactician\CommandBus;
use League\Tactician\Container\ContainerLocator;
use League\Tactician\Handler\CommandNameExtractor\ClassNameExtractor;
use League\Tactician\Handler\CommandHandlerMiddleware;
use League\Tactician\Handler\Locator\InMemoryLocator;
use League\Tactician\Handler\MethodNameInflector\HandleClassNameInflector;
use League\Tactician\Handler\MethodNameInflector\HandleClassNameWithoutSuffixInflector;
use League\Tactician\Handler\MethodNameInflector\HandleInflector;
use League\Tactician\Handler\MethodNameInflector\InvokeInflector;
use TacticianModule\Factory\CommandBusFactory;
use TacticianModule\Factory\CommandHandlerMiddlewareFactory;
use TacticianModule\Factory\Handler\ContainerLocatorFactory;
use TacticianModule\Factory\Handler\InMemoryLocatorFactory;
use Zend\ServiceManager\Factory\InvokableFactory;

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

    'service_manager' => [
        'factories' => [
            CommandBus::class => CommandBusFactory::class,
            CommandHandlerMiddleware::class => CommandHandlerMiddlewareFactory::class,
            ContainerLocator::class => ContainerLocatorFactory::class,
            ClassNameExtractor::class => InvokableFactory::class,
            HandleClassNameInflector::class => InvokableFactory::class,
            HandleClassNameWithoutSuffixInflector::class => InvokableFactory::class,
            HandleInflector::class => InvokableFactory::class,
            InMemoryLocator::class => InMemoryLocatorFactory::class,
            InvokeInflector::class => InvokableFactory::class,
        ],
    ],
];
