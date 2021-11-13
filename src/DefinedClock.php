<?php

declare(strict_types=1);

namespace FaDoe\Clock;

use DateTimeImmutable;

final class DefinedClock implements ClockInterface
{
    public function __construct(private DateTimeImmutable $dateTime)
    {
    }

    public function now(): DateTimeImmutable
    {
        return $this->dateTime;
    }
}
