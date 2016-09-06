<?php

namespace Speicher210\KontaktIO\Resource;

use GuzzleHttp\Exception\ClientException;
use Speicher210\KontaktIO\AbstractResource;
use Speicher210\KontaktIO\Model\Device as DeviceModel;

/**
 * Device resource.
 */
class Device extends AbstractResource
{
    /**
     * Get a device.
     *
     * @param string $uniqueId The device unique ID.
     * @return DeviceModel
     * @throws \Speicher210\KontaktIO\Exception\ApiException
     */
    public function getDevice($uniqueId)
    {
        try {
            $response = $this->client->get('/device/' . $uniqueId);

            return $this->serializer->deserialize($response->getBody(), DeviceModel::class, 'json');
        } catch (ClientException $e) {
            throw $this->createApiException($e);
        }
    }

    /**
     * Update devices.
     *
     * @param string|array $uniqueId The unique IDs to update.
     * @param string $deviceType The device type. One of the DEVICE_TYPE_* Device model constants.
     * @param DeviceModel $values The values for the device(s).
     * @return boolean
     * @throws \Speicher210\KontaktIO\Exception\ApiException
     */
    public function update($uniqueId, $deviceType, DeviceModel $values)
    {
        $jsonSerialized = $this->serializer->serialize($values, 'json');
        $values = \GuzzleHttp\json_decode($jsonSerialized, true);

        $values['uniqueId'] = implode(',', (array)$uniqueId);
        $values['deviceType'] = $deviceType;

        try {
            $response = $this->client->post(
                '/device/update',
                [
                    'form_params' => $values,
                    'headers' => [
                        'Content-Type' => 'application/x-www-form-urlencoded',
                    ],
                ]
            );

            return $response->getStatusCode() === 200;
        } catch (ClientException $e) {
            throw $this->createApiException($e);
        }
    }
}
