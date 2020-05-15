<?php

namespace Davidgrzyb\LaravelFinnhubio\Api;

use Carbon\Carbon;

class Forex extends Api
{
    const EXCHANGES_ENDPOINT = 'forex/exchange';
    const SYMBOLS_ENDPOINT = 'forex/symbol';
    const CANDLES_ENDPOINT = 'forex/candle';
    const RATES_ENDPOINT = 'forex/rates';

    /**
     * Queries Finnhub.io API for supported forex exchanges.
     * https://finnhub.io/docs/api#forex-exchanges
     * 
     * @return Object Decoded data returned by API.
     */
    public function getExchanges()
    {
        return $this->query(self::EXCHANGES_ENDPOINT);
    }

    /**
     * Queries Finnhub.io API for symbols of the specified exchange.
     * https://finnhub.io/docs/api#forex-symbols
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
     * Queries Finnhub.io API for candle data of the specified forex symbol/currency.
     * https://finnhub.io/docs/api#forex-candles
     * 
     * @param string $symbol The exact name of the forex symbol.
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

    /**
     * Queries Finnhub.io API for forex rate data.
     * https://finnhub.io/docs/api#forex-rates
     * 
     * @return Object Decoded data returned by API.
     */
    public function getRates()
    {
        return $this->query(self::RATES_ENDPOINT);
    }
}
