<?php declare(strict_types=1);

namespace Dispatch;

use Dispatch\Err\DispatcherNotSet;

/**
 * @param object $event
 * @return object
 */
function dispatch(object $event): object
{
    if (!isset(Context::$dispatcher)) {
        return new DispatcherNotSet();
    }

    return Context::$dispatcher->dispatch($event);
}
