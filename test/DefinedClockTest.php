<?php

declare(strict_types=1);

namespace FaDoe\Clock;

use DateTime;
use DateTimeImmutable;
use DateTimeInterface;
use DateTimeZone;
use Generator;
use PHPUnit\Framework\TestCase;

final class DefinedClockTest extends TestCase
{
    /**
     * @dataProvider dateProvider
     */
    public function testDateTime(DateTimeInterface $dateTime, DateTimeImmutable $expected): void
    {
        $clock = new DefinedClock($dateTime);

        $this->assertEquals($expected, $clock->now());
    }

    public function dateProvider(): Generator
    {
        $dateTime = new DateTime();
        $dateTimeImmutable = DateTimeImmutable::createFromMutable($dateTime);
        yield 'datetime object without timezone' => [
            $dateTime,
            $dateTimeImmutable
        ];

        yield 'datetime immutable without timezone' => [
            $dateTimeImmutable,
            $dateTimeImmutable,
        ];

        $dateTimeZone = new DateTimeZone('Europe/Berlin');
        $dateTime = new DateTime('now', $dateTimeZone);
        $dateTimeImmutable = DateTimeImmutable::createFromMutable($dateTime);

        yield 'datetime object with timezone' => [
            $dateTime,
            $dateTimeImmutable,
        ];

        yield 'datetime immutable with timezone' => [
            $dateTimeImmutable,
            $dateTimeImmutable,
        ];
    }
}
