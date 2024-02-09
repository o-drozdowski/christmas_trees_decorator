<?php

declare(strict_types=1);

namespace App\Services;

use App\Entities\Tree;

interface TreeFactoryInterface
{
    public function createTree(string $size, string $currency): Tree;
}
