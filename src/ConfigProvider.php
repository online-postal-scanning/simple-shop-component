<?php

declare(strict_types=1);

namespace OLPS\SimpleShopComponent;

use OLPS\SimpleShop\Entity\PayumContext;
use OLPS\SimpleShop\Factory\PayumContextFactory;
use OLPS\SimpleShop\Interactor\AuthorizeCard;
use OLPS\SimpleShopComponent\Factory\AuthorizeCardFactory;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => $this->getDependencies(),
        ];
    }

    public function getDependencies(): array
    {
        return [
            'factories'  => [
                AuthorizeCard::class  => AuthorizeCardFactory::class,
                PayumContext::class  => PayumContextFactory::class,
            ],
        ];
    }
}
