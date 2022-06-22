<?php


use App\Models\Setting;

if (!function_exists('settings'))
{
    function settings()
    {
        return Setting::latest()->first();
    }
}
