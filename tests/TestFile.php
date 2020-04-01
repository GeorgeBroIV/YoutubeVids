<?php

    /**
     * Handle an incoming request.
     *
     * @param  $toConvert
     * @param  $toFormat
     * @return $return
     */
    // Convert date/time to and from "2019-08-16T11:03:16.000Z" (Google format) and "2019-08-16 11:03:16" (MySQL format)
    // $toFormat should either be "UTC" or "STD"
    // @

    function convertTime($toConvert, $toFormat)
    {
        // Get the default timezone so we can reset it after conversion
        $default_tz = date_default_timezone_get();

        // Format the time to a convertible format
        $fTime = date("Y-m-d H:i:s",strtotime($toConvert));

        if($toFormat == "STD") {
            // convert datetime into STD
            date_default_timezone_set($default_tz);
                $return = date("Y-m-d H:i:s",strtotime($fTime));
        } elseif($toFormat == "UTC") {
            // convert datetime into UTC
            date_default_timezone_set("UTC");
            $return = date("Y-m-d\TH:i:s\Z", strtotime($fTime));
        } else {
            // error in $toFormat
            return "<p>The parameter toFormat was entered as: " . $toFormat . " and it should be UTC or STD</p>";
        }
        // Reset the default timezone back to the default
        date_default_timezone_set($default_tz);
        return $return;
    }
