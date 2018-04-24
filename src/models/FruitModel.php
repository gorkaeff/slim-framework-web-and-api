<?php
namespace Models;

class FruitModel
{
    public function getFruits() {
        //MOCK QUERY - select * from fruits;
        $fruits = [
            ['id' => 1, 'name' => 'Apples', 'price' => 2.7],
            ['id' => 2, 'name' => 'Bananas', 'price' => 5.1],
            ['id' => 3, 'name' => 'Oranges', 'price' => 0.5]
        ];

        //Return FruitEntity
        $results = [];
        foreach ($fruits as $fruit) {
            $results[] = new FruitEntity($fruit);
        }
        return $results;
    }
}