<?php
namespace oerpub\oerpubBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('oerpub');
        $rootNode->
        children()
            ->scalarNode('class_manager')
            ->isRequired()
            ->cannotBeEmpty()
            ->end()
            ->end()
        ;
        return $treeBuilder;
    }
}