<?php

namespace Market;

require_once(__DIR__ . '/Product.php');
require_once(__DIR__ . '/MarketStall.php');
require_once(__DIR__ . '/Cart.php');

use Market\Product as Product;
use Market\MarketStall as MarketStall;
use Market\Cart as Cart;


$orange = new Product('Orange', 35, true);
$potato = new Product('Potato', 240, false);
$nuts = new Product('Nuts', 850, true);
$kiwi = new Product('Kiwi', 670, false);
$pepper = new Product('Pepper', 330, true);
$raspberry = new Product('Raspberry', 555, false);




$marketStall1 = new MarketStall(['orange' => $orange, 'potato' => $potato, 'nuts' => $nuts]);
$marketStall2 = new MarketStall(['kiwi' => $kiwi, 'pepper' => $pepper, 'raspberry' => $raspberry]);


$cart = new Cart();
$cart->addToCart(['name' => 'Raspberry', 'quantity' => 3, 'price' => 555]);
$cart->addToCart(['name' => 'Pepper', 'quantity' => 1, 'price' => 330]);
$cart->printReceipt();

$cart->addToCart($marketStall1->getItem('potato', 3));
$cart->addToCart($marketStall2->getItem('pepper', 2));

$cart->printReceipt();