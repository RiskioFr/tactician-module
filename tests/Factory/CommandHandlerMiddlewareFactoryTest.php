<?php
namespace TacticianModule\Test\Factory;

use Interop\Container\ContainerInterface;
use League\Tactician\Handler\CommandHandlerMiddleware;
use League\Tactician\Handler\CommandNameExtractor\CommandNameExtractor;
use League\Tactician\Handler\Locator\HandlerLocator;
use League\Tactician\Handler\MethodNameInflector\MethodNameInflector;
use PHPUnit\Framework\TestCase;
use TacticianModule\Factory\CommandHandlerMiddlewareFactory;

class CommandHandlerMiddlewareFactoryTest extends TestCase
{
    /**
     * @test
     */
    public function invokeShouldReturnCommandHandlerMiddlewareInstance()
    {
        $container = $this->createContainer();
        $factory = new CommandHandlerMiddlewareFactory();

        $commandHandlerMiddleware = $factory($container);

        $this->assertInstanceOf(CommandHandlerMiddleware::class, $commandHandlerMiddleware);
    }

    private function createContainer() : ContainerInterface
    {
        $config = [
            'tactician' => [
                'handler' => [
                    'command_name_extractor' => CommandNameExtractor::class,
                    'locator' => HandlerLocator::class,
                    'method_name_inflector' => MethodNameInflector::class,
                ],
            ],
        ];
        $container = $this->createMock(ContainerInterface::class);
        $map = [
            ['config', $config],
            [CommandNameExtractor::class, $this->createMock(CommandNameExtractor::class)],
            [HandlerLocator::class, $this->createMock(HandlerLocator::class)],
            [MethodNameInflector::class, $this->createMock(MethodNameInflector::class)],
        ];
        $container->method('get')->will($this->returnValueMap($map));

        return $container;
    }
}
