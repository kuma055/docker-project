<?php

namespace Packages\helper;

trait Helper
{
    public static function checkKeyReturnValue($key, $item)
    {
        if (empty($item[$key])) return false;
        return $item[$key];
    }
}
