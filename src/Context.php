<?php declare(strict_types=1);

namespace Dispatch;

use Psr\EventDispatcher\EventDispatcherInterface;

/**
 * The Context is used to hold the global state shared between the Dispatch\ functions.
 */
final class Context
{
    public static ?EventDispatcherInterface $dispatcher = null;
}
