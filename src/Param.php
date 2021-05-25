<?php

/**
 * Файл из репозитория MikBill-Device-API
 * @link https://github.com/itpanda-llc/mikbill-device-api
 */

namespace Panda\MikBill\DeviceApi;

/**
 * Class Param
 * @package Panda\MikBill\DeviceApi
 * Наименования параметров запроса
 */
class Param
{
    /**
     * Секрет
     */
    public const SECRET = 'secret';

    /**
     * Причина запроса
     */
    public const DEVICE = 'device';

    /**
     * Тип устройств
     */
    public const TYPE = 'type';
}
