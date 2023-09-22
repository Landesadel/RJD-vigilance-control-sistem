<?php

namespace App\Classes;

class Helpers
{
    /**
     * Получить url сайта
     *
     * @return string
     */
    public static function getHost(): string
    {
        return $_ENV['APP_URL'];
    }


}
