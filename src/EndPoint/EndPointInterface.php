<?php
namespace Bcerati\GraphqlKit\EndPoint;

/**
 * Interface EndPointInterface
 *
 * @package Bcerati\GraphqlKit\EndPoint
 */
interface EndPointInterface
{
    /**
     * Get the name of the endpoint
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Transform the object into an array
     *
     * @return array
     */
    public function toArray(): array;
}
