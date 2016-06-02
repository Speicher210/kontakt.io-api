<?php

namespace Speicher210\KontaktIO;

use GuzzleHttp\Client;

/**
 * Get the API key using username and password.
 */
class ApiKeyExtractor
{
    /**
     * Get the API key using a username and password combination.
     *
     * @param string $username The username.
     * @param string $password The password.
     * @return string
     */
    public static function getApiKey($username, $password)
    {
        $client = new Client(['cookies' => true, 'allow_redirects' => false]);
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
            throw new \RuntimeException('Could not extract API key. Check credentials.');
        }

        return (string)$response->getBody();
    }
}
