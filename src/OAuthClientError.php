<?php

namespace Satpro\OAuthClient;

class OAuthClientError
{
    public static $validationErrors = [];

    /**
     * @param array $validationErrors
     */
    public static function addValidationErrors(array $validationErrors)
    {
        self::$validationErrors = array_merge(self::$validationErrors, $validationErrors);
    }


}
