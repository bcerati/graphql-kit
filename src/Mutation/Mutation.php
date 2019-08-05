<?php
namespace Bcerati\GraphqlKit\Mutation;

use Bcerati\GraphqlKit\EndPoint\EndPointInterface;
use Bcerati\GraphqlKit\EndPoint\EndPointTrait;
use GraphQL\Type\Definition\ObjectType;

/**
 * Class Mutation
 *
 * @package Bcerati\GraphqlKit\Mutation
 */
class Mutation extends ObjectType
{
    use EndPointTrait;

    /**
     * Mutation constructor.
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
            'name' => 'Mutation',
            'fields' => $this->parseEndpoints(),
        ];
    }

    /**
     * Parse the endpoints injected with the compiler pass
     *
     * @return array
     */
    protected function parseEndpoints(): array
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
