<?php

/**
 * Файл из репозитория MikBill-Device-API
 * @link https://github.com/itpanda-llc/mikbill-device-api
 */

namespace Panda\MikBill\DeviceApi;

/**
 * Class Message
 * @package Panda\MikBill\DeviceApi
 * Сообщения ответов
 */
class Message
{
    /**
     * Сервера доступа не найдены
     * Код: 1
     */
    public const SEARCH_NAS_ERROR = 'NAS not found';

    /**
     * Устройства пользователей не найдены
     * Код: 1
     */
    public const SEARCH_DEVICES_ERROR = 'Devices not found';

    /**
     * Неправильное значение параметра "Секрет"
     * Код: 2
     */
    public const SECRET_ERROR = 'Incorrect secret key option';

    /**
     * Неправильное значение параметра "Причина запроса"
     * Код: 2
     */
    public const REASON_ERROR = 'Incorrect request reason option';

    /**
     * Неправильное значение параметра "Тип устройств"
     * Код: 2
     */
    public const TYPE_ERROR = 'Incorrect devices type option';
}
