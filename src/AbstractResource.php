<?php

namespace Speicher210\KontaktIO;

use GuzzleHttp\Exception\ClientException;
use JMS\Serializer\SerializerInterface;
use Speicher210\KontaktIO\Exception\ApiException;
use Speicher210\KontaktIO\Exception\ApiKeyInvalidException;
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
        $response = $e->getResponse();

        if ($response->getStatusCode() === 401 || $response->getStatusCode() === 403) {
            throw new ApiKeyInvalidException($response);
        }

        if ($response->getBody()->getSize() > 0) {
            /** @var ApiErrorResponse $apiErrorResponse */
            $apiErrorResponse = $this->serializer->deserialize(
                $e->getResponse()->getBody(),
                ApiErrorResponse::class,
                'json'
            );
        } else {
            $apiErrorResponse = new ApiErrorResponse();
            $apiErrorResponse->setStatus($response->getStatusCode());
            $apiErrorResponse->setMessage($response->getReasonPhrase());
        }

        return new ApiException($apiErrorResponse, $e);
    }
}
