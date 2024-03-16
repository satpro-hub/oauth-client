<?php

namespace Satpro\JWTClient\Exceptions;


class PublicKeyException
{
    public static function urlNotDefiend()
    {
        throw new \Exception('Public Key url not defined, check .env file');
    }

    public static function requestError()
    {
        throw new \Exception('OAuth request error');
    }

    public static function validationError()
    {
        throw new \Exception('Public Key validation error');
    }

    public static function saveError()
    {
        throw new \Exception('Public Key save error');
    }
}
