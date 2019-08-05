<?php
namespace Bcerati\GraphqlKit;

use Bcerati\GraphqlKit\Mutation\MutationInterface;
use Bcerati\GraphqlKit\Query\QueryInterface;
use GraphQL\Type\Schema as BaseSchema;

/**
 * Class Schema
 *
 * @package Bcerati\GraphqlKit
 */
class Schema extends BaseSchema
{
    /** @var QueryInterface */
    protected $query;

    /** @var MutationInterface */
    protected $mutation;

    /**
     * Schema constructor.
     * @param QueryInterface $query
     *
     * @param MutationInterface $mutation
     */
    public function __construct(QueryInterface $query, MutationInterface $mutation)
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

    /** @return QueryInterface */
    public function getQuery(): QueryInterface
    {
        return $this->query;
    }

    /**
     * Set the value of the property Query
     *
     * @param QueryInterface $query
     *
     * @return Schema
     */
    public function setQuery(QueryInterface $query): Schema
    {
        $this->query = $query;

        return $this;
    }

    /**
     * Get the value of the property Mutation
     *
     * @return MutationInterface
     */
    public function getMutation(): MutationInterface
    {
        return $this->mutation;
    }

    /**
     * Set the value of the property Mutation
     *
     * @param MutationInterface $mutation
     *
     * @return Schema
     */
    public function setMutation(MutationInterface $mutation): Schema
    {
        $this->mutation = $mutation;

        return $this;
    }
}
