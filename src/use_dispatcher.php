<?php declare(strict_types=1);

namespace Dispatch;

use Psr\EventDispatcher\EventDispatcherInterface;

function use_dispatcher(EventDispatcherInterface $dispatcher): EventDispatcherInterface
{
    return Context::$dispatcher = $dispatcher;
}
