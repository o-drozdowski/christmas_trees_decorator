<?php

declare(strict_types=1);

namespace App\Services;

use App\Entities\Tree;

interface TreeDecoratorServiceInterface
{
    public function decorateTree(Tree $tree): void;
}
