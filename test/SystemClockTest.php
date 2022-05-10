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
        $this->assertEqualsWithDelta(
            self::secondsWithMicroseconds($expected),
            self::secondsWithMicroseconds($clock->now()),
            0.2
        );
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
    private static function secondsWithMicroseconds(DateTimeInterface $timestamp):float
    {
        return (float) $timestamp->format('U.u');
    }
}
