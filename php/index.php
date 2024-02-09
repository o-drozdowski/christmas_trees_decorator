<?php
require './vendor/autoload.php';

use App\Data\OrnamentConfig;
use App\Data\TreeConfig;
use App\Entities\Ornament;
use App\Services\OrnamentFactory;
use App\Services\TreeFactory;
use Money\Currencies\ISOCurrencies;
use App\Services\TreeDecoratorService;
use Money\Formatter\DecimalMoneyFormatter;


$ornamentConfig = new OrnamentConfig();
$treeConfig =  new TreeConfig();

$ornamentFactory = new OrnamentFactory($ornamentConfig); 

$treeDecoratorService = new TreeDecoratorService($ornamentConfig, $ornamentFactory);

$treeFactory = new TreeFactory($treeConfig, $treeDecoratorService);

$tree =  $treeFactory->createTree('medium', 'PLN');
var_dump($tree);
