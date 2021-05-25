<?php

/**
 * Файл из репозитория MikBill-Device-API
 * @link https://github.com/itpanda-llc/mikbill-device-api
 */

namespace Panda\MikBill\DeviceApi;

/**
 * Class Status
 * @package Panda\MikBill\DeviceApi
 * Заголовок ответа (HTTP-статус)
 */
class Status
{
    /**
     * 200 OK
     */
    public const OK_200 = 'HTTP/1.0 200 OK';

    /**
     * 400 Bad Request
     */
    public const BAD_REQUEST_400 = 'HTTP/1.0 400 Bad Request';

    /**
     * 403 Forbidden
     */
    public const FORBIDDEN_403 = 'HTTP/1.0 403 Forbidden';

    /**
     * 500 Internal
     */
    public const INTERNAL_500 = 'HTTP/1.0 500 Internal';
}
