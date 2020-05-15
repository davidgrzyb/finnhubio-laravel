<?php

namespace Davidgrzyb\LaravelFinnhubio\Api;

use Carbon\Carbon;
use GuzzleHttp\Client;

class StockPrice extends Api
{
    const QUOTE_ENDPOINT = 'quote';
    const CANDLES_ENDPOINT = 'stock/candle';
    const DIVIDEND_ENDPOINT = 'stock/dividend';
    const SPLITS_ENDPOINT = 'stock/split';

    /**
     * Queries Finnhub.io API for quote data of the specified stock symbol.
     * https://finnhub.io/docs/api#quote
     * 
     * @param string $symbol The exact name of the stock symbol.
     * @return Object Decoded data returned by API.
     */
    public function getQuote(string $symbol)
    {
        return $this->query(self::QUOTE_ENDPOINT, [
            'symbol' => $symbol,
        ]);
    }

    /**
     * Queries Finnhub.io API for candle data of the specified stock symbol.
     * https://finnhub.io/docs/api#stock-candles
     * 
     * @param string $symbol The exact name of the stock symbol.
     * @param string $resolution Supported resolution includes 1, 5, 15, 30, 60, D, W, M.
     * @param Carbon $from Interval initial value.
     * @param Carbon $to Interval end value.
     * @param bool $adjusted Enable to get adjusted data.
     * @return Object Decoded data returned by API.
     */
    public function getCandles(string $symbol, string $resolution, ?Carbon $from = null, ?Carbon $to = null, bool $adjusted = false)
    {
        return $this->query(self::CANDLES_ENDPOINT, [
            'symbol' => $symbol,
            'resolution' => $resolution,
            'from' => optional($from)->timestamp,
            'to' => optional($to)->timestamp,
            'adjusted' => $adjusted,
        ]);
    }

    /**
     * Queries Finnhub.io API for dividend data of the specified stock symbol.
     * https://finnhub.io/docs/api#stock-dividends
     * 
     * @param string $symbol The exact name of the stock symbol.
     * @param Carbon $from Interval initial value.
     * @param Carbon $to Interval end value.
     * @return Object Decoded data returned by API.
     */
    public function getDividends(string $symbol, Carbon $from, Carbon $to)
    {
        return $this->query(self::DIVIDEND_ENDPOINT, [
            'symbol' => $symbol,
            'from' => $from->format('Y-m-d'),
            'to' => $to->format('Y-m-d'),
        ]);
    }

    /**
     * Queries Finnhub.io API for split data of the specified stock symbol.
     * https://finnhub.io/docs/api#stock-splits
     * 
     * @param string $symbol The exact name of the stock symbol.
     * @param Carbon $from Interval initial value.
     * @param Carbon $to Interval end value.
     * @return Object Decoded data returned by API.
     */
    public function getSplits(string $symbol, Carbon $from, Carbon $to)
    {
        return $this->query(self::SPLITS_ENDPOINT, [
            'symbol' => $symbol,
            'from' => $from->format('Y-m-d'),
            'to' => $to->format('Y-m-d'),
        ]);
    }
}
