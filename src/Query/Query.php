<?php
namespace Bcerati\GraphqlKit\Query;

use Bcerati\GraphqlKit\EndPoint\EndPointInterface;
use Bcerati\GraphqlKit\EndPoint\EndPointTrait;
use GraphQL\Type\Definition\ObjectType;

/**
 * Class Query
 *
 * @package Bcerati\GraphqlKit\Query
 */
class Query extends ObjectType
{
    use EndPointTrait;

    /**
     * Query constructor.
     *
     * @param EndPointInterface[] $endpoints
     */
    public function __construct(EndPointInterface ...$endpoints)
    {
        $this->addEndPoint(...$endpoints);

        parent::__construct($this->getConfig());
    }

    /**
     * @return array
     */
    protected function getConfig(): array
    {
        return [
            'name' => 'Query',
            'fields' => $this->parseEndPoints(),
        ];
    }

    /**
     * Parse the endpoints injected with the compiler pass
     *
     * @return array
     */
    protected function parseEndPoints(): array
    {
        $endpoints = [];

        /** @var EndPointInterface $endpoint */
        foreach ($this->getEndPoints() as $endpoint)
        {
            $endpoints[$endpoint->getName()] = $endpoint->toArray();
        }

        return $endpoints;
    }
}
