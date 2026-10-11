<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    protected $fillable = ['key', 'value'];

    const CACHE_PREFIX = 'setting.';

    /**
     * Get a setting value by key, cached indefinitely until changed.
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        return Cache::rememberForever(self::CACHE_PREFIX.$key, function () use ($key, $default) {
            $row = static::where('key', $key)->first();

            return $row && $row->value !== null && $row->value !== '' ? $row->value : $default;
        });
    }

    /**
     * Set (create or update) a setting value and refresh its cache.
     */
    public static function set(string $key, mixed $value): void
    {
        static::updateOrCreate(['key' => $key], ['value' => $value]);
        Cache::forget(self::CACHE_PREFIX.$key);
    }

    /**
     * Set many settings at once from an associative array.
     */
    public static function setMany(array $values): void
    {
        foreach ($values as $key => $value) {
            static::set($key, $value);
        }
    }
}
