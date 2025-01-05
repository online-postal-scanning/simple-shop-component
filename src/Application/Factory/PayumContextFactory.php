<?php
declare(strict_types=1);

namespace OLPS\SimpleShop\Factory;

use OLPS\SimpleShop\Entity\PayumContext;
use Payum\Core\Payum;
use Psr\Container\ContainerInterface;

class PayumContextFactory
{
    // todo: set up repo
    public function __invoke(ContainerInterface $container): PayumContext
    {
        $config = $container->get('config');
        $payum = $container->get(Payum::class);
        if (!$payum) {
            $payum = $this->payumFactory($container);
        }
        return new PayumContext(
            $container->get(),
            $config['payum'],  
        );
    }

    private function payumFactory(array $config): Payum
    {
        $builder = new PayumBuilder();

        foreach ($config['gateways'] as $name => $gateway) {
            $builder->addGateway($name, $gateway);
        }
        ->addGateway('aGateway', [
            'factory' => 'offline',
        ])
    
        return $builder->getPayum();
    }
}