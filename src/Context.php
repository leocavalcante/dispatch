<?php declare(strict_types=1);

namespace Dispatch;

use Psr\EventDispatcher\EventDispatcherInterface;

final class Context
{
    public static EventDispatcherInterface $dispatcher;
}
