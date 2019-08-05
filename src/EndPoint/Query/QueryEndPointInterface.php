<?php
namespace Bcerati\GraphqlKit\EndPoint\Query;

use Bcerati\GraphqlKit\EndPoint\EndPointInterface;

/**
 * Interface QueryEndPointInterface.
 *
 * Make sure to implement this interface on each query type,
 * it'll add a specific tag on the service definition
 *
 * @package Bcerati\GraphqlKit\EndPoint\Query
 */
interface QueryEndPointInterface extends EndPointInterface
{
}
