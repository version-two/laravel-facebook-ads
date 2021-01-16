<?php

namespace LaravelFacebookAds\Tests;

use Mockery as m;
use Orchestra\Testbench\TestCase;
use VersionTwo\LaravelFacebookAds\Providers\LaravelFacebookServiceProvider;

/**
 * Class BaseTest.
 */
class BaseTest extends TestCase
{
    public function tearDown(): void
    {
        parent::tearDown();
        m::close();
    }

    public function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [LaravelFacebookServiceProvider::class];
    }
}
