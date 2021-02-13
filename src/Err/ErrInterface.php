<?php declare(strict_types=1);

namespace Dispatch\Err;

interface ErrInterface
{
    /**
     * Tells more info about what when wrong.
     *
     * @return string
     */
    public function getReasonPhrase(): string;
}
