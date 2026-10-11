<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SiteSetting extends Model
{
    /**
     * @var list<string>
     */
    protected $fillable = [
        'key',
        'value',
        'group',
        'type',
    ];

    /**
     * Get a setting by key with fallback to a default value, cached in memory/Redis.
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        return Cache::rememberForever('site_setting:'.$key, function () use ($key, $default) {
            try {
                $setting = static::where('key', $key)->first();

                if (! $setting || $setting->value === null || $setting->value === '') {
                    return $default;
                }

                if ($setting->type === 'json' || is_array($default)) {
                    $decoded = json_decode($setting->value, true);

                    return json_last_error() === JSON_ERROR_NONE ? $decoded : $setting->value;
                }

                if ($setting->type === 'boolean') {
                    return filter_var($setting->value, FILTER_VALIDATE_BOOLEAN);
                }

                return $setting->value;
            } catch (\Throwable $e) {
                return $default;
            }
        });
    }

    /**
     * Set a setting value and invalidate the cached key.
     */
    public static function set(string $key, mixed $value, string $group = 'general', string $type = 'text'): self
    {
        $serializedValue = is_array($value) ? json_encode($value) : (string) $value;

        $setting = static::updateOrCreate(
            ['key' => $key],
            [
                'value' => $serializedValue,
                'group' => $group,
                'type' => is_array($value) ? 'json' : $type,
            ]
        );

        Cache::forget('site_setting:'.$key);

        return $setting;
    }

    /**
     * Clear all cached site settings.
     */
    public static function clearCache(): void
    {
        $keys = static::pluck('key');
        foreach ($keys as $key) {
            Cache::forget('site_setting:'.$key);
        }
    }
}
