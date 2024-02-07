<?php
namespace App;

use Money\Money;

class Tree implements PriceableInterface {
    public Money $price;

    public function __construct()
    {
        $this->price = Money::PLN(2475);
    }

    public function getPrice(): Money {
        return $this->price;
    }
}