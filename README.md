# MikBill-Device-API

API для управления устройствами в биллинговой системе ["MikBill"](https://mikbill.pro)

[![Packagist Downloads](https://img.shields.io/packagist/dt/itpanda-llc/mikbill-device-api)](https://packagist.org/packages/itpanda-llc/mikbill-device-api/stats)
![Packagist License](https://img.shields.io/packagist/l/itpanda-llc/mikbill-device-api)
![Packagist PHP Version Support](https://img.shields.io/packagist/php-v/itpanda-llc/mikbill-device-api)

## Ссылки

* [Разработка](https://github.com/itpanda-llc)
* [О проекте (MikBill)](https://mikbill.pro)
* [Документация (MikBill)](https://wiki.mikbill.pro)

## Возможности

* Отображение серверов доступа
* Отображение устройств пользователей

## Требования

* PHP >= 7.2
* JSON
* libxml
* PDO
* SimpleXML

## Установка

```shell script
composer require itpanda-llc/mikbill-device-api
```

## Конфигурация

Указание в файлах

* Параметров аутентификации в ["Auth.php"](src/Auth.php)
* Путей к [конфигурационному файлу](https://wiki.mikbill.pro/billing/config_file) и интерфейсу в ["index.php"](examples/www/mikbill/admin/api/device/index.php), предварительно размещенного в каталоге веб-сервера

## Примеры запросов к интерфейсу

Отображение серверов доступа

```text
%URL%?secret=%SECRET%&device=nas&type=mikrotik
```

Отображение устройств пользователей

```text
%URL%?secret=%SECRET%&device=cpe&type=1
```
