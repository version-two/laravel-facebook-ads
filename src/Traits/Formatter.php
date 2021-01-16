<?php

namespace VersionTwo\LaravelFacebookAds\Traits;

use FacebookAds\Cursor;
use Illuminate\Support\Collection;
use FacebookAds\Object\AbstractObject;
use VersionTwo\LaravelFacebookAds\Exceptions\MissingEntityFormatter;

/**
 * Class Formatter.
 */
trait Formatter
{
    /**
     * ProcessTransform a FacebookAds\Cursor object into a Collection.
     *
     * @param Cursor|AbstractObject $response
     *
     * @return Collection|AbstractObject
     * @throws MissingEntityFormatter
     */
    protected function format($response)
    {
        if ($this->entity === null) {
            throw new MissingEntityFormatter('To use the FormatterTrait you must provide a entity');
        }

        switch (true) {
            case $response instanceof Cursor:
                $data = new Collection;
                while ($response->current()) {
                    $data->push(new $this->entity($response->current()));
                    $response->next();
                }

                return $data;

            case $response instanceof AbstractObject:
                return new $this->entity($response);
        }
    }
}
