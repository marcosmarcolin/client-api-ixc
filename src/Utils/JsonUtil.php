<?php

namespace IXClientAPI\Utils;

class JsonUtil
{
    public static function isJson($string): bool
    {
        json_decode($string);
        return json_last_error() === JSON_ERROR_NONE;
    }
}
