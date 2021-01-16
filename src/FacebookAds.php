<?php

namespace VersionTwo\LaravelFacebookAds;

use Illuminate\Support\Traits\Macroable;
use VersionTwo\LaravelFacebookAds\Entities\Campaigns;
use VersionTwo\LaravelFacebookAds\Entities\AdAccounts;
use VersionTwo\LaravelFacebookAds\Entities\InstagramAccounts;

class FacebookAds extends AbstractFacebookAds
{
    use Macroable;

    /**
     * @param $period
     * @param $accountId
     * @param string $level [ad, adset, campaign, account]
     * @param array $params
     *
     * @see https://developers.facebook.com/docs/marketing-api/insights
     *
     * @return \Illuminate\Support\Collection
     */
    public function insights(
        $period,
        $accountId,
        $level,
        array $params
    ) {
        return (new Insights)->get(
            $period,
            $accountId,
            $level,
            $params
        );
    }

    /**
     * @return AdAccounts
     */
    public function adAccounts(): AdAccounts
    {
        return new AdAccounts;
    }

    /**
     * @return InstagramAccounts
     */
    public function instagramAccounts(): InstagramAccounts
    {
        return new InstagramAccounts;
    }

    /**
     * @return Campaigns
     */
    public function campaigns(): Campaigns
    {
        return new Campaigns;
    }
}
