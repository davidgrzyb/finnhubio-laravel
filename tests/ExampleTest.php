<?php

namespace Davidgrzyb\LaravelFinnhubio\Tests;

use Orchestra\Testbench\TestCase;
use Davidgrzyb\LaravelFinnhubio\LaravelFinnhubioServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [LaravelFinnhubioServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
