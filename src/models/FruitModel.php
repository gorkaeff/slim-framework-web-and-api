<?php
namespace Models;

class FruitModel
{
    public function getFruits() {
        //MOCK QUERY - select * from fruits;
        $fruits = [
            ['id' => 1, 'name' => 'Apples', 'price' => 10.7],
            ['id' => 2, 'name' => 'Bananas', 'price' => 20.1],
            ['id' => 3, 'name' => 'Oranges', 'price' => 30.5]
        ];

        //Return FruitEntity
        $results = [];
        foreach ($fruits as $fruit) {
            $results[] = new FruitEntity($fruit);
        }
        return $results;
    }
}