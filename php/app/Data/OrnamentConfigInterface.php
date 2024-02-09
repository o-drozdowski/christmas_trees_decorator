<?php

declare(strict_types=1);

namespace App\Data;

interface OrnamentConfigInterface
{
    public function getOrnamentsDetails(): array;
    public function getAvailableTypesForTreeSizes(): array;
}
