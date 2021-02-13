<?php declare(strict_types=1);

namespace Dispatch\Err;

/**
 * This is the object returned when dispatch() is called and there is no $dispatcher in the Context.
 * This avoids from throwing an Exception, but allows to be aware about what happened.
 */
class DispatcherNotSet implements ErrInterface
{
    public const REASON_PHRASE = 'Dispatcher is not set';

    public function getReasonPhrase(): string
    {
        return self::REASON_PHRASE;
    }
}
