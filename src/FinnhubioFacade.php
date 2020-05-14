<?php

namespace Davidgrzyb\LaravelFinnhubio;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Davidgrzyb\LaravelFinnhubio\Skeleton\SkeletonClass
 */
class FinnhubioFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'finnhubio';
    }
}
