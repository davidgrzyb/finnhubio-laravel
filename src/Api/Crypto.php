<?php

namespace Davidgrzyb\LaravelFinnhubio\Api;

use Carbon\Carbon;

class Crypto extends Api
{
    const EXCHANGES_ENDPOINT = 'crypto/exchange';
    const SYMBOLS_ENDPOINT = 'crypto/symbol';
    const CANDLES_ENDPOINT = 'crypto/candle';

    /**
     * Queries Finnhub.io API for supported crypto exchanges.
     * https://finnhub.io/docs/api#crypto-exchanges
     * 
     * @return Object Decoded data returned by API.
     */
    public function getExchanges()
    {
        return $this->query(self::EXCHANGES_ENDPOINT);
    }

    /**
     * Queries Finnhub.io API for crypto symbols of the specified exchange.
     * https://finnhub.io/docs/api#crypto-symbols
     * 
     * @param string $exchange The name of the exchange.
     * @return Object Decoded data returned by API.
     */
    public function getSymbols(string $exchange)
    {
        return $this->query(self::SYMBOLS_ENDPOINT, [
            'exchange' => $exchange,
        ]);
    }

    /**
     * Queries Finnhub.io API for candle data of the specified crypto symbol.
     * https://finnhub.io/docs/api#crypto-candles
     * 
     * @param string $symbol The exact name of the crypto symbol.
     * @param string $resolution Supported resolution includes 1, 5, 15, 30, 60, D, W, M.
     * @param Carbon $from Interval initial value.
     * @param Carbon $to Interval end value.
     * @return Object Decoded data returned by API.
     */
    public function getCandles(string $symbol, string $resolution, ?Carbon $from = null, ?Carbon $to = null)
    {
        return $this->query(self::CANDLES_ENDPOINT, [
            'symbol' => $symbol,
            'resolution' => $resolution,
            'from' => optional($from)->timestamp,
            'to' => optional($to)->timestamp,
        ]);
    }
}
