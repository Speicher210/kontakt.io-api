<?php

declare(strict_types = 1);

use Doctrine\Common\Annotations\AnnotationRegistry;
use Speicher210\KontaktIO\Model\Device as DeviceModel;

require_once dirname(__DIR__) . '/vendor/autoload.php';

AnnotationRegistry::registerLoader('class_exists');

$uniqueId = 'YOUR-DEVICE-ID';
$apiKey = 'YOUR-API-KEY';

$client = new \Speicher210\KontaktIO\Client($apiKey);
$deviceResource = new \Speicher210\KontaktIO\Resource\Device($client);

$physical = new DeviceModel\Update\Physical(
    DeviceModel::DEVICE_TYPE_BEACON,
    null,
    1,
    2,
    [DeviceModel::PACKET_IBEACON, DeviceModel::PACKET_EDDYSTONE_URL],
    '036578616d706c650074657374',
    4
);
$deviceUpdate = new DeviceModel\Update($uniqueId, $physical);
$device = $deviceResource->update($deviceUpdate);

print_r($device);
