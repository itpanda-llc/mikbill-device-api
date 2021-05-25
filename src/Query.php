<?php

/**
 * Файл из репозитория MikBill-Device-API
 * @link https://github.com/itpanda-llc/mikbill-device-api
 */

declare(strict_types=1);

namespace Panda\MikBill\DeviceApi;

/**
 * Class Query
 * @package Panda\MikBill\DeviceApi
 * Запросы к БД
 */
class Query
{
    /**
     * @param string $type Тип устройств
     * @return array|null Результат запроса
     */
    public static function getNas(string $type): ?array
    {
        return self::getResult(Sql::GET_NAS, $type);
    }

    /**
     * @param string $type Тип устройства
     * @return array|null Результат запроса
     */
    public static function getDevices(string $type): ?array
    {
        return self::getResult(Sql::GET_CPE, $type);
    }

    /**
     * @param string $statement Подготавливаемый запрос
     * @param string $type Тип устройств
     * @return array|null Результат запроса
     */
    private static function getResult(string $statement,
                                      string $type): ?array
    {
        $sth = Statement::prepare($statement);

        $sth->bindParam(Holder::TYPE, $type);

        Statement::execute($sth);

        return (($result = $sth->fetchAll(\PDO::FETCH_NUM)) !== [])
            ? $result
            : null;
    }
}
