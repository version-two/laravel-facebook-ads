<?php

namespace VersionTwo\LaravelFacebookAds\Entities;

use Illuminate\Support\Collection;
use VersionTwo\LaravelFacebookAds\Traits\AdFormatter;

/**
 * Class AdAccount.
 */
class InstagramAccount extends AbstractEntity
{
    use AdFormatter;

    /**
     * Get the account ads.
     *
     * @param array $fields
     *
     * @return Collection
     *
     * @see https://developers.facebook.com/docs/marketing-api/reference/adgroup#Reading
     * @throws \VersionTwo\LaravelFacebookAds\Exceptions\MissingEntityFormatter
     */
    public function ads(array $fields = []): Collection
    {
        $ads = $this->response->getAds($fields);

        return $this->format($ads);
    }
}
