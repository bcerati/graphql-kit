<?php
namespace Bcerati\GraphqlKit;

use Bcerati\GraphqlKit\DependencyInjection\Compiler\TagEndPointsPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class BceratiGraphqlKitBundle
 *
 * @package Bcerati\GraphqlKit
 */
class BceratiGraphqlKitBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new TagEndPointsPass());
    }
}
