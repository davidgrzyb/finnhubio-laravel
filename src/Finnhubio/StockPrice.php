<?php

namespace Davidgrzyb\LaravelFinnhubio\Finnhubio;

use Carbon\Carbon;
use GuzzleHttp\Client;

class StockPrice extends Api
{
    public function getQuote(string $symbol)
    {
        return $this->query('quote', [
            'symbol' => $symbol,
        ]);
    }

    public function getCandles(string $symbol, string $resolution, ?Carbon $from = null, ?Carbon $to = null, bool $adjusted = false)
    {
        return $this->query('stock/candle', [
            'symbol' => $symbol,
            'resolution' => $resolution,
            'from' => optional($from)->timestamp,
            'to' => optional($to)->timestamp,
            'adjusted' => $adjusted,
        ]);
    }

    public function getDividends(string $symbol, Carbon $from, Carbon $to)
    {
        return $this->query('stock/dividend', [
            'symbol' => $symbol,
            'from' => $from->format('Y-m-d'),
            'to' => $to->format('Y-m-d'),
        ]);
    }

    public function getSplits(string $symbol, Carbon $from, Carbon $to)
    {
        return $this->query('stock/split', [
            'symbol' => $symbol,
            'from' => $from->format('Y-m-d'),
            'to' => $to->format('Y-m-d'),
        ]);
    }
}
