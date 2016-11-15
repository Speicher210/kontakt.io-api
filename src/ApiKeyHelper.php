<?php

namespace Speicher210\KontaktIO;

use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Exception\ClientException;
use Speicher210\KontaktIO\Exception\ApiKeyExtractionInvalidCredentialsException;

/**
 * Helper functions around the API key.
 */
class ApiKeyHelper
{
    /**
     * Get the API key using a username and password combination.
     *
     * @param string $username The username.
     * @param string $password The password.
     * @return string
     * @throws \Speicher210\KontaktIO\Exception\ApiKeyExtractionInvalidCredentialsException
     */
    public function getApiKey($username, $password)
    {
        $client = new GuzzleHttpClient(['cookies' => true, 'allow_redirects' => false]);
        $client->post(
            'https://panel.kontakt.io/signin',
            [
                'form_params' => [
                    'username' => $username,
                    'password' => $password,
                ],
            ]
        );

        $response = $client->get('https://panel.kontakt.io/api-key');

        if ($response->getStatusCode() !== 200) {
            throw new ApiKeyExtractionInvalidCredentialsException();
        }

        return (string)$response->getBody();
    }

    public function apiKeyIsValid($apiKey)
    {
        $client = new Client($apiKey);

        try {
            $client->get('/manager/me');

            return true;
        } catch (ClientException $e) {
            if ($e->getResponse()->getStatusCode() === 401) {
                return false;
            }

            throw $e;
        }
    }
}