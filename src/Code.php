<?php

/**
 * Файл из репозитория MikBill-Device-API
 * @link https://github.com/itpanda-llc/mikbill-device-api
 */

namespace Panda\MikBill\DeviceApi;

/**
 * Class Code
 * @package Panda\MikBill\DeviceApi
 * Код ответа
 */
class Code
{
    /**
     * Без ошибок (Нормальный ответ)
     */
    public const DEFAULT = 0;

    /**
     * Ошибка поиска
     */
    public const SEARCH_ERROR = 1;

    /**
     * Ошибка в запросе
     */
    public const REQUEST_ERROR = 2;

    /**
     * Ошибка в запросе
     */
    public const SYSTEM_ERROR = 3;

    /**
     * Ошибка отладки
     */
    public const DEBUG_ERROR = 10;
}
