<?php
namespace TacticianModule\Factory;

use Interop\Container\ContainerInterface;
use League\Tactician\Handler\CommandHandlerMiddleware;

class CommandHandlerMiddlewareFactory
{
    public function __invoke(ContainerInterface $container) : CommandHandlerMiddleware
    {
        $config = $container->get('config')['tactician']['handler'];
        $commandNameExtractor = $container->get($config['command_name_extractor']);
        $locator = $container->get($config['locator']);
        $methodNameInflector = $container->get($config['method_name_inflector']);

        return new CommandHandlerMiddleware(
            $commandNameExtractor,
            $locator,
            $methodNameInflector
        );
    }
}
