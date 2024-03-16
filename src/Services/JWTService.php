<?php

namespace Satpro\JWTClient\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Satpro\JWTClient\Exceptions\PublicKeyException;
use Satpro\JWTClient\PublicKey;

class JWTService
{
    private static string $public_key = '';

    /**
     * Получение публичного ключа, с открытого ресурса
     * @return string
     */
    public static function getPublicKey()
    {
        $url = env('PUBLIC_TOKEN_URL');
        if (empty($url)) {
            PublicKeyException::urlNotDefiend();
        }

        self::requestPublicKey($url)
            ->validatePublicKey()
            ->savePublicKey();
    }

    /**
     * Запрос в Outh сервис для получения публичного ключа
     * @param string $url
     * @return self
     * @throws \Exception
     */
    private static function requestPublicKey(string $url)
    {
        $response = Http::get($url);
        if (!$response->successful()) {
            PublicKeyException::requestError();
        }
        self::$public_key = $response->body();
        return new self;
    }

    /**
     * Валидация публичного ключа
     * @return self
     */
    private function validatePublicKey()
    {
        if (!preg_match('/-----BEGIN PUBLIC KEY-----(.*)-----END PUBLIC KEY-----/s', self::$public_key)) {
            PublicKeyException::validationError();
        }
        return new self;
    }

    /**
     * Сохранение публичного ключа
     * @return void
     */
    private function savePublicKey()
    {
        if (!PublicKey::saveKey(self::$public_key)) {
            PublicKeyException::saveError();
        }
        return true;
    }
}
