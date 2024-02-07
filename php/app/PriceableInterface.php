<?php

namespace App;

use Money\Money;

interface PriceableInterface {
    public function getPrice(): Money;
}