<?php
namespace Bcerati\GraphqlKit\EndPoint\Mutation;

use Bcerati\GraphqlKit\EndPoint\EndPointInterface;

/**
 * Interface MutationEndPointInterface.
 *
 * Make sure to implement this interface on each query type,
 * it'll add a specific tag on the service definition
 *
 * @package Bcerati\GraphqlKit\EndPoint\Mutation
 */
interface MutationEndPointInterface extends EndPointInterface
{
}
