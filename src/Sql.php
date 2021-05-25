<?php

/**
 * Файл из репозитория MikBill-Device-API
 * @link https://github.com/itpanda-llc/mikbill-device-api
 */

namespace Panda\MikBill\DeviceApi;

/**
 * Class Sql
 * @package Panda\MikBill\DeviceApi
 * SQL-запросы
 */
class Sql
{
    /**
     * Получение серверов доступа
     */
    public const GET_NAS = "
        SELECT
            `radnas`.`nasname`
        FROM
            `radnas`
        WHERE
            `radnas`.`nastype` = " . Holder::TYPE . "
                AND
            `radnas`.`nasname` != ''";

    /**
     * Получение устройств пользователей
     */
    public const GET_CPE = "
        SELECT
            `dev_fields`.`value`
        FROM
            `users`
        LEFT JOIN
            `dev_user`
                ON
                `dev_user`.`uid` = `users`.`uid`
                    AND
                `dev_user`.`devtypeid` = " . Holder::TYPE . "
        LEFT JOIN
            `dev_fields`
                ON
                    `dev_fields`.`devid` = `dev_user`.`devid`
        LEFT JOIN
            (
                SELECT
                    `dev_fields`.`devid`, `dev_fields`.`value`
                FROM
                    `dev_fields`
                WHERE
                    `dev_fields`.`key` = 'enabled'
            ) AS
                `dev_fields_enabled`
                    ON
                        `dev_fields`.`devid` = `dev_fields_enabled`.`devid`
        WHERE
            `users`.`state` = 1
                AND
            `dev_fields`.`key` = 'dev_mac'
                AND
            (
                `dev_fields_enabled`.`value` = 1
                    OR
                `dev_fields_enabled`.`value` IS NULL
            )
        GROUP BY
            `dev_fields`.`value`";
}
