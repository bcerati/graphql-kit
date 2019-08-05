<?php
namespace Bcerati\GraphqlKit\DependencyInjection\Compiler;

use Bcerati\GraphqlKit\Mutation\Mutation;
use Bcerati\GraphqlKit\Query\Query;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Class TagEndPointsPass
 *
 * @package Bcerati\GraphqlKit\DependencyInjection\Compiler
 */
class TagEndPointsPass implements CompilerPassInterface
{
    /** @inheritDoc */
    public function process(ContainerBuilder $container)
    {
        //TODO refactor this
        $queryTaggedServices = $container->findTaggedServiceIds('graphql.schema.query.field');
        $queryServiceIDs = array_keys($queryTaggedServices);

        $queryFields = [];
        foreach ($queryServiceIDs as $id) {
            $queryFields[] = new Reference($id);
        }

        $container
            ->getDefinition(Query::class)
            ->setArguments($queryFields);

        //TODO refactor this
        $mutationTaggedServices = $container->findTaggedServiceIds('graphql.schema.mutation.field');
        $mutationServiceIDs = array_keys($mutationTaggedServices);

        $mutationFields = [];
        foreach ($mutationServiceIDs as $id) {
            $mutationFields[] = new Reference($id);
        }

        $container
            ->getDefinition(Mutation::class)
            ->setArguments($mutationFields);
    }
}