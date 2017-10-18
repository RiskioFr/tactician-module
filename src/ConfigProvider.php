<?php
declare(strict_types=1);

namespace TacticianModule;

final class ConfigProvider
{
    public function __invoke() : array
    {
        $config = (new Module())->getConfig();

        return [
            'tactician' => $config['tactician'],
            'dependencies' => $config['service_manager'],
        ];
    }
}
