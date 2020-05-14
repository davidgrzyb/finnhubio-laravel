<?php

namespace Davidgrzyb\LaravelFinnhubio;

use GuzzleHttp\Client;
use Davidgrzyb\LaravelFinnhubio\Finnhubio\Api;
use Davidgrzyb\LaravelFinnhubio\Finnhubio\Forex;
use Davidgrzyb\LaravelFinnhubio\Finnhubio\Crypto;
use Davidgrzyb\LaravelFinnhubio\Finnhubio\StockPrice;

class Finnhubio
{
    public static function stock()
    {
        return self::make(StockPrice::class);
    }

    public static function forex()
    {
        return self::make(Forex::class);
    }

    public static function crypto()
    {
        return self::make(Crypto::class);
    }

    private static function make($api)
    {
        return new $api(new Client([
            'base_uri' => 'https://finnhub.io/api/v1/',
        ]));
    }
}
