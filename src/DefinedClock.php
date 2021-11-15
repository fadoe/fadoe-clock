<?php

declare(strict_types=1);

namespace FaDoe\Clock;

use DateTime;
use DateTimeImmutable;
use DateTimeInterface;

final class DefinedClock implements ClockInterface
{
    private DateTimeImmutable $dateTime;

    public function __construct(DateTimeInterface $dateTime)
    {
        if ($dateTime instanceof DateTime) {
            $dateTime = DateTimeImmutable::createFromMutable($dateTime);
        }

        $this->dateTime = $dateTime;
    }

    public function now(): DateTimeImmutable
    {
        return $this->dateTime;
    }
}
