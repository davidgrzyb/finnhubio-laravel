<?php

namespace Davidgrzyb\LaravelFinnhubio\Finnhubio;

use Carbon\Carbon;

class Crypto extends Api
{
    public function getExchanges()
    {
        return $this->query('crypto/exchange');
    }

    public function getSymbols(string $exchange)
    {
        return $this->query('forex/symbol', [
            'exchange' => $exchange,
        ]);
    }

    public function getCandles(string $symbol, string $resolution, ?Carbon $from = null, ?Carbon $to = null)
    {
        return $this->query('forex/candle', [
            'symbol' => $symbol,
            'resolution' => $resolution,
            'from' => optional($from)->timestamp,
            'to' => optional($to)->timestamp,
        ]);
    }
}
