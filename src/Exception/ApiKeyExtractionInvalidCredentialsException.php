<?php

declare(strict_types = 1);

namespace Speicher210\KontaktIO\Exception;

/**
 * Exception thrown when the username and password are not valid for API key extraction.
 */
class ApiKeyExtractionInvalidCredentialsException extends \RuntimeException
{
    protected $message = 'Could not extract API key. Check credentials.';
}
