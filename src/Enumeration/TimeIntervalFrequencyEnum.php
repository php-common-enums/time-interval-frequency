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

    public static function createDateInterval(
        ?int $years = null,
        ?int $months = null,
        ?int $days = null,
        ?int $hours = null,
        ?int $minutes = null,
        ?int $seconds = null
    ): \DateInterval {
        $dateString = '';
        if ($years) {
            $dateString .= sprintf(
                '%dY',
                $years
            );
        }
        if ($months) {
            $dateString .= sprintf(
                '%dM',
                $months
            );
        }
        if ($days) {
            $dateString .= sprintf(
                '%dD',
                $days
            );
        }
        $timeString = '';
        if ($hours) {
            $timeString .= sprintf(
                '%dH',
                $hours
            );
        }
        if ($minutes) {
            $timeString .= sprintf(
                '%dM',
                $minutes
            );
        }
        if ($seconds) {
            $timeString .= sprintf(
                '%dS',
                $seconds
            );
        }
        if (!$dateString && !$timeString) {
            throw new \InvalidArgumentException('At least one parameter must be greater than zero.');
        }
        return new \DateInterval('P' . ($dateString ?: null) . ($timeString ? 'T' . $timeString : null));
    }

    private static function getPlural(int $value): ?string
    {
        return 1 !== $value ? 's' : null;
    }

    public static function humanizeDateInterval(\DateInterval $dateInterval): string
    {
        $formats = [];
        if ($dateInterval->y) {
            $formats[] = '%y year' . self::getPlural($dateInterval->y);
        }
        if ($dateInterval->m) {
            $formats[] = '%m month' . self::getPlural($dateInterval->m);
        }
        if ($dateInterval->d) {
            $formats[] = '%d day' . self::getPlural($dateInterval->d);
        }
        if ($dateInterval->h) {
            $formats[] = '%h hour' . self::getPlural($dateInterval->h);
        }
        if ($dateInterval->i) {
            $formats[] = '%i minute' . self::getPlural($dateInterval->i);
        }
        if ($dateInterval->s) {
            $formats[] = '%s second' . self::getPlural($dateInterval->s);
        }
        return $dateInterval->format(
            implode(
                ', ',
                $formats
            )
        );
    }

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
            self::Seconds => 'second' . self::getPlural($value),
            self::Minutes => 'minute' . self::getPlural($value),
            self::Hours => 'hour' . self::getPlural($value),
            self::Days => 'day' . self::getPlural($value),
            self::Weeks => 'week' . self::getPlural($value),
            self::Months => 'month' . self::getPlural($value),
            self::Years => 'year' . self::getPlural($value),
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
}
