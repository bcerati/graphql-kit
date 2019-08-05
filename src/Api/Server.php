<?php
namespace Bcerati\GraphqlKit\Api;

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
     * @return JsonResponse
     */
    public function __invoke(Request $request, Schema $schema)
    {
        $rawInput = $request->getContent();
        $input = json_decode($rawInput, true);

        $query = $input['query'];
        $variableValues = $input['variables'] ?? null;

        $result = GraphQL::executeQuery($schema, $query, null, null, $variableValues);

        $debug = getenv('APP_ENV') === 'dev';

        return new JsonResponse($result->toArray($debug));
    }
}
