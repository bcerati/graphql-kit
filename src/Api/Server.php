<?php
namespace Bcerati\GraphqlKit\Api;

use Bcerati\GraphqlKit\Exception\RouteNotFound;
use Bcerati\GraphqlKit\Schema;
use GraphQL\GraphQL;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class Server
 *
 * @package Bcerati\GraphqlKit\Api
 */
class Server
{
    /**
     * @param Request $request
     * @param Schema $schema
     *
     * @throws RouteNotFound
     * @return JsonResponse
     */
    public function __invoke(Request $request, Schema $schema)
    {
        if ($request->getMethod() !== 'POST') {
            throw new RouteNotFound("This endoint can only be used in a POST HTTP request!");
        }

        $rawInput = $request->getContent();
        $input = json_decode($rawInput, true);

        $query = $input['query'];
        $variableValues = $input['variables'] ?? null;

        $result = GraphQL::executeQuery($schema, $query, null, null, $variableValues);

        $debug = getenv('APP_ENV') === 'dev';

        return new JsonResponse($result->toArray($debug));
    }
}
