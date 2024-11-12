<?php

namespace Src;

use DateTime;
use DateInterval;

/** A class which returns different greeting message based on current datetime. */
class MyGreeter
{
    /** Return different greeting messages based on the current datetime. */
    public function greeting(): string
    {
        // Current date&time
        $now = new DateTime();
        // 6AM Today
        $sixAmToday = (clone $now)->setTime(6, 0, 0);
        // 12AM Today
        $twelveAmToday = (clone $now)->setTime(12, 0, 0);
        // 6PM Today
        $sixPmToday = (clone $now)->setTime(18, 0, 0);
        // 6AM Tomrrow
        $sixAmTomorrow = date_add(clone $now, new DateInterval('P1D'))->setTime(6, 0, 0);

        if ($now > $sixAmToday && $now <= $twelveAmToday) {
            // Current date&time is between 6AM and 12AM
            return "Good morning";
        } else if ($now > $twelveAmToday && $now <= $sixPmToday) {
            // Current date&time is between 12AM and 6PM
            return "Good afternoon";
        } else if ($now > $sixPmToday && $now <= $sixAmTomorrow) {
            // Current date&time is between 6PM and 6AM (tomorrow)
            return "Good evening";
        }

        return null;
    }
}

function main()
{
    $greeter = new MyGreeter();
    echo $greeter->greeting();
}

main();
