<?php

declare(strict_types=1);

namespace TacticianModule\Test\Factory;

use League\Tactician\CommandBus;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use TacticianModule\Factory\CommandBusFactory;

final class CommandBusFactoryTest extends TestCase
{
    /**
     * @test
     */
    public function invokeShouldReturnCommandBusInstance()
    {
        $container = $this->createContainer();
        $factory = new CommandBusFactory();

        $commandBus = $factory($container);

        $this->assertInstanceOf(CommandBus::class, $commandBus);
    }

    private function createContainer() : ContainerInterface
    {
        $config = [
            'tactician' => ['middlewares' => []],
        ];
        $container = $this->createMock(ContainerInterface::class);
        $container->method('get')->with('config')->willReturn($config);

        /* @var $container ContainerInterface */
        return $container;
    }
}
