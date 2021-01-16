<?php

namespace VersionTwo\LaravelFacebookAds\Contracts;

use VersionTwo\LaravelFacebookAds\FacebookAds;

/**
 * Interface LaravelFacebookAdsContract.
 */
interface LaravelFacebookAdsContract
{
    /**
     * Initialize the Facebook Ads SDK.
     *
     * @param $accessToken
     *
     * @return FacebookAds
     */
    public function init($accessToken): FacebookAds;
}
