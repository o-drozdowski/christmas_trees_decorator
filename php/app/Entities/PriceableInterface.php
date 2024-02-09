<?php

declare(strict_types=1);

namespace App\Entities;

use Money\Money;

interface PriceableInterface
{
    public function getNetPrice(): Money;
    public function getGrossPrice(): Money;
}
