<?php

declare(strict_types=1);

namespace FaDoe\Clock;

use DateTime;
use DateTimeImmutable;
use DateTimeInterface;
use DateTimeZone;
use Generator;
use PHPUnit\Framework\TestCase;

final class SystemClockTest extends TestCase
{
    /**
     * @dataProvider dateProvider
     */
    public function testSystemClock(DateTimeZone $dateTimeZone, DateTimeInterface $expected): void
    {
        $clock = new SystemClock($dateTimeZone);
        $this->assertEquals($expected->format('Y-m-d H:i'), $clock->now()->format('Y-m-d H:i'));
    }

    public function dateProvider(): Generator
    {
        $dateTimeZone = new DateTimeZone('Europe/Berlin');
        $date = new DateTime('now', $dateTimeZone);

        yield 'datetime object with timezone' => [
            $dateTimeZone,
            $date,
        ];

        $date = new DateTimeImmutable('now', $dateTimeZone);
        yield 'datetime immutable with timezone' => [
            $dateTimeZone,
            $date,
        ];
    }
}
