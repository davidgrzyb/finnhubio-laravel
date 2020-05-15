<?php

namespace Davidgrzyb\LaravelFinnhubio\Api;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Exception\ClientException;

class Api
{
    protected $client;

    public function __construct($client)
    {
        $this->client = $client;
    }

    /**
     * Queries Finnhub.io API with the Guzzle client.
     * 
     * @param string $endpoint The API endpoint being queried.
     * @param array $options The endpoint parameters being sent in the query.
     * @return Object Decoded data returned by API.
     */
    public function query(string $endpoint, ?array $options = [])
    {
        return json_decode($this->client->get($endpoint, [
            'query' => array_merge([
                'token' => config('finnhubio.token'),
            ], $options),
        ])->getBody(), true);
    }
}
