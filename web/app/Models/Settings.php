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
        'is_json',
        'type',
        'description',
        'is_active',
        'is_required',
    ];

    // modified set method to include type, description, is_active, is_required
    public static function set($type, $key, $value, $is_json = false, $description = null, $is_active = true, $is_required = true)
    {
        $setting = self::where('key', $key)->first();
        if ($setting) {
            $setting->value = $value;
            $setting->is_json = $is_json;
            $setting->type = $type;
            $setting->description = $description;
            $setting->is_active = $is_active;
            $setting->is_required = $is_required;
            $setting->save();
        } else {
            self::create([
                'key' => $key,
                'value' => $value,
                'is_json' => $is_json,
                'type' => $type,
                'description' => $description,
                'is_active' => $is_active,
                'is_required' => $is_required,
            ]);
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
