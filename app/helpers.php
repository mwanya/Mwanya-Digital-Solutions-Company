<?php

use App\Models\Setting;

if (! function_exists('setting')) {
    /**
     * Fetch a site setting (company phone, email, address, etc.) that the
     * admin can update from /admin/settings without redeploying the site.
     */
    function setting(string $key, mixed $default = null): mixed
    {
        return Setting::get($key, $default);
    }
}
