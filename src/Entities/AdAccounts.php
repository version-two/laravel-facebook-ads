<?php

namespace VersionTwo\LaravelFacebookAds\Entities;

use FacebookAds\Object\AdAccount;
use Illuminate\Support\Collection;
use VersionTwo\LaravelFacebookAds\Traits\AdAccountFormatter;
use VersionTwo\LaravelFacebookAds\Traits\HasAccountUser;

/**
 * Class AdAccounts.
 */
class AdAccounts
{
    use AdAccountFormatter,
        HasAccountUser;

    /**
     * List all user's ads accounts.
     *
     * @param array  $fields
     * @param string $accountId
     * @param array  $params
     *
     * @return Collection
     *
     * @throws \VersionTwo\LaravelFacebookAds\Exceptions\MissingEntityFormatter
     * @see https://developers.facebook.com/docs/marketing-api/reference/ad-account
     */
    public function all(array $fields = [], $accountId = 'me', array $params = []): Collection
    {
        $params['limit'] = $params['limit'] ?? 50000;

        return $this->format(
            $this->accountUser($accountId)->getAdAccounts($fields, $params)
        );
    }

    /**
     * @param array $fields
     * @param       $accountId
     * @param array $params
     *
     * @return Collection
     * @throws \VersionTwo\LaravelFacebookAds\Exceptions\MissingEntityFormatter
     * @see https://developers.facebook.com/docs/marketing-api/reference/ad-account
     */
    public function get(array $fields, $accountId, array $params = [])
    {
        $params['limit'] = $params['limit'] ?? 50000;

        return $this->format(
            (new AdAccount($accountId))->getSelf($fields, $params)
        );
    }
}
