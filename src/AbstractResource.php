<?php

namespace Speicher210\KontaktIO;

use GuzzleHttp\Exception\ClientException;
use JMS\Serializer\SerializerInterface;
use Speicher210\KontaktIO\Exception\ApiException;
use Speicher210\KontaktIO\Model\ApiErrorResponse;

/**
 * Abstract resource.
 */
class AbstractResource
{
    /**
     * The API client.
     *
     * @var Client
     */
    protected $client;

    /**
     * Serializer interface to serialize / deserialize the request / responses.
     *
     * @var SerializerInterface
     */
    protected $serializer;

    /**
     * Constructor.
     *
     * @param Client $client The API client.
     * @param SerializerInterface $serializer Serializer interface to serialize / deserialize the request / responses.
     */
    public function __construct(Client $client, SerializerInterface $serializer)
    {
        $this->client = $client;
        $this->serializer = $serializer;
    }

    /**
     * Create an ApiException from a client exception.
     *
     * @param ClientException $e The client exception.
     * @return ApiException
     */
    protected function createApiException(ClientException $e)
    {
        /** @var ApiErrorResponse $apiErrorResponse */
        $apiErrorResponse = $this->serializer->deserialize(
            $e->getResponse()->getBody(),
            ApiErrorResponse::class,
            'json'
        );

        return new ApiException($apiErrorResponse, $e);
    }
}
