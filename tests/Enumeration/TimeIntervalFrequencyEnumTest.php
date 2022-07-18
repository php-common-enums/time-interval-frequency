<?php

namespace PhpCommonEnums\TimeIntervalFrequency\Tests\Enumeration;

use PhpCommonEnums\TimeIntervalFrequency\Enumeration\TimeIntervalFrequencyEnum;
use PHPUnit\Framework\TestCase;

class TimeIntervalFrequencyEnumTest extends TestCase
{
    public function provideDataAddMonths(): array
    {
        return [
            [
                new \DateTime(
                    '2020-02-29',
                    new \DateTimeZone('America/New_York')
                ),
                new \DateTime(
                    '2020-01-31',
                    new \DateTimeZone('America/New_York')
                ),
            ],
            [
                new \DateTime(
                    '2021-02-28',
                    new \DateTimeZone('America/New_York')
                ),
                new \DateTime(
                    '2021-01-31',
                    new \DateTimeZone('America/New_York')
                ),
            ],
            [
                new \DateTime(
                    '2021-02-15',
                    new \DateTimeZone('America/New_York')
                ),
                new \DateTime(
                    '2021-01-15',
                    new \DateTimeZone('America/New_York')
                ),
            ],
            [
                new \DateTime(
                    '2021-03-01',
                    new \DateTimeZone('America/New_York')
                ),
                new \DateTime(
                    '2021-02-01',
                    new \DateTimeZone('America/New_York')
                ),
            ],
            [
                new \DateTime(
                    '2021-04-30',
                    new \DateTimeZone('America/New_York')
                ),
                new \DateTime(
                    '2021-03-31',
                    new \DateTimeZone('America/New_York')
                ),
            ],
            [
                new \DateTime(
                    '2021-05-31',
                    new \DateTimeZone('America/New_York')
                ),
                new \DateTime(
                    '2021-04-30',
                    new \DateTimeZone('America/New_York')
                ),
            ],
            [
                new \DateTime(
                    '2021-05-15',
                    new \DateTimeZone('America/New_York')
                ),
                new \DateTime(
                    '2021-01-15',
                    new \DateTimeZone('America/New_York')
                ),
                4,
            ],
            [
                new \DateTime(
                    '2021-03-31',
                    new \DateTimeZone('America/New_York')
                ),
                new \DateTime(
                    '2021-01-31',
                    new \DateTimeZone('America/New_York')
                ),
                2,
            ],
            [
                new \DateTime(
                    '2021-09-30',
                    new \DateTimeZone('America/New_York')
                ),
                new \DateTime(
                    '2021-02-28',
                    new \DateTimeZone('America/New_York')
                ),
                7,
            ],
            [
                new \DateTime(
                    '2021-09-30',
                    new \DateTimeZone('America/New_York')
                ),
                new \DateTime(
                    '2021-03-31',
                    new \DateTimeZone('America/New_York')
                ),
                6,
            ],
            [
                new \DateTime(
                    '2022-01-31',
                    new \DateTimeZone('America/New_York')
                ),
                new \DateTime(
                    '2021-02-28',
                    new \DateTimeZone('America/New_York')
                ),
                11,
            ],
            [
                new \DateTime(
                    '2022-01-02',
                    new \DateTimeZone('America/New_York')
                ),
                new \DateTime(
                    '2021-02-02',
                    new \DateTimeZone('America/New_York')
                ),
                11,
            ],
            [
                new \DateTimeImmutable(
                    '2020-02-29',
                    new \DateTimeZone('America/New_York')
                ),
                new \DateTimeImmutable(
                    '2020-01-31',
                    new \DateTimeZone('America/New_York')
                ),
            ],
            [
                new \DateTimeImmutable(
                    '2021-02-28',
                    new \DateTimeZone('America/New_York')
                ),
                new \DateTimeImmutable(
                    '2021-01-31',
                    new \DateTimeZone('America/New_York')
                ),
            ],
            [
                new \DateTimeImmutable(
                    '2021-02-15',
                    new \DateTimeZone('America/New_York')
                ),
                new \DateTimeImmutable(
                    '2021-01-15',
                    new \DateTimeZone('America/New_York')
                ),
            ],
            [
                new \DateTime(
                    '2021-03-01',
                    new \DateTimeZone('America/New_York')
                ),
                new \DateTime(
                    '2021-02-01',
                    new \DateTimeZone('America/New_York')
                ),
            ],
            [
                new \DateTimeImmutable(
                    '2021-04-30',
                    new \DateTimeZone('America/New_York')
                ),
                new \DateTimeImmutable(
                    '2021-03-31',
                    new \DateTimeZone('America/New_York')
                ),
            ],
            [
                new \DateTimeImmutable(
                    '2021-05-31',
                    new \DateTimeZone('America/New_York')
                ),
                new \DateTimeImmutable(
                    '2021-04-30',
                    new \DateTimeZone('America/New_York')
                ),
            ],
            [
                new \DateTimeImmutable(
                    '2022-01-31',
                    new \DateTimeZone('America/New_York')
                ),
                new \DateTimeImmutable(
                    '2021-02-28',
                    new \DateTimeZone('America/New_York')
                ),
                11,
            ],
        ];
    }

    /**
     * @dataProvider provideDataAddMonths
     */
    public function testAddMonths(
        \DateTime|\DateTimeImmutable $dateTimeExpected,
        \DateTime|\DateTimeImmutable $dateTime,
        int $months = 1,
    ): void {
        self::assertEquals(
            $dateTimeExpected,
            TimeIntervalFrequencyEnum::addMonths(
                $dateTime,
                $months
            )
        );
        self::assertEquals(
            $dateTimeExpected::class,
            $dateTime::class
        );
    }

    public function testCreateDateInterval(): void
    {
        $dateInterval = TimeIntervalFrequencyEnum::createDateInterval(
            years  : 1,
            months : 2,
            days   : 3,
            hours  : 4,
            minutes: 5,
            seconds: 6
        );
        self::assertEquals(
            1,
            $dateInterval->y
        );
        self::assertEquals(
            2,
            $dateInterval->m
        );
        self::assertEquals(
            3,
            $dateInterval->d
        );
        self::assertEquals(
            4,
            $dateInterval->h
        );
        self::assertEquals(
            5,
            $dateInterval->i
        );
        self::assertEquals(
            6,
            $dateInterval->s
        );
        $dateInterval = TimeIntervalFrequencyEnum::createDateInterval(
            years : 1,
            months: 2,
            days  : 3
        );
        self::assertEquals(
            1,
            $dateInterval->y
        );
        self::assertEquals(
            2,
            $dateInterval->m
        );
        self::assertEquals(
            3,
            $dateInterval->d
        );
        self::assertEquals(
            0,
            $dateInterval->h
        );
        self::assertEquals(
            0,
            $dateInterval->i
        );
        self::assertEquals(
            0,
            $dateInterval->s
        );
        $dateInterval = TimeIntervalFrequencyEnum::createDateInterval(
            hours  : 4,
            minutes: 5,
            seconds: 6
        );
        self::assertEquals(
            0,
            $dateInterval->y
        );
        self::assertEquals(
            0,
            $dateInterval->m
        );
        self::assertEquals(
            0,
            $dateInterval->d
        );
        self::assertEquals(
            4,
            $dateInterval->h
        );
        self::assertEquals(
            5,
            $dateInterval->i
        );
        self::assertEquals(
            6,
            $dateInterval->s
        );
        $this->expectException(\InvalidArgumentException::class);
        $dateInterval = TimeIntervalFrequencyEnum::createDateInterval();
        self::assertEquals(
            0,
            $dateInterval->y
        );
        self::assertEquals(
            0,
            $dateInterval->m
        );
        self::assertEquals(
            0,
            $dateInterval->d
        );
        self::assertEquals(
            0,
            $dateInterval->h
        );
        self::assertEquals(
            0,
            $dateInterval->i
        );
        self::assertEquals(
            0,
            $dateInterval->s
        );
    }

    public function testExpectedDateIntervalTemplate(): void
    {
        self::assertEquals(
            'PT%dS',
            TimeIntervalFrequencyEnum::Seconds->getDateIntervalTemplate()
        );
        self::assertEquals(
            'PT%dM',
            TimeIntervalFrequencyEnum::Minutes->getDateIntervalTemplate()
        );
        self::assertEquals(
            'P%dH',
            TimeIntervalFrequencyEnum::Hours->getDateIntervalTemplate()
        );
        self::assertEquals(
            'P%dD',
            TimeIntervalFrequencyEnum::Days->getDateIntervalTemplate()
        );
        self::assertEquals(
            'P%dW',
            TimeIntervalFrequencyEnum::Weeks->getDateIntervalTemplate()
        );
        self::assertEquals(
            'P%dM',
            TimeIntervalFrequencyEnum::Months->getDateIntervalTemplate()
        );
        self::assertEquals(
            'P%dY',
            TimeIntervalFrequencyEnum::Years->getDateIntervalTemplate()
        );
    }

    public function testExpectedDateTimeTemplate(): void
    {
        self::assertEquals(
            '%d seconds',
            TimeIntervalFrequencyEnum::Seconds->getDateTimeTemplate()
        );
        self::assertEquals(
            '%d minutes',
            TimeIntervalFrequencyEnum::Minutes->getDateTimeTemplate()
        );
        self::assertEquals(
            '%d hours',
            TimeIntervalFrequencyEnum::Hours->getDateTimeTemplate()
        );
        self::assertEquals(
            '%d days',
            TimeIntervalFrequencyEnum::Days->getDateTimeTemplate()
        );
        self::assertEquals(
            '%d weeks',
            TimeIntervalFrequencyEnum::Weeks->getDateTimeTemplate()
        );
        self::assertEquals(
            '%d months',
            TimeIntervalFrequencyEnum::Months->getDateTimeTemplate()
        );
        self::assertEquals(
            '%d years',
            TimeIntervalFrequencyEnum::Years->getDateTimeTemplate()
        );
    }

    public function testExpectedLabel(): void
    {
        self::assertEquals(
            'seconds',
            TimeIntervalFrequencyEnum::Seconds->getLabel()
        );
        self::assertEquals(
            'minutes',
            TimeIntervalFrequencyEnum::Minutes->getLabel()
        );
        self::assertEquals(
            'hours',
            TimeIntervalFrequencyEnum::Hours->getLabel()
        );
        self::assertEquals(
            'days',
            TimeIntervalFrequencyEnum::Days->getLabel()
        );
        self::assertEquals(
            'weeks',
            TimeIntervalFrequencyEnum::Weeks->getLabel()
        );
        self::assertEquals(
            'months',
            TimeIntervalFrequencyEnum::Months->getLabel()
        );
        self::assertEquals(
            'years',
            TimeIntervalFrequencyEnum::Years->getLabel()
        );
        self::assertEquals(
            'second',
            TimeIntervalFrequencyEnum::Seconds->getLabel(1)
        );
        self::assertEquals(
            'minute',
            TimeIntervalFrequencyEnum::Minutes->getLabel(1)
        );
        self::assertEquals(
            'hour',
            TimeIntervalFrequencyEnum::Hours->getLabel(1)
        );
        self::assertEquals(
            'day',
            TimeIntervalFrequencyEnum::Days->getLabel(1)
        );
        self::assertEquals(
            'week',
            TimeIntervalFrequencyEnum::Weeks->getLabel(1)
        );
        self::assertEquals(
            'month',
            TimeIntervalFrequencyEnum::Months->getLabel(1)
        );
        self::assertEquals(
            'year',
            TimeIntervalFrequencyEnum::Years->getLabel(1)
        );
    }

    public function testExpectedLargerUnit(): void
    {
        self::assertEquals(
            TimeIntervalFrequencyEnum::Minutes,
            TimeIntervalFrequencyEnum::Seconds->getLargerUnit()
        );
        self::assertEquals(
            TimeIntervalFrequencyEnum::Hours,
            TimeIntervalFrequencyEnum::Minutes->getLargerUnit()
        );
        self::assertEquals(
            TimeIntervalFrequencyEnum::Days,
            TimeIntervalFrequencyEnum::Hours->getLargerUnit()
        );
        self::assertEquals(
            TimeIntervalFrequencyEnum::Weeks,
            TimeIntervalFrequencyEnum::Days->getLargerUnit()
        );
        self::assertEquals(
            TimeIntervalFrequencyEnum::Months,
            TimeIntervalFrequencyEnum::Weeks->getLargerUnit()
        );
        self::assertEquals(
            TimeIntervalFrequencyEnum::Years,
            TimeIntervalFrequencyEnum::Months->getLargerUnit()
        );
        self::assertNull(TimeIntervalFrequencyEnum::Years->getLargerUnit());
    }

    public function testExpectedSmallerUnit(): void
    {
        self::assertNull(TimeIntervalFrequencyEnum::Seconds->getSmallerUnit());
        self::assertEquals(
            TimeIntervalFrequencyEnum::Seconds,
            TimeIntervalFrequencyEnum::Minutes->getSmallerUnit()
        );
        self::assertEquals(
            TimeIntervalFrequencyEnum::Minutes,
            TimeIntervalFrequencyEnum::Hours->getSmallerUnit()
        );
        self::assertEquals(
            TimeIntervalFrequencyEnum::Hours,
            TimeIntervalFrequencyEnum::Days->getSmallerUnit()
        );
        self::assertEquals(
            TimeIntervalFrequencyEnum::Days,
            TimeIntervalFrequencyEnum::Weeks->getSmallerUnit()
        );
        self::assertEquals(
            TimeIntervalFrequencyEnum::Weeks,
            TimeIntervalFrequencyEnum::Months->getSmallerUnit()
        );
        self::assertEquals(
            TimeIntervalFrequencyEnum::Months,
            TimeIntervalFrequencyEnum::Years->getSmallerUnit()
        );
    }

    public function testExpectedValue(): void
    {
        self::assertEquals(
            's',
            TimeIntervalFrequencyEnum::Seconds->value
        );
        self::assertEquals(
            'i',
            TimeIntervalFrequencyEnum::Minutes->value
        );
        self::assertEquals(
            'h',
            TimeIntervalFrequencyEnum::Hours->value
        );
        self::assertEquals(
            'd',
            TimeIntervalFrequencyEnum::Days->value
        );
        self::assertEquals(
            'w',
            TimeIntervalFrequencyEnum::Weeks->value
        );
        self::assertEquals(
            'm',
            TimeIntervalFrequencyEnum::Months->value
        );
        self::assertEquals(
            'y',
            TimeIntervalFrequencyEnum::Years->value
        );
    }

    public function testHumanizeDateInterval(): void
    {
        self::assertEquals(
            '1 year, 3 months, 1 day, 3 hours, 20 minutes, 15 seconds',
            TimeIntervalFrequencyEnum::humanizeDateInterval(new \DateInterval('P1Y3M1DT3H20M15S'))
        );
        self::assertEquals(
            '10 days, 13 hours',
            TimeIntervalFrequencyEnum::humanizeDateInterval(new \DateInterval('P10DT13H'))
        );
        self::assertEquals(
            '2 years, 10 seconds',
            TimeIntervalFrequencyEnum::humanizeDateInterval(new \DateInterval('P2YT10S'))
        );
        self::assertSame(
            '',
            TimeIntervalFrequencyEnum::humanizeDateInterval(new \DateInterval('P0Y'))
        );
    }
}
