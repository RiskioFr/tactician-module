<?php

declare(strict_types=1);

namespace TacticianModule\Exception;

use RuntimeException;

final class InvalidConfigException extends RuntimeException
{
    public function __construct(string $configKey)
    {
        parent::__construct(sprintf(
            'Could not find "%s" in your project configuration, or the provided value is invalid.',
            $configKey
        ));
    }
}
