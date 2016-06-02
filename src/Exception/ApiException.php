<?php

namespace Speicher210\KontaktIO\Exception;

use Speicher210\KontaktIO\Model\ApiErrorResponse;

/**
 * Exception thrown when the API returns an error.
 */
class ApiException extends \RuntimeException
{
    /**
     * The API error response.
     *
     * @var ApiErrorResponse
     */
    protected $apiErrorResponse;

    /**
     * Constructor.
     *
     * @param ApiErrorResponse $apiErrorResponse The API error response.
     * @param \Exception|null $previous Previous exception.
     */
    public function __construct(ApiErrorResponse $apiErrorResponse, \Exception $previous = null)
    {
        parent::__construct($apiErrorResponse->getMessage(), $apiErrorResponse->getStatus(), $previous);

        $this->apiErrorResponse = $apiErrorResponse;
    }

    /**
     * Get the API error response.
     *
     * @return ApiErrorResponse
     */
    public function getApiErrorResponse()
    {
        return $this->apiErrorResponse;
    }
}
