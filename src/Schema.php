<?php
namespace Bcerati\GraphqlKit;

use Bcerati\GraphqlKit\Mutation\Mutation;
use Bcerati\GraphqlKit\Query\Query;
use GraphQL\Type\Schema as BaseSchema;

/**
 * Class Schema
 *
 * @package Bcerati\GraphqlKit
 */
class Schema extends BaseSchema
{
    /** @var Query */
    protected $query;

    /** @var Mutation */
    protected $mutation;

    /**
     * Schema constructor.
     *
     * @param Query $query
     * @param Mutation $mutation
     */
    public function __construct(Query $query, Mutation $mutation)
    {
        $this->setQuery($query);
        $this->setMutation($mutation);

        parent::__construct($this->getSchemaConfig());
    }

    /**
     * Build the config array
     *
     * @return array
     */
    protected function getSchemaConfig(): array
    {
        return [
            'query' => $this->getQuery(),
            'mutation' => $this->getMutation()
        ];
    }

    /** @return Query */
    public function getQuery(): Query
    {
        return $this->query;
    }

    /**
     * Set the value of the property Query
     *
     * @param Query $query
     *
     * @return Schema
     */
    public function setQuery(Query $query): Schema
    {
        $this->query = $query;

        return $this;
    }

    /**
     * Get the value of the property Mutation
     *
     * @return Mutation
     */
    public function getMutation(): Mutation
    {
        return $this->mutation;
    }

    /**
     * Set the value of the property Mutation
     *
     * @param Mutation $mutation
     *
     * @return Schema
     */
    public function setMutation(Mutation $mutation): Schema
    {
        $this->mutation = $mutation;

        return $this;
    }
}
