<?php

namespace Satpro\JWTClient;

use Illuminate\Support\Facades\Storage;

class PublicKey
{

    public static function keyPath()
    {
        return app('path.storage') . '/oauth-public.key';
    }

    public static function getKey()
    {
        return file_get_contents(self::keyPath());
    }

    public static function saveKey($key)
    {
        return file_put_contents(self::keyPath(), $key);
    }
}
