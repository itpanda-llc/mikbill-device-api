<?php

/**
 * Файл из репозитория MikBill-Device-API
 * @link https://github.com/itpanda-llc/mikbill-device-api
 */

declare(strict_types=1);

namespace Panda\MikBill\DeviceApi;

/**
 * Class Response
 * @package Panda\MikBill\DeviceApi
 * Формирование ответа
 */
class Response
{
    /**
     * @param int $code Код
     * @param string $message Сообщение
     * @return string Контент
     */
    public static function getError(int $code,
                                    string $message): string
    {
        return json_encode([Key::CODE => $code,
            Key::MESSAGE => $message]);
    }

    /**
     * @param array $result Результат
     * @return string Контент
     */
    public static function getResult(array $result): string
    {
        return json_encode([Key::CODE => Code::DEFAULT,
            Key::RESULT => $result]);
    }
}
