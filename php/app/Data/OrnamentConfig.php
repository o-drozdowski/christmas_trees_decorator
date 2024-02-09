<?php

declare(strict_types=1);

namespace App\Data;

final class OrnamentConfig implements OrnamentConfigInterface
{
    public function getOrnamentsDetails(): array
    {
        return [
                'red' => ['size' => 'small', 'net' => 330, 'gross' => 406],
                'blue' => ['size' => 'small', 'net' => 350, 'gross' => 430],
                'yellow' => ['size' => 'small', 'net' => 360, 'gross' => 443],
                'green' => ['size' => 'medium', 'net' => 444, 'gross' => 546],
                'white' => ['size' => 'medium', 'net' => 555, 'gross' => 683],
                'pink' => ['size' => 'medium', 'net' => 666, 'gross' => 819],
                'snowman' => ['size' => 'large', 'net' => 800, 'gross' => 984],
                'santa_claus' => ['size' => 'large', 'net' => 800, 'gross' => 984],
                'reindeer' => ['size' => 'large', 'net' => 800, 'gross' => 984],
        ];
    }

    public function getAvailableTypesForTreeSizes(): array
    {
        return [
            'small' => ['red', 'blue', 'yellow', 'green', 'white', 'pink'],
            'medium' => ['red', 'blue', 'yellow', 'green', 'white', 'pink', 'snowman', 'santa_claus', 'reindeer'],
            'large' => ['red', 'blue', 'yellow', 'green', 'white', 'pink', 'snowman', 'santa_claus', 'reindeer'],
        ];
    }
}
