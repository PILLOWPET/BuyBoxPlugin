<?php

declare(strict_types=1);

namespace Onatera\SyliusBuyboxPlugin\DependencyInjection;

use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

final class OnateraSyliusBuyboxExtension extends Extension
{
    public function load(array $config, ContainerBuilder $container): void
    {
        $config = $this->processConfiguration($this->getConfiguration([], $container), $config);
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));

        $container->setParameter('sylius.buybox.logging.increased', (bool) $config['logging']['increased']);

        if ($config['sandbox']) {
            $container->setParameter('sylius.buybox.facilitator_url', 'https://paypal.sylius.com');
            $container->setParameter('sylius.buybox.api_base_url', ' https://sandbox.buybox.net/');
            $container->setParameter('sylius.buybox.reports_sftp_host', 'reports.sandbox.paypal.com');
        } else {
            $container->setParameter('sylius.buybox.facilitator_url', 'https://prod.paypal.sylius.com');
            $container->setParameter('sylius.buybox.api_base_url', ' https://sandbox.buybox.net/');
            $container->setParameter('sylius.buybox.reports_sftp_host', 'reports.paypal.com');
        }

        $loader->load('services.xml');
    }

    public function getConfiguration(array $config, ContainerBuilder $container): ConfigurationInterface
    {
        return new Configuration();
    }

}
