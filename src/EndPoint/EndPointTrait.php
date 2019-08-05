<?php
namespace Bcerati\GraphqlKit\EndPoint;

/**
 * Trait EndPointTrait
 *
 * @package Bcerati\GraphqlKit\EndPoint
 */
trait EndPointTrait
{
    protected $endpoints = [];

    /**
     * @param EndPointInterface[] $endpoints
     *
     * @return $this
     */
    public function addEndPoint(EndPointInterface...$endpoints)
    {
        array_push($this->endpoints, ...$endpoints);

        return $this;
    }

    /**
     * Get the value of the property $endpoints
     *
     * @return array
     */
    public function getEndPoints(): array
    {
        return $this->endpoints;
    }
}
