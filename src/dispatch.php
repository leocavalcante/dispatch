<?php declare(strict_types=1);

namespace Dispatch;

use Dispatch\Err\DispatcherNotSet;
use Psr\EventDispatcher\EventDispatcherInterface;

/**
 * Dispatches and event using the underlying $dispatcher from Dispatch\Context.
 *
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

/**
 * Assigns an implementation of EventDispatcherInterface to the Dispatch\Context.
 *
 * @param EventDispatcherInterface $dispatcher
 * @return EventDispatcherInterface
 */
function use_dispatcher(EventDispatcherInterface $dispatcher): EventDispatcherInterface
{
    return Context::$dispatcher = $dispatcher;
}

/**
 * Removes the given $dispatcher from the Dispatch\Context.
 */
function desuse_dispatcher(): void
{
    Context::$dispatcher = null;
}
