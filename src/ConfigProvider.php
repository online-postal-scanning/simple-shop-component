<?php

declare(strict_types=1);

namespace OLPS\SimpleShopComponent;

use OLPS\SimpleShop\Entity\PayumContext;
use OLPS\SimpleShopComponent\Factory\PayumContextFactory;
use OLPS\SimpleShop\Interactor\AuthorizeCard;
use OLPS\SimpleShop\Storage\PDOStorage;
use OLPS\SimpleShopComponent\Factory\AuthorizeCardFactory;
use OLPS\SimpleShopComponent\Factory\Storage\PDOStorageFactory;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => $this->getDependencies(),
            'payum' => $this->getPayumConfig(),
        ];
    }

    private function getDependencies(): array
    {
        return [
            'factories'  => [
                AuthorizeCard::class  => AuthorizeCardFactory::class,
                PayumContext::class  => PayumContextFactory::class,
                PDOStorage::class  => PDOStorageFactory::class,
            ],
        ];
    }

    private function getPayumConfig(): array 
    {
        return [
            'storage' => [
                'token' => [
                    'table' => 'payum',
                    'idkey' => 'id',
                ],
            ],
        ];
    }
}
