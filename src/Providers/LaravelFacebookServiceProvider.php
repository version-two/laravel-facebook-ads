<?php

namespace VersionTwo\LaravelFacebookAds\Providers;

use Illuminate\Support\Str;
use Illuminate\Support\ServiceProvider;
use VersionTwo\LaravelFacebookAds\FacebookAds;
use VersionTwo\LaravelFacebookAds\Contracts\LaravelFacebookAdsContract;

/**
 * Class LaravelFacebookServiceProvider.
 */
class LaravelFacebookServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot(): void
    {
        $this->registerPublishing();

        if ($this->isLumen()) {
            $this->app->configure('facebook-ads');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/facebook-ads.php',
            'facebook-ads'
        );

        $this->app->bind(LaravelFacebookAdsContract::class, function () {
            return $this->createInstance();
        });

        $this->app->singleton('facebook-ads', function () {
            return $this->createInstance();
        });
    }

    protected function registerPublishing(): void
    {
        if ($this->isLumen() === false) {
            $this->publishes([
                __DIR__.'/../../config/facebook-ads.php' => config_path('facebook-ads.php'),
            ], 'facebook-ads');
        }

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../../config/facebook-ads.php' => config_path('facebook-ads.php'),
            ], 'facebook-ads');
        }
    }

    /**
     * @return FacebookAds
     */
    protected function createInstance()
    {
        return new FacebookAds;
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return ['facebook-ads'];
    }

    /**
     * @return bool
     */
    private function isLumen(): bool
    {
        return Str::contains($this->app->version(), 'Lumen');
    }
}
