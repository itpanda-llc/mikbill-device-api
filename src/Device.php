<?php

/**
 * Файл из репозитория MikBill-Device-API
 * @link https://github.com/itpanda-llc/mikbill-device-api
 */

namespace Panda\MikBill\DeviceApi;

/**
 * Class Device
 * @package Panda\MikBill\DeviceApi
 * Тип устройства
 */
class Device
{
    /**
     * Сервер доступа
     */
    public const NAS = 'nas';

    /**
     * Устройство пользователя
     */
    public const CPE = 'cpe';
}
