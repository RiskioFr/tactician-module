<?php

declare(strict_types=1);

namespace TacticianModule\Factory\Handler;

use League\Tactician\Container\ContainerLocator;
use Psr\Container\ContainerInterface;

final class ContainerLocatorFactory
{
    public function __invoke(ContainerInterface $container) : ContainerLocator
    {
        $config = $container->get('config');

        return new ContainerLocator($container, $config['tactician']['command_map']);
    }
}
