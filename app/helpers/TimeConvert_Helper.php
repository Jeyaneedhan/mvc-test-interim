<?php

// Time zones must be improved later 
date_default_timezone_set('Asia/Colombo');

function convertedToReadableTimeFormat($time)
{
    $time_ago = strtotime($time);
    $current_time = time();
    $time_diffrence = $current_time - $time_ago;

    $seconds = $time_diffrence;
    $minutes = round($seconds / 60);        // min = 60 secs
    $hours = round($seconds / 3600);        // hour = 60 * 60 secs
    $days = round($seconds / 86400);        // day = 24 * 60 *60 secs
    $weeks = round($seconds / 604800);      // week = 7 * 24 * 60 * 60 secs
    $months = round($seconds / 2629440);    // month = ((365+365+365+365+366) / 5) / 12
    $years = round($seconds / 31553280);    // year = ((365+365+365+365+366) / 5) * 12

    if ($seconds <= 60) {
        return 'Just now';
    } else if ($minutes <= 60) {
        if ($minutes == 1) {
            return 'one minute ago';
        } else {
            return $minutes . ' minutes ago';
        }
    } else if ($hours <= 24) {
        if ($hours == 1) {
            return 'an hour ago';
        } else {
            return $hours . ' hours ago';
        }
    } else if ($days <= 7) {
        if ($days == 1) {
            return "yesterday";
        } else {
            return $days . ' days ago';
        }
    } else if ($weeks <= 4.3) { // 4.3 = 52 / 12
        if ($weeks == 1) {
            return 'a week ago';
        } else {
            return $weeks . 'weeks ago';
        }
    } else if ($months <= 12) {
        if ($months == 1) {
            return 'a month ago';
        } else {
            return $months . ' months ago';
        }
    } else {
        if ($years == 1) {
            return "one year ago";
        } else {
            return $years . ' years ago';
        }
    }
}
