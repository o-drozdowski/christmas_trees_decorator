<?php
require './vendor/autoload.php';

use App\Tree;
use Money\Currencies\ISOCurrencies;
use Money\Formatter\DecimalMoneyFormatter;

$tree = new Tree();
$currencies = new ISOCurrencies();
$moneyFormatter = new DecimalMoneyFormatter($currencies);
echo $moneyFormatter->format($tree->getPrice());