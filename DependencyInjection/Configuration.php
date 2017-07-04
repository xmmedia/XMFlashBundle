<?php

namespace XM\FlashBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use XM\FlashBundle\SymfonyFlashHandler;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('xm_flash');

        $rootNode
            ->children()
                ->scalarNode('handler')
                ->defaultValue(SymfonyFlashHandler::class)
                ->end()
            ->end();

        return $treeBuilder;
    }
}
