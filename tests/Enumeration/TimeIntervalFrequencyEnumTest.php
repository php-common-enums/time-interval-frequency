<?php

namespace PhpCommonEnums\TimeIntervalFrequency\Tests\Enumeration;

use PhpCommonEnums\TimeIntervalFrequency\Enumeration\TimeIntervalFrequencyEnum;
use PHPUnit\Framework\TestCase;

class TimeIntervalFrequencyEnumTest extends TestCase
{
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
}
