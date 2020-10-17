<?php

declare(strict_types=1);

namespace UnixTime;

interface UnixTimeInterface
{
    /**
     * Initializes the unixTime variable and returns it.
     *
     * @param string $preset
     * @param string $multipliers
     */
    public function __construct(string $preset, string $multipliers = "");

    /**
     * Returns the stored unix time.
     *
     * @return int
     */
    public function time(): int;

    /**
     * Echo the stored unix time.
     */
    public function echo();

    /**
     * Returns the unix time in relation to the current day
     */
    public function format();
}

class UnixTime implements UnixTimeInterface
{

    protected int $unixTime = 0;
    protected string $preset;
    protected int $multiplier;

    /**
     * UnixTime constructor.
     *
     * @param string $preset     one of UnixTimePresets->presets
     * @param string $multiplier one of UnixTimeMultipliers->multipliers
     */
    public function __construct(string $preset, string $multiplier = "")
    {
        if ("" === $preset) {
            $this->unixTime = time();

            return $this->unixTime;
        }

        if (class_exists('UnixTime\UnixTimePresets')) {
            $presets = (array)new UnixTimePresets();
            $presets = $presets['presets'];
            if (array_key_exists($preset, $presets)) {
                $this->preset   = $preset;
                $this->unixTime = $presets[$preset];
            } else {
                trigger_error('UnixTime: invalid preset');
            }
        }

        if (
            ! empty($multiplier)
            && class_exists('UnixTime\UnixTimeMultipliers')
        ) {
            $multipliers      = (array)new UnixTimeMultipliers();
            $this->multiplier = $multipliers['multipliers'][$multiplier];
        } else {
            $this->multiplier = 0;
        }

        $this->unixTime *= 0 !== $this->multiplier ? $this->multiplier : 1;

        return $this->unixTime;
    }

    public function time(): int
    {
        return $this->unixTime;
    }

    public function echo()
    {
        echo $this->unixTime;
    }

    public function format()
    {
        return time() + $this->unixTime;
    }
}

class UnixTimePresets
{
    public array $presets
        = array(
            "1s"            => 1,
            "2s"            => 2,
            "3s"            => 3,
            "4s"            => 4,
            "5s"            => 5,
            "6s"            => 6,
            "7s"            => 7,
            "8s"            => 8,
            "9s"            => 9,
            "10s"           => 10,
            "1m"            => 60,
            "2m"            => 120,
            "3m"            => 180,
            "4m"            => 240,
            "5m"            => 300,
            "6m"            => 360,
            "7m"            => 420,
            "8m"            => 480,
            "9m"            => 540,
            "1h"            => 3600,
            "2h"            => 7200,
            "3h"            => 10800,
            "4h"            => 14400,
            "5h"            => 18000,
            "6h"            => 21600,
            "7h"            => 25200,
            "8h"            => 28800,
            "9h"            => 32400,
            "10h"           => 36000,
            "11h"           => 39600,
            "12h"           => 43200,
            "1d"            => 86400,
            "2d"            => 172800,
            "3d"            => 259200,
            "4d"            => 345600,
            "5d"            => 432000,
            "6d"            => 518400,
            "7d"            => 604800,
            "8d"            => 691200,
            "9d"            => 777600,
            "10d"           => 864000,
            "one_second"    => 1,
            "two_seconds"   => 2,
            "three_seconds" => 3,
            "four_seconds"  => 4,
            "five_seconds"  => 5,
            "one_minute"    => 60,
            "two_minutes"   => 120,
            "three_minutes" => 180,
            "four_minutes"  => 240,
            "five_minutes"  => 300,
            "one_hour"      => 3600,
            "two_hours"     => 7200,
            "three_hours"   => 10800,
            "four_hours"    => 14400,
            "five_hours"    => 18000,
            "six_hours"     => 21600,
            "seven_hours"   => 25200,
            "eight_hours"   => 28800,
            "nine_hours"    => 32400,
            "ten_hours"     => 36000,
            "eleven_hours"  => 39600,
            "twelve_hours"  => 43200,
            "one_day"       => 86400,
            "two_days"      => 172800,
            "three_days"    => 259200,
            "four_days"     => 345600,
            "five_days"     => 432000,
            "six_days"      => 518400,
            "one_week"      => 604800,
            "two_weeks"     => 1209600,
            "three_weeks"   => 1814400,
            "one_month"     => 2419200,
            "two_months"    => 4838400,
            "three_months"  => 7257600,
            "four_months"   => 9676800,
            "five_months"   => 12096000,
            "six_months"    => 14515200,
            "seven_months"  => 16934400,
            "eight_months"  => 19353600,
            "nine_months"   => 21772800,
            "ten_months"    => 24192000,
            "eleven_months" => 26611200,
            "one_year"      => 29030400,
            "two_years"     => 58060800,
            "three_years"   => 87091200,
        );

    public function __construct()
    {
        return $this->presets;
    }
}

class UnixTimeMultipliers
{
    public array $multipliers
        = array(
            "x2"  => 2,
            "x3"  => 3,
            "x4"  => 4,
            "x5"  => 5,
            "x6"  => 6,
            "x7"  => 7,
            "x8"  => 8,
            "x9"  => 9,
            "x10" => 10,
        );

    public function __construct()
    {
        return $this->multipliers;
    }
}