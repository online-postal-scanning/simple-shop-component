<?php
declare(strict_types=1);

namespace OLPS\SimpleShopComponent\Factory;

use OLPS\SimpleShop\Entity\PayumContext;
use Payum\Core\Payum;
use Psr\Container\ContainerInterface;

class PayumContextFactory
{
    public function __invoke(ContainerInterface $container): PayumContext
    {
        return new PayumContext($container->get(Payum::class));
    }
}
