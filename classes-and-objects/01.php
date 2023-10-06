<?php

class Product
{
    private string $name;
    private float $price;
    private int $amount;

    public function __construct(string $name, float $startPrice, int $amount)
    {
        $this->name = $name;
        $this->price = $startPrice;
        $this->amount = $amount;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getQuantity(): int
    {
        return $this->amount;
    }

    public function printProduct(): string
    {
        return "Name :" . $this->getName() . ", Price :" . $this->getPrice() . ", Quantity :" . $this->getQuantity() . PHP_EOL;
    }

    public function setQuantity(int $newQuantity): void
    {
        if ($newQuantity >= 0) {
            $this->amount = $newQuantity;
        } else {
            echo "Quantity cannot be negative.\n";
        }
    }

    public function setPrice(float $newPrice): void
    {
        if ($newPrice >= 0) {
            $this->price = $newPrice;
        } else {
            echo "Price cannot be negative.\n";
        }
    }
}


$products = [
    new Product("Item 1", 70.00, 14),
    new Product("Item 2", 999.99, 3),
    new Product("Item 3", 440.46, 1)
];

$products[0]->setPrice(10);
$products[2]->setQuantity(999);

foreach ($products as $product) {
    echo $product->printProduct();
}
