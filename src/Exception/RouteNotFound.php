<?php
namespace Bcerati\GraphqlKit\Exception;

use Throwable;

/**
 * Class RouteNotFound
 *
 * @package Bcerati\GraphqlKit\Exception
 */
class RouteNotFound extends \Exception
{
    public function __construct($message = "", $code = 404, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}