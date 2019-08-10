<?php
namespace Bcerati\GraphqlKit\Type;

use GraphQL\Type\Definition\ResolveInfo;

/**
 * Class FieldResolver
 *
 * @package App\Type
 */
class FieldResolver
{
    public static function resovleField($value, array $args, $context, ResolveInfo $info)
    {
        if (is_object($value)) {
            return self::resolveObjectField($value, $args, $context, $info);
        } elseif (is_array($value)) {
            return self::resolveArrayField($value, $args, $context, $info);
        }

        return $value;
    }

    /**
     * @param object $value
     * @param array $args
     * @param $context
     * @param ResolveInfo $info
     *
     * @return mixed
     */
    protected static function resolveObjectField(object $value, array $args, $context, ResolveInfo $info)
    {
        $method = sprintf('get%s', ucfirst(self::camelCase($info->fieldName)));

        if (method_exists($value, $method)) {
            return $value->$method();
        }

        // todo try to use reflexion class
        return null;
    }

    /**
     * @param array $value
     * @param array $args
     * @param $context
     * @param ResolveInfo $info
     *
     * @return mixed
     */
    protected static function resolveArrayField(array $value, array $args, $context, ResolveInfo $info)
    {
        return $value[$info->fieldName] ?? null;
    }

    /**
     * Make a string to a camel case one
     *
     * @param $str
     * @param array $noStrip
     * @return mixed|string|string[]|null
     */
    protected static function camelCase($str, array $noStrip = [])
    {
        $str = preg_replace('/[^a-z0-9' . implode("", $noStrip) . ']+/i', ' ', $str);
        $str = trim($str);
        $str = ucwords($str);
        $str = str_replace(" ", "", $str);
        $str = lcfirst($str);

        return $str;
    }
}