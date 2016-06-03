<?php

namespace Speicher210\KontaktIO\Exception;

use Psr\Http\Message\ResponseInterface;
use Speicher210\KontaktIO\Model\ApiErrorResponse;

/**
 * Exception thrown whe the API key is not valid or not having enough permissions.
 */
class ApiKeyInvalidException extends ApiException
{
    /**
     * Constructor.
     *
     * @param ResponseInterface $response The API response.
     */
    public function __construct(ResponseInterface $response)
    {
        $apiErrorResponse = new ApiErrorResponse();
        $apiErrorResponse->setStatus($response->getStatusCode());
        $apiErrorResponse->setMessage($response->getReasonPhrase());

        parent::__construct($apiErrorResponse);
    }
}
