<?php
namespace TWApp;

class Config
{
    public static function get(string $key, $default = null)
    {
        $val = getenv($key);
        if ($val === false) {
            return $default;
        }
        return $val;
    }

    public static function envArray(string $key, array $default = []) : array
    {
        $val = self::get($key);
        if ($val === null) return $default;
        $parts = array_map('trim', explode(',', $val));
        return $parts;
    }
}
