<?php

declare(strict_types = 1);

namespace Speicher210\KontaktIO\Exception;

use Psr\Http\Message\ResponseInterface;
use Speicher210\KontaktIO\Model\ApiErrorResponse;

/**
 * Exception thrown whe the API key is not valid or not having enough permissions.
 */
final class ApiKeyInvalidException extends ApiException
{
    /**
     * @param ResponseInterface $response The API response.
     * @return ApiKeyInvalidException
     */
    public static function forResponse(ResponseInterface $response): ApiKeyInvalidException
    {
        $apiErrorResponse = new ApiErrorResponse();
        $apiErrorResponse->setStatus($response->getStatusCode());
        $apiErrorResponse->setMessage($response->getReasonPhrase());

        return new static($apiErrorResponse);
    }
}
