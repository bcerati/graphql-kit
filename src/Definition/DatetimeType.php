<?php
namespace Bcerati\GraphqlKit\Definition;

use Bcerati\GraphqlKit\Exception\TypeException;
use Exception;
use GraphQL\Language\AST\Node;
use GraphQL\Type\Definition\ScalarType;

/**
 * Class DatetimeType
 *
 * @package Bcerati\GraphqlKit\Definition
 */
class DatetimeType extends ScalarType
{
    /** @inheritdoc */
    public function serialize($value)
    {
        if (!$value instanceof \DateTime) {
            throw new TypeException('Not a valid date!');
        }

        return $value->format('c');
    }

    /**
     * @inheritdoc
     *
     * @throws Exception
     */
    public function parseValue($value)
    {
        return new \DateTime($value);
    }
}
