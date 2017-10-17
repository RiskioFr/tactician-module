<?php

declare(strict_types=1);

namespace TacticianModule\Factory\Handler;

use League\Tactician\Handler\Locator\InMemoryLocator;
use Psr\Container\ContainerInterface;
use TacticianModule\Exception\InvalidConfigException;

final class InMemoryLocatorFactory
{
    /**
     * @param ContainerInterface $container
     * @return InMemoryLocator
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     * @throws InvalidConfigException
     */
    public function __invoke(ContainerInterface $container) : InMemoryLocator
    {
        $config = $container->get('config');

        $locator = new InMemoryLocator();

        if (
            !is_array($config) ||
            !isset($config['tactician']) ||
            !is_array($config['tactician']) ||
            !isset($config['tactician']['command_map'])
        ) {
            throw new InvalidConfigException('tactician.command_map');
        }

        foreach ($config['tactician']['command_map'] as $command => $handler) {
            $locator->addHandler($container->get($handler), $command);
        }

        return $locator;
    }
}
