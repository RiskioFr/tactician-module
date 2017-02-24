<?php
namespace TacticianModule\Factory\Handler;

use Interop\Container\ContainerInterface;
use League\Tactician\Container\ContainerLocator;

class ContainerLocatorFactory
{
    public function __invoke(ContainerInterface $container) : ContainerLocator
    {
        $config = $container->get('config');

        return new ContainerLocator($container, $config['tactician']['command_map']);
    }
}
