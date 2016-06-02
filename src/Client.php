<?php

namespace Speicher210\KontaktIO;

use function GuzzleHttp\default_user_agent;

class Client extends \GuzzleHttp\Client
{
    const API_VERSION_STABLE = '7';

    const API_VERSION_LATEST = '8';

    /**
     * Constructor.
     *
     * @param string $apiKey
     * @param string $version
     */
    public function __construct($apiKey, $version = self::API_VERSION_STABLE)
    {
        parent::__construct(
            [
                'base_uri' => 'https://api.kontakt.io',
                'headers' => [
                    'Accept' => 'application/vnd.com.kontakt+json;version='.$version,
                    'Api-Key' => $apiKey,
                    'User-Agent' => 'Speicher210/KontaktIO '.default_user_agent(),
                ],
            ]
        );
    }
}
