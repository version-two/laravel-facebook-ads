<?php

namespace VersionTwo\LaravelFacebookAds\Traits;

use VersionTwo\LaravelFacebookAds\Entities\Ad;

/**
 * Class AdFormatter.
 */
trait AdFormatter
{
    use Formatter;

    protected $entity = Ad::class;
}
