<?php

declare(strict_types=1);

namespace TacticianModule\Factory\Handler;

use League\Tactician\Container\ContainerLocator;
use Psr\Container\ContainerInterface;
use TacticianModule\Exception\InvalidConfigException;

final class ContainerLocatorFactory
{
    /**
     * @param ContainerInterface $container
     * @return ContainerLocator
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     * @throws InvalidConfigException
     */
    public function __invoke(ContainerInterface $container) : ContainerLocator
    {
        $config = $container->get('config');

        if (
            !is_array($config) ||
            !isset($config['tactician']) ||
            !is_array($config['tactician']) ||
            !isset($config['tactician']['command_map'])
        ) {
            throw new InvalidConfigException('tactician.command_map');
        }

        return new ContainerLocator($container, $config['tactician']['command_map']);
    }
}
