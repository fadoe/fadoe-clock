<?php

declare(strict_types=1);

namespace FaDoe\Clock;

use DateTimeImmutable;
use DateTimeZone;
use Exception;

final class SystemClock implements ClockInterface
{
    public function __construct(private DateTimeZone $dateTimeZone)
    {
    }

    /**
     * @return DateTimeImmutable
     * @throws Exception
     */
    public function now(): DateTimeImmutable
    {
        return new DateTimeImmutable('now', $this->dateTimeZone);
    }
}
