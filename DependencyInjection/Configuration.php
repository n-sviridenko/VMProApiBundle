<?php

namespace MovingImage\Bundle\VMProApiBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration.
 *
 * @author Ruben Knol <ruben.knol@movingimage.com>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * @const Which API base URL to use by default.
     */
    const DEFAULT_API_BASE_URL = 'https://api.video-cdn.net/v1/vms/';

    /**
     * Build the configuration structure for this bundle.
     *
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('vm_pro_api');

        $rootNode
            ->children()
                ->scalarNode('base_url')
                    ->defaultValue(self::DEFAULT_API_BASE_URL)
                ->end()
                ->integerNode('default_vm_id')
                    ->defaultValue(0)
                ->end()
                ->arrayNode('credentials')
                    ->isRequired()
                    ->children()
                        ->scalarNode('username')->isRequired()->end()
                        ->scalarNode('password')->isRequired()->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
