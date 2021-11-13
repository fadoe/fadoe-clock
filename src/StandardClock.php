<?php

declare(strict_types=1);

namespace FaDoe\Clock;

use DateTimeImmutable;

final class StandardClock implements ClockInterface
{
    public function now(): DateTimeImmutable
    {
        return new DateTimeImmutable();
    }
}
