<?php

namespace VersionTwo\LaravelFacebookAds\Entities;

use FacebookAds\Object\AbstractObject;
use Illuminate\Contracts\Support\Arrayable;

/**
 * Class Entity.
 */
abstract class AbstractEntity implements Arrayable
{
    /**
     * @var AbstractObject|array
     */
    protected $response;

    public function __construct($class = [])
    {
        $this->response = $class;
    }

    public function rawResponse()
    {
        return $this->response;
    }

    /**
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        if (method_exists($this->response, 'get_data')
            && array_key_exists($name, $this->response->getData())
        ) {
            return $this->response->getData()[$name];
        }

        return $this->response->{$name};
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        if (method_exists($this->response, 'get_data')) {
            return $this->response->getData();
        }

        return (array) $this->response;
    }
}
