<?php

declare(strict_types=1);

namespace App\Entities;

use Money\Money;
use Money\Currency;
use App\Data\TreeConfigInterface;
use App\Entities\PriceableInterface;

class Tree implements PriceableInterface
{
    private string $size;
    private string $currency;
    private Money $totalNetPrice;
    private Money $totalGrossPrice;
    private array $rows = [];
    private int $rowCount;
    private TreeConfigInterface $treeConfig;

    public function __construct(string $size, string $currency, TreeConfigInterface $treeConfig)
    {
        $this->size = $size;
        $this->currency = $currency;
        $this->treeConfig = $treeConfig;
        $this->setRowCount();
        $this->setInitialPrices();
    }

    private function setRowCount(): void
    {
        $this->rowCount = $this->treeConfig->getTreesDetails()[$this->size]['rows'];
    }

    public function getRowCount(): int
    {
        return $this->rowCount;
    }

    private function setInitialPrices(): void
    {
        $this->totalNetPrice = $this->getNetPrice();
        $this->totalGrossPrice = $this->getGrossPrice();
    }

    public function getNetPrice(): Money
    {
        $netPrice =  $this->treeConfig->getTreesDetails()[$this->size]['net'];
        return new Money($netPrice, new Currency($this->currency));
    }

    public function getGrossPrice(): Money
    {
        $grossPrice =  $this->treeConfig->getTreesDetails()[$this->size]['gross'];
        return new Money($grossPrice, new Currency($this->currency));
    }

    public function getSize(): string
    {
        return $this->size;
    }

    public function addRow(array $row): void
    {
        foreach ($row as $ornament) {
            $this->totalNetPrice = $this->totalNetPrice->add($ornament->getNetPrice());
            $this->totalGrossPrice = $this->totalGrossPrice->add($ornament->getGrossPrice());
        }
        $this->rows[] = $row;
    }

    public function getRows(): array
    {
        return $this->rows;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }
}
