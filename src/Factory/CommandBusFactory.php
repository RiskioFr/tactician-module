<?php

declare(strict_types=1);

namespace TacticianModule\Factory;

use League\Tactician\CommandBus;
use Psr\Container\ContainerInterface;

final class CommandBusFactory
{
    public function __invoke(ContainerInterface $container) : CommandBus
    {
        $config = $container->get('config');

        $middlewares = [];
        foreach ($config['tactician']['middlewares'] as $middleware) {
            $middlewares[] = $container->get($middleware);
        }

        return new CommandBus($middlewares);
    }
}
