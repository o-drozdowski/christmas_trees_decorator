<?php

declare(strict_types=1);

namespace App\Services;

use App\Entities\Ornament;

interface OrnamentFactoryInterface
{
    public function createOrnament(string $type, string $currency): Ornament;
}
