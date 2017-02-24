<?php
namespace TacticianModule\Factory;

use Interop\Container\ContainerInterface;
use League\Tactician\CommandBus;

class CommandBusFactory
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
