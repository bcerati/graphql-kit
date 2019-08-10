<?php
namespace Bcerati\GraphqlKit\Type;

use GraphQL\Type\Definition\ObjectType as BaseBAseObjectType;

/**
 * Class Type
 *
 * @package Bcerati\GraphqlKit\Type
 */
abstract class ObjectType extends BaseBAseObjectType
{
    protected static $definedTypes = [];

    /** @return ObjectType */
    public static function build(): BaseBAseObjectType
    {
        $config = static::getConfiguration();

        if (!isset(self::$definedTypes[$config['name']])) {
            self::$definedTypes[$config['name']] = new parent($config);
        }

        return self::$definedTypes[$config['name']];
    }

    /**  @return ObjectType */
    public static function instance(): BaseBAseObjectType
    {
        return self::build();
    }

    /** @return ObjectType */
    public static function get(): BaseBAseObjectType
    {
        return self::build();
    }

    /**
     * Get the configuration of the type
     *
     * @return array
     */
    abstract public static function getConfiguration(): array;
}
