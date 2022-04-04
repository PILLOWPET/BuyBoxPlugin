<?php

declare(strict_types=1);

namespace Onatera\SyliusBuyboxPlugin\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

final class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('sylius_buybox_plugin');
        $rootNode = $treeBuilder->getRootNode();

        $rootNode
            ->children()
                ->booleanNode('sandbox')->defaultTrue()->end()
                ->arrayNode('logging')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->booleanNode('increased')
                            ->defaultFalse()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
