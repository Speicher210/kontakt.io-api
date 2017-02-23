<?php

declare(strict_types = 1);

namespace Speicher210\KontaktIO\Resource;

use GuzzleHttp\Exception\ClientException;
use Speicher210\KontaktIO\AbstractResource;
use Speicher210\KontaktIO\Model\Manager as ManagerModel;

/**
 * Manager resource.
 */
class Manager extends AbstractResource
{
    /**
     * Get a manager.
     *
     * @param string $id The manager UUID.
     * @return ManagerModel
     * @throws \Speicher210\KontaktIO\Exception\ApiException
     */
    public function getManager($id)
    {
        try {
            $response = $this->client->get('/manager/' . $id);

            return $this->serializer->deserialize($response->getBody(), ManagerModel::class, 'json');
        } catch (ClientException $e) {
            throw $this->createApiException($e);
        }
    }

    /**
     * Get the manager for the user owing the API key.
     *
     * @return ManagerModel
     * @throws \Speicher210\KontaktIO\Exception\ApiException
     */
    public function getMyManager()
    {
        return $this->getManager('me');
    }
}
