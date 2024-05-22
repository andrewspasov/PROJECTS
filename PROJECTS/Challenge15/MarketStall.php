<?php
namespace Market;
require_once(__DIR__ . '/Product.php');

use Market\Product as Product;

class MarketStall {
    public $products;

    public function __construct($productArray) {
        $this->products = $productArray;
    }

    public function addProductToMarket($productName, $product) {
        $this->products[$productName] = $product;
    }

    public function getItem($productName, $amount) {
        if (array_key_exists($productName, $this->products)) {
            return [
                'amount' => $amount,
                'item' => $this->products[$productName]
            ];
        } else {
            return false;
        }
    }
}

$orange = new Product('Orange', 35, true);
$potato = new Product('Potato', 14, false);
$nuts = new Product('Nuts', 50, true);

$marketStall = new MarketStall(['orange' => $orange, 'potato' => $potato, 'nuts' => $nuts]);

$cartItem = $marketStall->getItem('potato', 3);

if ($cartItem !== false) {
    echo "Product: {$cartItem['item']->getName()}\n";
    echo "Amount: {$cartItem['amount']}\n";
} else {
    echo "Product not found in the market stall.\n";
}

$nonExistentItem = $marketStall->getItem('apple', 3);

if ($nonExistentItem !== false) {
    echo "Product: {$nonExistentItem['item']->getName()}\n";
    echo "Amount: {$nonExistentItem['amount']}\n";
} else {
    echo "Product not found in the market stall.\n";
}
