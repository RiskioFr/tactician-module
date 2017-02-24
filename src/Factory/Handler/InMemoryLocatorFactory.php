<?php
namespace TacticianModule\Factory\Handler;

use Interop\Container\ContainerInterface;
use League\Tactician\Handler\Locator\InMemoryLocator;

class InMemoryLocatorFactory
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
