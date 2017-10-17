<?php

declare(strict_types=1);

namespace TacticianModule\Factory;

use League\Tactician\Handler\CommandHandlerMiddleware;
use Psr\Container\ContainerInterface;
use TacticianModule\Exception\InvalidConfigException;

final class CommandHandlerMiddlewareFactory
{
    /**
     * @param ContainerInterface $container
     * @return CommandHandlerMiddleware
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     * @throws InvalidConfigException
     */
    public function __invoke(ContainerInterface $container) : CommandHandlerMiddleware
    {
        $config = $container->get('config');

        if (
            !is_array($config) ||
            !isset($config['tactician']) ||
            !is_array($config['tactician']) ||
            !isset($config['tactician']['handler'])
        ) {
            throw new InvalidConfigException('tactician.handler');
        }

        $handlerConfig = $config['tactician']['handler'];

        if (!isset($config['tactician']['handler']['command_name_extractor'])) {
            throw new InvalidConfigException('tactician.handler.command_name_extractor');
        }
        $commandNameExtractor = $container->get($handlerConfig['command_name_extractor']);

        if (!isset($config['tactician']['handler']['locator'])) {
            throw new InvalidConfigException('tactician.handler.locator');
        }
        $locator = $container->get($handlerConfig['locator']);

        if (!isset($config['tactician']['handler']['method_name_inflector'])) {
            throw new InvalidConfigException('tactician.handler.method_name_inflector');
        }
        $methodNameInflector = $container->get($handlerConfig['method_name_inflector']);

        return new CommandHandlerMiddleware(
            $commandNameExtractor,
            $locator,
            $methodNameInflector
        );
    }
}
