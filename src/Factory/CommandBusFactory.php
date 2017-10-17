<?php

declare(strict_types=1);

namespace TacticianModule\Factory;

use League\Tactician\CommandBus;
use Psr\Container\ContainerInterface;
use TacticianModule\Exception\InvalidConfigException;

final class CommandBusFactory
{
    /**
     * @param ContainerInterface $container
     * @return CommandBus
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     * @throws InvalidConfigException
     */
    public function __invoke(ContainerInterface $container) : CommandBus
    {
        $config = $container->get('config');

        if (
            !is_array($config) ||
            !isset($config['tactician']) ||
            !is_array($config['tactician']) ||
            !isset($config['tactician']['middlewares'])
        ) {
            throw new InvalidConfigException('tactician.middlewares');
        }

        $middlewares = [];
        foreach ($config['tactician']['middlewares'] as $middleware) {
            $middlewares[] = $container->get($middleware);
        }

        return new CommandBus($middlewares);
    }
}
