<?php

namespace NextBuzz\SEO\Date;

/**
 * This class is a rewrite from an original function found at
 * @see https://www.skyverge.com/blog/down-the-rabbit-hole-wordpress-and-timezones/
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 */
class Timezone
{

    private static $timeZone = null;

    /**
     * Returns the timezone string for a site, even if it's set to a UTC offset
     * Adapted from http://www.php.net/manual/en/function.timezone-name-from-abbr.php#89155
     * @return string valid PHP timezone string
     */
    private static function getTimezoneString()
    {
        if (self::$timeZone !== NULL) {
            return self::$timeZone;
        }

        // if site timezone string exists, return it
        if ($timezone = get_option('timezone_string')) {
            self::$timeZone = $timezone;
            return self::$timeZone;
        } else

        // get UTC offset, if it isn't set then return UTC
        if (0 === ($utc_offset = get_option('gmt_offset', 0))) {
            self::$timeZone = 'UTC';
            return self::$timeZone;
        }

        // adjust UTC offset from hours to seconds
        $utc_offset *= 3600;

        // attempt to guess the timezone string from the UTC offset
        if ($timezone = timezone_name_from_abbr('', $utc_offset, 0)) {
            self::$timeZone = $timezone;
            return self::$timeZone;
        }

        // last try, guess timezone string manually
        $is_dst = date('I');

        foreach (timezone_abbreviations_list() as $abbr)
        {
            foreach ($abbr as $city)
            {
                if ($city['dst'] == $is_dst && $city['offset'] == $utc_offset) {
                    self::$timeZone = $city['timezone_id'];
                    return self::$timeZone;
                }
            }
        }

        // fallback to UTC
        self::$timeZone = 'UTC';
        return self::$timeZone;
    }

    public static function dateFromTimestamp($utcDateTime, $format = 'c')
    {
        static $utc_timezone, $local_timezone;

        $utc_timezone = new \DateTimeZone('UTC');
        $local_timezone = new \DateTimeZone(self::getTimezoneString());

        try {
            if (!empty($utcDateTime)) {
                $datetime = new \DateTime($utcDateTime, $utc_timezone);
                $datetime->setTimezone($local_timezone);

                return $datetime->format($format);
            }
        } catch(\Exception $e) {
            
        }

        // Fallback
        return gmdate($format, strtotime($utcDateTime));
    }

}
