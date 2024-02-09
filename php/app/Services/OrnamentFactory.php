<?php

declare(strict_types=1);

namespace App\Services;

use App\Data\OrnamentConfigInterface;
use App\Entities\Ornament;

class OrnamentFactory implements OrnamentFactoryInterface
{
    private OrnamentConfigInterface $ornamentConfig;

    public function __construct(OrnamentConfigInterface $ornamentConfig)
    {
        $this->ornamentConfig = $ornamentConfig;
    }

    public function createOrnament(string $type, string $currency): Ornament
    {
        return new Ornament($type, $currency, $this->ornamentConfig);
    }
}
