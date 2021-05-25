<?php

/**
 * Файл из репозитория MikBill-Device-API
 * @link https://github.com/itpanda-llc/mikbill-device-api
 */

declare(strict_types=1);

namespace Panda\MikBill\DeviceApi;

/**
 * Class Logic
 * @package Panda\MikBill\DeviceApi
 * Проверка запроса и формирование ответа
 */
class Logic
{
    /**
     * @var string|null Секрет
     */
    private $secret;

    /**
     * @var string|null Тип устройства
     */
    private $device;

    /**
     * @var string|null Тип устройств
     */
    private $type;

    /**
     * @var string Статус ответа
     */
    public $status = Status::OK_200;

    /**
     * @var string|null Контент
     */
    public $content;

    public function __construct()
    {
        $query = (empty($_GET)) ? $_POST : $_GET;

        $this->secret = (!empty($query[Param::SECRET]))
            ? $query[Param::SECRET]
            : null;
        $this->device = (!empty($query[Param::DEVICE]))
            ? $query[Param::DEVICE]
            : null;
        $this->type = (!empty($query[Param::TYPE]))
            ? $query[Param::TYPE]
            : null;
    }

    public function run(): void
    {
        try {
            $secrets = (new \ReflectionClass(Auth::class))->getConstants();
        } catch (\ReflectionException $e) {
            throw new Exception\DebugException($e->getMessage());
        }

        if (!in_array($this->secret, $secrets, true)) {
            $this->status = Status::FORBIDDEN_403;
            $this->content = Response::getError(Code::REQUEST_ERROR,
                Message::SECRET_ERROR);

            return;
        }

        try {
            $reasons = (new \ReflectionClass(Reason::class))->getConstants();
        } catch (\ReflectionException $e) {
            throw new Exception\DebugException($e->getMessage());
        }

        if (!in_array($this->reason, $reasons, true)) {
            $this->status = Status::BAD_REQUEST_400;
            $this->content = Response::getError(Code::REQUEST_ERROR,
                Message::REASON_ERROR);

            return;
        }

        if ($this->reason === Reason::NAS) {
            if (is_null($this->type)) {
                $this->status = Status::BAD_REQUEST_400;
                $this->content = Response::getError(Code::REQUEST_ERROR,
                    Message::TYPE_ERROR);

                return;
            }

            $this->content = (!is_null($nas = Query::getNas($this->type)))
                ? Response::getResult($nas)
                : Response::getError(Code::SEARCH_ERROR,
                    Message::SEARCH_NAS_ERROR);

            return;
        }

        if ($this->reason === Reason::DEVICES) {
            if (!is_numeric($this->type)) {
                $this->status = Status::BAD_REQUEST_400;
                $this->content = Response::getError(Code::REQUEST_ERROR,
                    Message::TYPE_ERROR);

                return;
            }

            $this->content =
                (!is_null($devices = Query::getDevices($this->type)))
                    ? Response::getResult($devices)
                    : Response::getError(Code::SEARCH_ERROR,
                        Message::SEARCH_DEVICES_ERROR);

            return;
        }
    }
}
