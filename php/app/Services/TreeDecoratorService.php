<?php

declare(strict_types=1);

namespace App\Services;

use App\Entities\Tree;
use App\Data\OrnamentConfig;
use App\Data\OrnamentConfigInterface;
use App\Entities\Ornament;

class TreeDecoratorService implements TreeDecoratorServiceInterface
{
    private OrnamentConfigInterface $ornamentConfig;
    private OrnamentFactoryInterface $ornamentFactory;

    public function __construct(OrnamentConfigInterface $ornamentConfig, OrnamentFactoryInterface $ornamentFactory)
    {
        $this->ornamentConfig = $ornamentConfig;
        $this->ornamentFactory = $ornamentFactory;
    }

    public function decorateTree(Tree $tree): void
    {
        $rowCount =  $tree->getRowCount();
        $availableOrnamentTypes = $this->ornamentConfig->getAvailableTypesForTreeSizes()[$tree->getSize()];

        for ($row = 1; $row <= $rowCount; $row++) {
            echo $row;
            $ornaments = $this->decorateRow($availableOrnamentTypes, $tree->getRows(), $tree->getCurrency());
            $tree->addRow($ornaments);
        }
    }


    private function decorateRow(array $availableOrnamentTypes, array $currentRows, string $currency): array
    {
        $rowOrnaments = [];
        $rowCount = count($currentRows) + 1; // Calculate the current row count

        for ($i = $rowCount; $i > 0; $i--) {
            $remainingTypes = array_diff($availableOrnamentTypes, $this->getUsedTypes($currentRows));

            while ($ornamentType = array_shift($remainingTypes)) {
                $ornament = $this->ornamentFactory->createOrnament($ornamentType, $currency);

                if (!$this->isOrnamentTypeUsedInRow($ornament, $rowOrnaments)) {
                    $rowOrnaments[] = $ornament;
                    break;
                }
            }
        }

        return $rowOrnaments;
    }

    private function isOrnamentTypeUsedInRow(Ornament $ornament, array $rowOrnaments): bool
    {
        foreach ($rowOrnaments as $rowOrnament) {
            if ($ornament->getType() === $rowOrnament->getType()) {
                return true;
            }
        }

        return false;
    }

    private function getUsedTypes(array $currentRows): array
    {
        $usedTypes = [];

        foreach ($currentRows as $row) {
            foreach ($row as $ornament) {
                $usedTypes[] = $ornament->getType();
            }
        }

        return $usedTypes;
    }
}
