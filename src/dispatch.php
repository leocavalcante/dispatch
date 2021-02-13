<?php declare(strict_types=1);

namespace Dispatch;

use Dispatch\Err\DispatcherNotSet;
use Psr\EventDispatcher\EventDispatcherInterface;

/**
 * @param object $event
 * @return object
 */
function dispatch(object $event): object
{
    if (Context::$dispatcher === null) {
        return new DispatcherNotSet();
    }

    return Context::$dispatcher->dispatch($event);
}

function use_dispatcher(EventDispatcherInterface $dispatcher): EventDispatcherInterface
{
    return Context::$dispatcher = $dispatcher;
}

function desuse_dispatcher(): void
{
    Context::$dispatcher = null;
}
