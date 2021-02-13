<?php declare(strict_types=1);

namespace Tests;

use Dispatch\Err\DispatcherNotSet;
use Dispatch\Err\ErrInterface;
use League\Event\EventDispatcher;
use function Dispatch\{dispatch, use_dispatcher};

it('returns err if dispatcher is no set', function () {
    /** @var object|ErrInterface $err */
    $err = dispatch(new TestEvent());

    expect($err)->toBeInstanceOf(DispatcherNotSet::class);
    expect($err->getMessage())->toBe(DispatcherNotSet::MESSAGE);
});

it('dispatches an event', function () {
    $expected = new TestEvent();

    $dispatcher = new EventDispatcher();
    $dispatcher->subscribeOnceTo(TestEvent::class, function (TestEvent $actual) use ($expected): void {
        expect($actual)->toBe($expected);
    });

    use_dispatcher($dispatcher);
    $actual = dispatch($expected);
    expect($actual)->toBe($expected);
});
