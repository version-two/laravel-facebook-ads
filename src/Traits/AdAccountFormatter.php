<?php

namespace VersionTwo\LaravelFacebookAds\Traits;

use VersionTwo\LaravelFacebookAds\Entities\AdAccount;

/**
 * Class AdAccountFormatter.
 */
trait AdAccountFormatter
{
    use Formatter;

    protected $entity = AdAccount::class;
}
