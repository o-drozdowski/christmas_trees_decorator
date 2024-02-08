<?php

namespace App\Data;

final class OrnamentConfig implements OrnamentConfigInterface
{
    public function getOrnamentsDetails(): array
    {
        return [
            'small' => [
                'red' => ['net' => 330, 'gross' => 406],
                'blue' => ['net' => 350, 'gross' => 430],
                'yellow' => ['net' => 360, 'gross' => 443],
            ],
            'medium' => [
                'green' => ['net' => 444, 'gross' => 546],
                'white' => ['net' => 555, 'gross' => 683],
                'pink' => ['net' => 666, 'gross' => 819],
            ],
            'large' => [
                'snowman' => ['net' => 800, 'gross' => 984],
                'santa_claus' => ['net' => 800, 'gross' => 984],
                'reindeer' => ['net' => 800, 'gross' => 984],
            ],
        ];
    }
}
