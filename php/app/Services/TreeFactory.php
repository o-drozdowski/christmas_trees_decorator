<?php

declare(strict_types=1);

namespace App\Services;

use App\Entities\Tree;
use App\Data\TreeConfigInterface;

class TreeFactory implements TreeFactoryInterface
{
    private TreeConfigInterface $treeConfigInterface;
    private TreeDecoratorServiceInterface $treeDecoratorService;

    public function __construct(TreeConfigInterface $treeConfigInterface, TreeDecoratorServiceInterface $treeDecoratorService)
    {
        $this->treeConfigInterface = $treeConfigInterface;
        $this->treeDecoratorService = $treeDecoratorService;
    }

    public function createTree(string $size, string $currency): Tree
    {
        $tree = new Tree($size, $currency, $this->treeConfigInterface);
        $this->treeDecoratorService->decorateTree($tree);
        return $tree;
    }
}
