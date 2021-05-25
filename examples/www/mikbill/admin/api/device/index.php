<?php

/**
 * Файл из репозитория MikBill-Device-API
 * @link https://github.com/itpanda-llc/mikbill-device-api
 */

declare(strict_types=1);

/**
 * Путь к конфигурационному файлу MikBill
 * @link https://wiki.mikbill.pro/billing/config_file
 */
const CONFIG =  '/var/www/mikbill/admin/app/etc/config.xml';

require_once '/var/mikbill/__ext/vendor/autoload.php';

use Panda\MikBill\DeviceApi;

header(DeviceApi\Content::APPLICATION_JSON);

$logic = new DeviceApi\Logic;

try {
    $logic->run();

    header($logic->status);
    print_r($logic->content);
} catch (DeviceApi\Exception\SystemException $e) {
    header(DeviceApi\Status::INTERNAL_500);
    print_r(DeviceApi\Response::getError(
        DeviceApi\Code::SYSTEM_ERROR,
        $e->getMessage()));
} catch (DeviceApi\Exception\DebugException $e) {
    header(DeviceApi\Status::INTERNAL_500);
    print_r(DeviceApi\Response::getError(
        DeviceApi\Code::DEBUG_ERROR,
        $e->getMessage()));
}
