<?php

declare(strict_types=1);

namespace TacticianModule\Factory\Handler;

use League\Tactician\Handler\Locator\InMemoryLocator;
use Psr\Container\ContainerInterface;

final class InMemoryLocatorFactory
{
    public function __invoke(ContainerInterface $container) : InMemoryLocator
    {
        $config = $container->get('config');

        $locator = new InMemoryLocator();
        foreach ($config['tactician']['command_map'] as $command => $handler) {
            $locator->addHandler($container->get($handler), $command);
        }

        return $locator;
    }
}
