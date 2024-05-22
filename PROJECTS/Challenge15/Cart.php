<?php
namespace Market;

require_once(__DIR__ . '/Product.php');
require_once(__DIR__ . '/MarketStall.php');


use Market\Product as Product;
use Market\MarketStall as MarketStall;

class Cart {
    private $cartItems = [];

    public function addToCart($item) {
        $this->cartItems[] = $item;
    }

   
    public function printReceipt() {
        if (empty($this->cartItems)) {
            echo "Your cart is empty." . PHP_EOL;
            return;
        }

        $totalPrice = 0;

        foreach ($this->cartItems as $item) {
            $name = $item['name'];
            $quantity = $item['quantity'];
            $price = $item['price'];
            $totalItemPrice = $quantity * $price;
            $totalPrice += $totalItemPrice;

            echo "$name | $quantity " . ($quantity > 1 ? 'kgs' : 'kg') . " | total= $totalItemPrice denars" . PHP_EOL;
        }

        echo "Final price amount: $totalPrice denars" . PHP_EOL;
    }
}

$cart = new Cart();
$cart->addToCart(['name' => 'Raspberry', 'quantity' => 3, 'price' => 555]);
$cart->addToCart(['name' => 'Pepper', 'quantity' => 1, 'price' => 330]);

$cart->printReceipt();