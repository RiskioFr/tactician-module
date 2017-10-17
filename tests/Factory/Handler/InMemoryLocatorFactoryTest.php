<?php

declare(strict_types=1);

namespace TacticianModule\Test\Factory\Handler;

use League\Tactician\Handler\Locator\InMemoryLocator;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use TacticianModule\Factory\Handler\InMemoryLocatorFactory;

final class InMemoryLocatorFactoryTest extends TestCase
{
    /**
     * @test
     */
    public function invokeShouldReturnInMemoryLocatorInstance()
    {
        $container = $this->createContainer();
        $factory = new InMemoryLocatorFactory();

        $commandBus = $factory($container);

        $this->assertInstanceOf(InMemoryLocator::class, $commandBus);
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
