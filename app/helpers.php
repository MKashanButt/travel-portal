<?php

if (!function_exists('formatNumber')) {
    function formatNumber($num)
    {
        if ($num >= 1000000) {
            return round($num / 1000000, 1) . 'M';
        } elseif ($num >= 1000) {
            return round($num / 1000, 1) . 'K';
        }
        return $num;
    }
}
