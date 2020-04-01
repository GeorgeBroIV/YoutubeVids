<?php

	namespace App\Helpers;

	class ConvertDateTime
    {
        public static function ConvertDateTime(array $arr)
        {
            /**
            *  Convert date/time to/from ["2019-08-16T11:03:16.000Z" (Google), "2019-08-16 11:03:16" (MySQL)]
            *  $toFormat should either be "UTC" or normal standard "STD"
            *
            *  @param   $arr        /   A 2-element array [DateTime, desired format]
            *  @param   $inTime     /   This is the DateTime to be converted to a different format
            *  @param   $toFormat   /   This is the desired format (UTC or standard STD)
            *  @return  $return     /   Returns the formatted DateTime to the caller
            */

            //  store the default timezone so we can reset it after conversion
            $inTime = $arr[0];
            $toFormat = $arr[1];

            //  format the time to a convertible format
            $fTime = date("Y-m-d H:i:s", strtotime($inTime));
            if ($toFormat == "STD") {
                //  convert datetime into STD
                $return = date("Y-m-d H:i:s", strtotime($fTime));
            } elseif ($toFormat == "UTC") {
                //  set default timezone to UTC
                $default_tz = date_default_timezone_get();
                //  convert datetime into UTC
                date_default_timezone_set("UTC");
                $return = date("Y-m-d\TH:i:s\Z", strtotime($fTime));
                //  reset timezone back to default
                date_default_timezone_set($default_tz);
            } else {
                //  notify the caller that an invalid $toFormat was provided
                return "<p>The parameter toFormat: ".$toFormat." is invalid.  Please enter UTC or STD.</p>";
            }
            //  return the formatted DateTime to the caller
            return $return;
        }
    }
