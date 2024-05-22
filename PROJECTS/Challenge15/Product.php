<?php
namespace Market;

class Product {
    private $name;
    private $price;
    private $sellingByKg;

    public function __construct($name, $price, $sellingByKg) {
        $this->name = $name;
        $this->price = $price;
        $this->sellingByKg = $sellingByKg;
    }

    public function getName()
    {
        return $this->name;
    }
    public function getPrice() {
        return $this->price;
    }

    public function getIsSoldByKg() {
        return $this->sellingByKg;
    }

    public function setisSoldByKg($sellingByKg) {
        $this->sellingByKg = $sellingByKg;
    }
}

$orange = new Product('Orange', 35, true);

$orangePrice = $orange->getPrice();

$orange->setisSoldByKg(false);
$isSoldByKg = $orange->getisSoldByKg();



echo "Product: {$orange->getName()}\n";
echo "Price: {$orangePrice} " . ($isSoldByKg ? 'per kg' : 'per gunny sack') . "\n";
