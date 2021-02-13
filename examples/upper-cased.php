<?php declare(strict_types=1);

namespace Examples;

require_once __DIR__ . '/../vendor/autoload.php';

use League\Event\EventDispatcher;
use function Dispatch\{dispatch, use_dispatcher};

class UpperCased {
    public function __construct(
        public string $result,
    ) {}
}

function to_upper(string $str): string {
    // Do something
    $upper_case_str = strtoupper($str);

    // And dispatch an Event without EventDispatcherInterface injection boilerplate
    dispatch(new UpperCased($upper_case_str));

    return $upper_case_str;
}

class UpperCauser {
    public function toUpper(string $str): string {
        // Do something
        $upper_case_str = strtoupper($str);

        // And dispatch an Event without EventDispatcherInterface injection boilerplate
        dispatch(new UpperCased($upper_case_str));

        return $upper_case_str;
    }
}

$dispatcher = new EventDispatcher();
$dispatcher->subscribeTo(UpperCased::class, static function (UpperCased $event): void {
    echo "Some string was upper cased and it is: {$event->result}\n";
});

use_dispatcher($dispatcher);

to_upper('dispatch');
(new UpperCauser())->toUpper('rocks!');

// Some string was upper cased and it is: DISPATCH
// Some string was upper cased and it is: ROCKS!
