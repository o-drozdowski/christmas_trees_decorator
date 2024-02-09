<?php

declare(strict_types=1);

namespace App\Entities;

use App\Data\OrnamentConfigInterface;
use Money\Money;
use App\Entities\PriceableInterface;
use Money\Currency;

final class Ornament implements PriceableInterface
{
    private string $size;
    private string $type;
    private string $currency;
    private Money $netPrice;
    private Money $grossPrice;
    private OrnamentConfigInterface $ornamentConfig;

    public function __construct(string $type, string $currency, OrnamentConfigInterface $ornamentConfig)
    {
        $this->type = $type;
        $this->currency = $currency;
        $this->ornamentConfig = $ornamentConfig;
        $this->setSize();
        $this->setNetPrice();
        $this->setGrossPrice();
    }

    private function setSize(): void
    {
        $size = $this->ornamentConfig->getOrnamentsDetails()[$this->type]['size'];
        $this->size = $size;
    }

    public function getSize(): string
    {
        return $this->size;
    }

    private function setNetPrice(): void
    {
        $netPrice = $this->ornamentConfig->getOrnamentsDetails()[$this->type]['net'];
        $this->netPrice = new Money($netPrice, new Currency($this->currency));
    }

    private function setGrossPrice(): void
    {
        $grossPrice = $this->ornamentConfig->getOrnamentsDetails()[$this->type]['gross'];
        $this->grossPrice = new Money($grossPrice, new Currency($this->currency));
    }

    public function getNetPrice(): Money
    {
        return $this->netPrice;
    }

    public function getGrossPrice(): Money
    {
        return $this->grossPrice;
    }

    public function getType(): string
    {
        return $this->type;
    }
}
