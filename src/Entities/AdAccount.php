<?php

namespace VersionTwo\LaravelFacebookAds\Entities;

use Illuminate\Support\Collection;
use VersionTwo\LaravelFacebookAds\Traits\AdFormatter;

/**
 * Class AdAccount.
 */
class AdAccount extends AbstractEntity
{
    use AdFormatter;

    /**
     * Get the account ads.
     *
     * @param array $fields
     * @param array $params
     *
     * @return Collection
     *
     * @throws \VersionTwo\LaravelFacebookAds\Exceptions\MissingEntityFormatter
     * @see https://developers.facebook.com/docs/marketing-api/reference/adgroup#Reading
     */
    public function ads(array $fields = [], array $params = []): Collection
    {
        $params['limit'] = $params['limit'] ?? 50000;

        return $this->format(
            $this->response->getAds($fields, $params)
        );
    }
}
