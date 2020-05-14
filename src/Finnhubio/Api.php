<?php

namespace Davidgrzyb\LaravelFinnhubio\Finnhubio;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class Api
{
    protected $client;

    const RESOLUTIONS = ['1', '5', '15', '30', '60', 'D', 'W', 'M'];

    public function __construct($client)
    {
        $this->client = $client;
    }

    public function query(string $endpoint, ?array $options = [])
    {
        $result = json_decode($this->client->get($endpoint, [
            'query' => array_merge([
                'token' => config('finnhubio.token'),
            ], $options),
        ])->getBody(), true);

        return $result;
    }
}
