<?php
namespace TacticianModule\Test\Factory;

use Interop\Container\ContainerInterface;
use League\Tactician\CommandBus;
use PHPUnit\Framework\TestCase;
use TacticianModule\Factory\CommandBusFactory;

class CommandBusFactoryTest extends TestCase
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

        return $container;
    }
}
