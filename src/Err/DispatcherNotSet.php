<?php declare(strict_types=1);

namespace Dispatch\Err;

class DispatcherNotSet implements ErrInterface
{
    public const MESSAGE = 'Dispatcher is not set';

    public function getMessage(): string
    {
        return self::MESSAGE;
    }
}
