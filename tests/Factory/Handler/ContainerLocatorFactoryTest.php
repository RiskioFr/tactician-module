<?php

declare(strict_types=1);

namespace TacticianModule\Test\Factory\Handler;

use League\Tactician\Container\ContainerLocator;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use TacticianModule\Factory\Handler\ContainerLocatorFactory;

final class ContainerLocatorFactoryTest extends TestCase
{
    /**
     * @test
     */
    public function invokeShouldReturnContainerLocatorInstance()
    {
        $container = $this->createContainer();
        $factory = new ContainerLocatorFactory();

        $commandBus = $factory($container);

        $this->assertInstanceOf(ContainerLocator::class, $commandBus);
    }

    private function createContainer() : ContainerInterface
    {
        $config = [
            'tactician' => ['command_map' => []],
        ];
        $container = $this->createMock(ContainerInterface::class);
        $container->method('get')->with('config')->willReturn($config);

        /* @var $container ContainerInterface */
        return $container;
    }
}
