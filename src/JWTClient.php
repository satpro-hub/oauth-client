<?php

namespace Satpro\JWTClient;
class JWTClient
{
    private static $algorithm = OPENSSL_ALGO_SHA256;
    private static $payload = null;
    public static $validationErrors = [];

    private static function jwtHeader()
    {
        return ["alg" => "RS256", "typ" => "JWT"];
    }

    public static function getPayload()
    {
        return self::$payload;
    }

    /**
     * @param array $validationErrors
     */
    public static function addValidationErrors(array $validationErrors)
    {
        self::$validationErrors = array_merge(self::$validationErrors, $validationErrors);
    }

    private static function base64_url_decode($data)
    {
        return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
    }

    /**
     * Валидация токена, функция для middleWare
     * @param $authorization_h
     * @return bool
     */
    public static function validateToken($authorization_h): bool
    {
        $authorization = explode(" ", $authorization_h);
        if (is_array($authorization) && $authorization[0] == "Bearer") {
            $token = explode(".", $authorization[1] ?? null);

            if (!is_array($token) || count($token) != 3) {
                self::addValidationErrors(['invalid token format']);
                return false;
            }

            self::$payload = json_decode(self::base64_url_decode($token[1]), true);

            $ok = openssl_verify($token[0] . "." . $token[1], self::base64_url_decode($token[2] ?? null), PublicKey::getKey(), self::$algorithm);
            if ($ok == 1) {
                if (self::$payload["exp"] < time()) {
                    self::addValidationErrors(['token has expired']);
                }
                return true;
            } elseif ($ok == 0) {
                self::addValidationErrors(['invalid token']);
            } else {
                self::addValidationErrors(['error:' . openssl_error_string()]);
            }
        } else {
            self::addValidationErrors(['Check Authorization']);
        }

        return false;
    }

}
