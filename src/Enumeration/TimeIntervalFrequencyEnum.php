<?php

namespace PhpCommonEnums\TimeIntervalFrequency\Enumeration;

enum TimeIntervalFrequencyEnum : string
{
    case Seconds = 's';
    case Minutes = 'i';
    case Hours = 'h';
    case Days = 'd';
    case Weeks = 'w';
    case Months = 'm';
    case Years = 'y';

    public function getDateIntervalTemplate(): string
    {
        return match ($this) {
            self::Seconds => 'PT%dS',
            self::Minutes => 'PT%dM',
            self::Hours => 'P%dH',
            self::Days => 'P%dD',
            self::Weeks => 'P%dW',
            self::Months => 'P%dM',
            self::Years => 'P%dY',
        };
    }

    public function getDateTimeTemplate(): string
    {
        return match ($this) {
            self::Seconds => '%d seconds',
            self::Minutes => '%d minutes',
            self::Hours => '%d hours',
            self::Days => '%d days',
            self::Weeks => '%d weeks',
            self::Months => '%d months',
            self::Years => '%d years',
        };
    }

    public function getLabel(int $value = 0): string
    {
        return match ($this) {
            self::Seconds => 'second' . $this->getPlural($value),
            self::Minutes => 'minute' . $this->getPlural($value),
            self::Hours => 'hour' . $this->getPlural($value),
            self::Days => 'day' . $this->getPlural($value),
            self::Weeks => 'week' . $this->getPlural($value),
            self::Months => 'month' . $this->getPlural($value),
            self::Years => 'year' . $this->getPlural($value),
        };
    }

    public function getLargerUnit(): ?self
    {
        return match ($this) {
            self::Seconds => self::Minutes,
            self::Minutes => self::Hours,
            self::Hours => self::Days,
            self::Days => self::Weeks,
            self::Weeks => self::Months,
            self::Months => self::Years,
            self::Years => null,
        };
    }

    public function getSmallerUnit(): ?self
    {
        return match ($this) {
            self::Seconds => null,
            self::Minutes => self::Seconds,
            self::Hours => self::Minutes,
            self::Days => self::Hours,
            self::Weeks => self::Days,
            self::Months => self::Weeks,
            self::Years => self::Months,
        };
    }

    private function getPlural(int $value): ?string
    {
        return 1 !== $value ? 's' : null;
    }
}
