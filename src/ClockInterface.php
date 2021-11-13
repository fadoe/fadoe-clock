<?php

declare(strict_types=1);

namespace FaDoe\Clock;

use DateTimeImmutable;

interface ClockInterface
{
    public function now(): DateTimeImmutable;
}
