<?php
namespace Models;

class FruitModel
{
    public function getFruits() {
        $fruits = [
            ['name' => 'Apples', 'price' => 2.7],
            ['name' => 'Bananas', 'price' => 5.1],
            ['name' => 'Oranges', 'price' => 0.5]
        ];
        return $fruits;
    }
}