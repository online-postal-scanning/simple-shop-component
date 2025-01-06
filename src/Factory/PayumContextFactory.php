<?php
declare(strict_types=1);

namespace OLPS\SimpleShopComponent\Factory;

use ConfigValue\GatherConfigValues;
use OLPS\SimpleShop\Entity\PayumContext;
use Payum\Core\Payum;
use Payum\Core\PayumBuilder;
use Psr\Container\ContainerInterface;

class PayumContextFactory
{
    // todo: set up repo
    public function __invoke(ContainerInterface $container): PayumContext
    {
        $payum = $container->get(Payum::class);
        if (!$payum) {
            $payum = $this->payumFactory($container);
        }
        return new PayumContext($payum);
    }

    private function payumFactory(ContainerInterface $container): Payum
    {
        $config = (new GatherConfigValues)($container, 'payum');
        $builder = new PayumBuilder();

        foreach ($config['gateways'] as $name => $gateway) {
            $builder->addGateway($name, $gateway);
        }
    
        return $builder->getPayum();
    }
}