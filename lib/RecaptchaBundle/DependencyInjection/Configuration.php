<?php

namespace Grafikart\RecaptchaBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{

    /**
     * Generates the configuration tree builder.
     *
     * @return \Symfony\Component\Config\Definition\Builder\TreeBuilder The tree builder
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {

        $treeBuilder = new TreeBuilder('recaptcha');
        $rootNode = $treeBuilder->getRootNode();

        // configutaion settings values
        $rootNode
            ->children()
            ->scalarNode('key')
            ->isRequired()
            ->cannotBeEmpty()
            ->end()
            ->scalarNode('secret')
            ->cannotBeEmpty()
            ->isRequired()
            ->end()
            ->end();

        return $treeBuilder;
    }
}
