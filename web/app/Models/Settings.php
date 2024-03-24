<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
    ];

    public static function set($key, $value, $is_json = false)
    {
        $setting = self::where('key', $key)->first();
        if ($setting) {
            $setting->value = $value;
            $setting->is_json = $is_json;
            $setting->save();
        } else {
            self::create(['key' => $key, 'value' => $value, 'is_json' => $is_json]);
        }
    }

    public static function forget($key)
    {
        self::where('key', $key)->delete();
    }

    public static function has($key)
    {
        return self::where('key', $key)->exists();
    }

    public static function allSettings()
    {
        return self::all();
    }

    public static function allSettingsAsArray()
    {
        return self::all()->pluck('value', 'key')->toArray();
    }

    public static function allSettingsAsObject()
    {
        return self::all()->pluck('value', 'key');
    }

    public static function get($key, $default = null)
    {
        $setting = self::where('key', $key)->first();
        return $setting ? ($setting->is_json ? json_decode($setting->value, true) : $setting->value) : $default;
    }
}
