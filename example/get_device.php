<?php

declare(strict_types = 1);

use Doctrine\Common\Annotations\AnnotationRegistry;

require_once dirname(__DIR__) . '/vendor/autoload.php';

AnnotationRegistry::registerLoader('class_exists');

$uniqueId = 'YOUR-DEVICE-ID';
$apiKey = 'YOUR-API-KEY';

$client = new \Speicher210\KontaktIO\Client($apiKey);
$deviceResource = new \Speicher210\KontaktIO\Resource\Device($client);

$device = $deviceResource->getDevice($uniqueId);

print_r($device);
