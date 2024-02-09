<?php

declare(strict_types=1);

namespace App\Data;

final class TreeConfig implements TreeConfigInterface
{
    public function getTreesDetails(): array
    {
        return [
            'small' => ['rows' => 4, 'net' => 10000,'gross' => 12300],
            'medium' => ['rows' => 5, 'net' => 20000,'gross' => 24600],
            'large' => ['rows' => 6, 'net' => 25000,'gross' => 30700],
        ];
    }
}
